<template>
    <section class="sm:bg-[url('../assets/images/support.png')] bg-[url('../assets/images/sm-support.png')] bg-no-repeat sm:bg-[length:auto_100%] bg-[length:100%_100%]  object-cover lg:mt-[100px] mt-[120px] lg:mx-0 mx-4 lg:max-h-[475px] max-h-[346px] min-h-[346px] px-[16px] py-10 lg:rounded-none rounded-[8px]">
        <div class="container mx-auto flex flex-col 2xl:flex-row items-center justify-between">
            <div class="w-full"></div>
            <div class="lg:my-[122px] mr-auto">
                <h2 class="text-dark dark:text-white lg:text-[56px] text-[34px] font-bold leading-[95%] tracking-[0.56px]">Live support 24/7</h2>
                <p class="text-dark dark:text-white lg:text-lg text-[15px] font-normal leading-[150%] opacity-70 w-[58%] lg:mt-5 mt-[18px] lg:mb-8 mb-6">Reinstall or change the OS of your server at any time & as many times you want without </p>
                <Btn  bg-color="dark:bg-white-15 bg-white" border-color="dark:border-light-8 border">
                    <div class="flex items-center" >
                        <img src="../../assets/svgs/user-chat.svg" alt="star">
                        <p class="text-primary dark:text-white text-lg  font-medium leading-6 mx-[9px]">Open Trustpilot</p>
                        <img src="../../assets/svgs/right-arrow-btn.svg" class="dark:brightness-[100]" alt="Arrow">
                    </div>
                </Btn>
            </div>
        </div>
    </section>
</template>

<script setup>
import Btn from '../Helper/Btn.vue';
</script>