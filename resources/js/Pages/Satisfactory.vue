<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";

const props = defineProps({
    servers: Array,
});
</script>

<template>
    <Head title="Satisfactory Servers" />
    <GuestLayout>
        <div class="max-w-4xl mx-auto px-4 py-8 text-white space-y-8 text-center">
            <div class="space-y-2">
                <h1 class="text-3xl font-bold text-green-300">Satisfactory Server Overview</h1>
                <p class="text-gray-400 text-sm">
                    Choose a server below to view its current status, configuration, and activity.
                </p>
            </div>

            <div class="m-2">
                <a
                    v-for="server in servers"
                    :key="server"
                    :href="route('satisfactory.show', { 'satisfactory': server })"
                    class="px-4 py-3 ml-4 bg-gray-800 rounded-lg shadow hover:bg-gray-700 transition"
                >
                    <span class="text-white font-semibold uppercase tracking-wide">{{ server }}</span>
                </a>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
</style>
