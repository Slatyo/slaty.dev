<script setup>
import {Head} from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SingleColumnWithImages from "@/Components/SingleColumnWithImages.vue";

const posts = [
    {
        id: 1,
        title: 'SonarTracking',
        href: 'https://github.com/Slatyo/SonarTracking',
        description: 'SonarTracking is just a working title for now. Experimenting with ultrasonic sensors for underwater usage. Maybe we will add more sensors on the way.',
        imageUrl: '/storage/sonar-tracking-image.png',
        category: {
            title: 'Marketing',
            href: '#'
        },
    },
]
</script>

<template>
    <Head title="Documentation"/>
    <GuestLayout>
        <div class="container mx-auto py-2">
            <SingleColumnWithImages :posts="posts" title="Documentation"></SingleColumnWithImages>
        </div>
    </GuestLayout>
</template>

<style>
</style>
