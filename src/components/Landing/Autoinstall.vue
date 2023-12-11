<template>
    <section class="bg-[url('../assets/images/bg-auto-install.png')] dark:bg-[url('../assets/images/bg-auto-install-dark.png')] bg-no-repeat  xl:mt-[130px] mt-[120px] mx-4" :class="innerWidth < 1800 ? 'container mx-auto object-cover bg-center bg-[length:auto_100%]' : 'bg-[length:100%_100%]'">
        <div class="container mx-auto block xl:flex items-center justify-between">
            <div class="px-4 xl:pt-0 pt-[50px]" >
                <div class="flex items-center">
                    <img src="../../assets/svgs/star.svg" alt="star">
                    <p class="text-dark dark:text-white lg:text-[17px] text-[15px] font-medium leading-[26px] ml-1">Trustpilot</p>
                    <img src="../../assets/svgs/stars.svg" class="mx-3" alt="stars">
                    <p class="text-dark dark:text-white lg:text-[17px] text-[15px] font-medium leading-[26px]">Excellent</p>
                </div>
                
                <h2 class="text-dark dark:text-white lg:text-[56px] text-[34px] font-bold leading-[95%] tracking-[0.56px] xl:w-[60%] mt-3.5 mb-5">Automated installs stop wasting time {{ innerWidth }}</h2>
                
                <p class="text-dark dark:text-white lg:text-[17px] text-[15px]  font-normal leading-[150%] xl:w-[40%] opacity-70">Reinstall or change the OS of your server at any time & as many times you want without.</p>

                <Btn class="mt-8" bg-color="dark:bg-white-15 bg-white" border-color="dark:border-light-8 border">
                    <div class="flex items-center">
                        <img src="../../assets/svgs/star.svg" alt="star">
                        <p class="text-primary dark:text-white text-lg  font-medium leading-6 mx-[9px]">Open Trustpilot</p>
                        <img src="../../assets/svgs/right-arrow-btn.svg" class="dark:brightness-[100]" alt="Arrow">
                    </div>
                </Btn>
            </div>

            <div class="grid place-items-center" >
                <img src="../../assets/images/auto-install.png" class="mt-[84px] min-[1800px]:translate-x-20" alt="Feedback">
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue';
import Btn from '../Helper/Btn.vue';
const innerWidth = computed(() =>  window.innerWidth)
</script>