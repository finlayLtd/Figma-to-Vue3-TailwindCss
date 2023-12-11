<template>
    <div class="w-full flex flex-col items-center px-1.5 py-4 rounded-[14px] group hover:shadow-gray-15 dark:hover:shadow-none dark:hover:bg-white-5" v-for="(server , index) in data" :key="index">
        <img :src="`src/assets/svgs/servers/${server.img}`" :alt="server.title">
        <h5 class="text-secondary dark:opacity-50 group-hover:opacity-100 dark:text-white text-center text-[17px]  font-medium group-hover:font-bold leading-[130%] mt-3 mb-1">Arch Linux</h5>
        <router-link to="#" class="text-blue text-center text-sm  font-normal leading-[130%] invisible group-hover:visible">Learn about</router-link>
    </div>
</template>

<script setup>
    const porps = defineProps(
        {
            data : {
                required : true,
            }
        }
    )
</script>