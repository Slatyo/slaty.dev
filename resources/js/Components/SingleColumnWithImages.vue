<template>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center" v-if="title">{{
                    title
                }}</h2>
            <p class="mt-2 text-lg leading-8 text-white text-center" v-if="description">{{ description }}</p>
            <div class="mt-12 space-y-20">
                <article v-for="post in posts" :key="post.id"
                         class="relative isolate flex flex-col gap-8 lg:flex-row hover:text-grey-800">

                    <a class="flex" :href="post.href">
                        <div class="relative aspect-[16/9] sm:aspect-[2/1] aspect-square w-64 shrink-0">
                            <img :src="post.imageUrl" alt=""
                                 class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-contain"/>
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"/>
                        </div>
                        <div class="pl-4">
                            <div class="group relative max-w-xl ">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                                    <span class="absolute inset-0" aria-hidden="true"/>
                                    {{ post.title }}
                                </h3>
                                <p class="mt-5 text-sm leading-6 text-white">{{ post.description }}</p>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    title: {
        type: String,
        required: false
    },
    description: {
        type: String,
        required: false
    },
    posts: {
        type: Array,
    },
});
</script>
