<template>
    <div class="border flex flex-col text-center justify-center rounded-2xl border-solid border-primary-8 dark:border-white-8 lg:py-6 lg:px-[33px] p-3 hover:shadow-[0px_1px_1px_0px_#E4E7EC,0px_10px_32px_-12px_rgba(16,24,40,0.05)] dark:hover:shadow-light-15" v-for="(feature , index) in data" :key="index">
        <img :src="`src/assets/svgs/features/${feature.img}`" class="aspect-square" :alt="feature.title">
        <h5 class="text-[#171618] dark:text-white lg:text-[22px] text-[16px] font-bold leading-[29.04px] sm:mt-10 mt-2.5 mb-1.5">{{ feature.title }}</h5>
        <p class="text-[#171618] dark:text-white opacity-70 text-center lg:text-base text-[12px] font-normal leading-[140%]">{{ feature.caption }}</p>
    </div>
</template>

<script setup>
    const props = defineProps(
        {
            data : {
                required : true,
            }
        }
    )
</script>