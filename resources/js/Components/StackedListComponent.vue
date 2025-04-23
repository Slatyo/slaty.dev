<template>
    <h2 class="mx-auto text-3xl text-white font-semibold text-center mb-2">{{ headline }}</h2>
    <ul role="list" class="divide-y divide-white/5">
        <li v-for="deployment in deployments" :key="deployment.id"
            class="relative flex items-center space-x-4 py-4 p-8" :class="hasHref(deployment) ? 'hover:bg-green-500/5' : 'hover:bg-gray-500/5 cursor-default'">
            <div class="min-w-0 flex-auto">
                <div class="flex items-center gap-x-3">
                    <div :class="[statuses[deployment.status], 'flex-none rounded-full p-1']">
                        <div class="h-2 w-2 rounded-full bg-current"/>
                    </div>
                    <h2 class="min-w-0 text-sm font-semibold leading-6 text-white">
                        <a v-if="deployment.href.length > 0" :href="deployment.href" target="_blank" class="flex gap-x-2">
                            <span class="truncate">{{ deployment.teamName }}</span>
                            <span class="text-gray-400">/</span>
                            <span class="whitespace-nowrap">{{ deployment.projectName }}</span>
                            <span class="absolute inset-0"/>
                        </a>
                        <span v-else class="flex gap-x-2">
                            <span class="truncate">{{ deployment.teamName }}</span>
                            <span class="text-gray-400">/</span>
                            <span class="whitespace-nowrap">{{ deployment.projectName }}</span>
                            <span class="absolute inset-0"/>
                        </span>
                    </h2>
                </div>
                <div class="mt-3 flex items-center gap-x-2.5 text-xs leading-5 text-gray-400">
                    <p class="truncate">{{ deployment.description }}</p>
                    <svg v-if="deployment.statusText.length > 0" viewBox="0 0 2 2"
                         class="h-0.5 w-0.5 flex-none fill-gray-300">
                        <circle cx="1" cy="1" r="1"/>
                    </svg>
                    <p class="whitespace-nowrap">{{ deployment.statusText }}</p>
                </div>
            </div>
            <ChevronRightIcon v-if="deployment.href.length > 0" class="h-5 w-5 flex-none text-gray-400"
                              aria-hidden="true"/>

            <div
                :class="[environments[deployment.environment], 'rounded-full flex-none py-1 px-2 text-xs font-medium ring-1 ring-inset']">
                {{ deployment.environment }}
            </div>
        </li>
    </ul>
</template>

<script setup>
import {ChevronRightIcon} from '@heroicons/vue/20/solid'

const statuses = {
    offline: 'text-gray-500 bg-gray-100/10',
    online: 'text-green-400 bg-green-400/10',
    error: 'text-rose-400 bg-rose-400/10',
    info: 'text-indigo-400 bg-indigo-400/10',
}
const environments = {
    Preview: 'text-gray-400 bg-gray-400/10 ring-gray-400/20',
    WIP: 'text-indigo-400 bg-indigo-400/10 ring-indigo-400/30',
    Online: 'text-green-400 bg-green-400/10 ring-green-400/30',
    'On hold': 'text-red-400 bg-red-400/10 ring-red-400/30',
}
const deployments = [
    {
        id: 0,
        href: 'https://github.com/Slatyo/SonarTracking',
        projectName: 'SonarTracking',
        teamName: 'Slaty',
        status: 'info',
        statusText: '',
        description: 'Experimenting with ultrasonic sensors for underwater usage.',
        environment: 'WIP',
    },
    {
        id: 1,
        href: '',
        projectName: 'Valheim Vanilla',
        teamName: 'Roots',
        status: 'online',
        statusText: '',
        description: 'A self-managed Valheim server for Roots with improved networking',
        environment: 'Online',
    },
    {
        id: 12,
        href: '',
        projectName: 'Valheim Modded',
        teamName: 'Roots',
        status: 'online',
        statusText: '',
        description: 'A self-managed modded Valheim server for Roots with improved networking',
        environment: 'Online',
    },
    {
        id: 2,
        href: '',
        projectName: 'Palworld',
        teamName: 'Roots',
        status: 'online',
        statusText: '',
        description: 'A managed Palworld server for Roots',
        environment: 'Online',
    },
    {
        id: 4,
        href: 'https://github.com/Slatyo/slaty.dev',
        projectName: 'slaty.dev',
        teamName: 'Slaty',
        status: 'online',
        statusText: '',
        description: 'Opensource development of my website',
        environment: 'Online',
    },
    {
        id: 6,
        href: 'https://github.com/Slatyo/laravel-pokemontcg',
        projectName: 'Laravel Pokemontcg',
        teamName: 'Slaty',
        status: 'online',
        statusText: '',
        description: 'Opensource simple API laravel wrapper for Pokemontcg with a sleek model design.',
        environment: 'Online',
    },
]

const hasHref = (deploymentArray) =>  {
    return deploymentArray.href.length > 0;
}

defineProps({
    headline: String
})
</script>
