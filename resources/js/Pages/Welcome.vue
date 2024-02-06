<script setup>
import {Head} from '@inertiajs/vue3';
import StackedListComponent from "@/Components/StackedListComponent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import TypewriterComponent from "@/Components/TypewriterComponent.vue";

</script>

<template>
    <Head title="slaty.dev"/>
    <GuestLayout>

        <div class="container mx-auto">
            <div class="bg-gray-900 px-6 py-24">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">slaty.dev</h2>
                    <TypewriterComponent class="mt-6 text-lg leading-8 text-green-600"
                                         typed-value-classes="text-gray-500"
                                         :display-text-array="['I create things.', 'I destroy things.']">
                        Sometimes,
                    </TypewriterComponent>
                </div>
            </div>

            <div class="bg-gray-900 px-6 ">
                <StackedListComponent headline="Current projects" />
            </div>
        </div>
    </GuestLayout>
</template>

<style>
</style>
