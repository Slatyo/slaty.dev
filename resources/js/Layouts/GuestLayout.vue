<script setup>
import FooterComponent from "@/Components/FooterComponent.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
</script>

<template>
    <div
        class="min-h-screen bg-dots-darker bg-center bg-gray-100 bg-gray-900 selection:bg-green-600 selection:text-white"
    >
        <HeaderComponent />

        <slot/>

        <FooterComponent></FooterComponent>
    </div>
</template>
