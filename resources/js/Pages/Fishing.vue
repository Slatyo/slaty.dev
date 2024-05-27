<script setup>
import {Head} from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SingleColumnWithImages from "@/Components/SingleColumnWithImages.vue";

const items = [
    {
        id: 1,
        title: 'Sportex JIG-Xpert Zander',
        href: 'https://amzn.to/4e04twL',
        description: '2.50m Spinning Rod Fishing Predatory Fish',
        imageUrl: '/storage/sportex_jig_xpert_zander_2_50_m.jpg',
    },
    {
        id: 2,
        title: 'Daiwa 20 Inch Legalis LT 4000-c',
        href: 'https://amzn.to/3KiVR6Q',
        description: 'Roll size: 4000-C, gear ratio: 5.2:1, Line capacity meter/diameter: 150/0.28 mm, Cord retraction: 82 cm, Weight: 235 g, Brake force: 12 kg, ball bearing: 5',
        imageUrl: '/storage/daiwa_legalis_lt_4000.jpg',
    },
    {
        id: 3,
        title: 'Daiwa Ninja LT 4000-c Spinning Fishing Reel with Front Brake Model 2018',
        href: 'https://amzn.to/4awnVOQ',
        description: 'Roll size: 4000-C, Gearbox ratio: 5.2:1',
        imageUrl: '/storage/daiwa_ninja_lt_4000_c.jpg',
    },
    {
        id: 4,
        title: 'TRUSCEND Rubber Fish',
        href: 'https://amzn.to/4bz6yhK',
        description: 'Long throw jig head, long cast and slow sinking',
        imageUrl: '/storage/TRUSCEND_Jig_Rubber_Bait.jpg',
    },
    {
        id: 5,
        title: 'TRUSCEND Artificial Bait Pike',
        href: 'https://amzn.to/4bu8CYe',
        description: 'Size A2-20,5cm-64G, Plastic',
        imageUrl: '/storage/TRUSCEND_Artificial_Bait_Pike.jpg',
    },
    {
        id: 6,
        title: 'Shimano Kairiki 59WPLA58R1 8',
        href: 'https://amzn.to/3UWH8DI',
        description: '150m Light Grey Braided Fishing Line',
        imageUrl: '/storage/Shimano_Kairiki_59WPLA58R1_8_150m_Light_Grey_Braided_Fishing_Line.jpg',
    },
    {
        id: 7,
        title: 'Shimano Kairiki 59WPLA58R0 8',
        href: 'https://amzn.to/4bUW1gI',
        description: '150m Green Braided Fishing Line',
        imageUrl: '/storage/Shimano_Kairiki_59WPLA58R0_8_150m_Green_Braided_Fishing_Line.jpg',
    },
    {
        id: 8,
        title: 'Black Beast Yellow Side Planner',
        href: 'https://amzn.to/3wRc2Fl',
        description: 'Paravan size M, 20 cm, 140 g, For bait up to max. 25 cm, salt water resistant aluminium plus extra hardened plastic',
        imageUrl: '/storage/Black_Beast_Yellow_Side_Planner.jpg',
    },
    {
        id: 9,
        title: 'AGEM Folding Camping Chair',
        href: 'https://amzn.to/3Vjj0MZ',
        description: 'Comfy folding camping chair',
        imageUrl: '/storage/AGEM_Folding_Camping_Chair.jpg',
    },
    {
        id: 10,
        title: 'Wolfgangs W-SCANDI Fishing Knife.jpg',
        href: 'https://amzn.to/3Vjj0MZ',
        description: 'Scandi cut with 440C steel, Sheath included',
        imageUrl: '/storage/Wolfgangs_W-SCANDI_Fishing_Knife.jpg',
    },
]
</script>

<template>
    <Head title="Fishing"/>

    <GuestLayout>
        <div class="container mx-auto py-2">
            <SingleColumnWithImages :posts="items" title="My Fishing Equipment"></SingleColumnWithImages>
        </div>
    </GuestLayout>
</template>

<style>
</style>
