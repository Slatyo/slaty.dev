<script setup>
import {Head} from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";

const props = defineProps({
    server: Object,
    name: String
});

const labelOverrides = {
    "FG.DSAutoPause": "DS Auto Pause",
    "FG.DSAutoSaveOnDisconnect": "DS Auto Save On Disconnect",
    "FG.DisableSeasonalEvents": "Disable Seasonal Events",
    "FG.AutosaveInterval": "Autosave Interval",
    "FG.ServerRestartTimeSlot": "Server Restart Time",
    "FG.SendGameplayData": "Send Gameplay Data",
    "FG.NetworkQuality": "Network Quality",
};

const gamePhaseNames = {
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_0.GP_Project_Assembly_Phase_0'": "Onboarding",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_1.GP_Project_Assembly_Phase_1'": "Distribution Platform",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_2.GP_Project_Assembly_Phase_2'": "Construction Dock",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_3.GP_Project_Assembly_Phase_3'": "Main Body",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_4.GP_Project_Assembly_Phase_4'": "Propulsion Systems",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_5.GP_Project_Assembly_Phase_5'": "Assembly",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_6.GP_Project_Assembly_Phase_6'": "Completing",
    "/Script/FactoryGame.FGGamePhase'/Game/FactoryGame/GamePhases/GP_Project_Assembly_Phase_7.GP_Project_Assembly_Phase_7'": "Completed",
}

const formatDuration = seconds => {
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return `${h}h ${m}m`;
};

const sortedEntries = obj => Object.entries(obj).sort(([a], [b]) => a.localeCompare(b));

const getServerState = (isRunning, isPaused) => {
    if (!isRunning) return {label: 'Stopped', color: 'bg-gray-600 text-white'};
    if (isPaused) return {label: 'Paused', color: 'bg-yellow-400 text-black'};
    return {label: 'Running', color: 'bg-green-500 text-white'};
};
</script>

<template>
    <Head :title="name"/>
    <GuestLayout>
        <div class="max-w-5xl mx-auto px-4 py-6 text-white space-y-10">
            <h1 class="text-4xl font-bold text-green-500 first-letter:uppercase text-center">
                {{ name }}
            </h1>

            <div v-if="!props.server" class="text-red-400 text-lg font-medium">
                Server currently unavailable.
            </div>

            <template v-else>
                <!-- PROMINENT GENERAL STATUS PANEL -->
                <section
                    class="relative bg-gray-900 p-6 rounded-xl shadow-lg border border-gray-700 space-y-2"
                >
                    <!-- HEALTH BAR DOT -->
                    <div
                        v-if="props.server.health === 'healthy'"
                        class="absolute top-0 left-0 h-2 w-full bg-green-500 rounded-t-xl"
                    ></div>

                    <h2 class="text-2xl font-semibold text-yellow-300">{{ gamePhaseNames[props.server.gamePhase] }}</h2>


                    <div class="grid md:grid-cols-3 gap-6 text-sm">
                        <!-- Health -->
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-400">Health:</span>
                            <span
                                class="w-3 h-3 rounded-full"
                                :class="props.server.health === 'healthy' ? 'bg-green-400' : 'bg-red-500'"
                            ></span>
                        </div>

                        <!-- Tech Tier -->
                        <div>
                            <span class="text-gray-400">Tech Tier:</span>
                            <span class="ml-2">{{ props.server.techTier }}</span>
                        </div>

                        <div><span class="text-gray-400">Auto-load Session:</span> {{
                                props.server.autoLoadSessionName
                            }}
                        </div>


                        <!-- State (Running/Paused/Stopped) -->
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-400">State:</span>
                            <span
                                class="px-2 py-1 rounded-full text-xs font-semibold"
                                :class="getServerState(props.server.isGameRunning, props.server.isGamePaused).color"
                            >
                                {{ getServerState(props.server.isGameRunning, props.server.isGamePaused).label }}
                            </span>
                        </div>

                        <!-- Players -->
                        <div>
                            <span class="text-gray-400">Players:</span>
                            <span class="ml-2">{{ props.server.numConnectedPlayers }}/{{
                                    props.server.playerLimit
                                }}</span>
                        </div>

                        <!-- Tick Rate -->
                        <div>
                            <span class="text-gray-400">Tick Rate:</span>
                            <span class="ml-2">{{ props.server.averageTickRate.toFixed(2) }}</span>
                        </div>

                        <!-- Uptime -->
                        <div>
                            <span class="text-gray-400">Uptime:</span>
                            <span class="ml-2">{{ formatDuration(props.server.totalGameDuration) }}</span>
                        </div>


                        <div><span class="text-gray-400">Creative Mode:</span>
                            {{ props.server.creativeModeEnabled ? 'Enabled' : 'Disabled' }}
                        </div>
                        <div><span class="text-gray-400">Schematic:</span> {{ props.server.activeSchematic }}</div>
                    </div>
                </section>

                <!-- SERVER OPTIONS -->
                <div class="flex">
                <section v-if="props.server.serverOptions && Object.keys(props.server.serverOptions).length"
                         class="space-y-2 pt-6">
                    <h2 class="text-xl font-semibold text-yellow-300">Server Options</h2>
                    <ul class="space-y-2 text-sm">
                        <li v-for="[k, v] in sortedEntries(props.server.serverOptions)" :key="k">
                            <span class="text-gray-400">{{
                                    labelOverrides[k] ?? k.replace(/^FG\./, '').replace(/([A-Z])/g, ' $1')
                                }}:</span> {{ v }}
                        </li>
                    </ul>
                </section>

                <!-- ADVANCED SETTINGS -->
                <section
                    v-if="props.server.advancedGameSettings && Object.keys(props.server.advancedGameSettings).length"
                    class="space-y-2 pt-6 pl-12">
                    <h2 class="text-xl font-semibold text-yellow-300">Advanced Game Settings</h2>
                    <ul class="space-y-2 text-sm">
                        <li v-for="[k, v] in sortedEntries(props.server.advancedGameSettings)" :key="k">
                            <span class="text-gray-400">{{
                                    labelOverrides[k] ?? k.replace(/^FG\./, '').replace(/([A-Z])/g, ' $1')
                                }}:</span> {{ v }}
                        </li>
                    </ul>
                </section>
                </div>
            </template>
        </div>
    </GuestLayout>
</template>
