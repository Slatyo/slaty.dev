<script setup>
import {Head} from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";

</script>

<template>
    <Head title="404"/>
    <GuestLayout>
        <div class="bg-gray-900 px-6 py-48">
            <div class="text-center">
                <p class="text-base text-3xl text-red-600">404</p>
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Page not found</h1>
                <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we couldn’t find the page you’re looking
                    for.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a :href="route('welcome')"
                       class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
                        back</a>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style>
</style>
