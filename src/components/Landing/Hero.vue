<script setup>
import Btn from "../Helper/Btn.vue";
</script>

<template>
  <section class="sm:bg-[url('../assets/images/grad1.png')] bg-[url('../assets/images/sm-grad1.png')] xl:bg-[length:100%_100%] bg-center object-cover px-4 bg-[#F8F9FC] dark:bg-[#191919]">
    <div
      class="container flex justify-between md:items-center md:pt-0 pt-[120px] mx-auto lg:h-[760px] h-[640px]"
    >
      <div class="md:max-w-[534px] w-full">
        <h1
          class="text-primary md:text-start text-center dark:text-white xl:text-[72px] text-[39px] font-medium md:leading-[90%] leading-[100%] tracking-[0.72px] "
        >
          Pay with crypto for anonymous cloud hosting
        </h1>
        <p
          class="text-secondary opacity-70 dark:text-white xl:text-[19px] text-base md:text-start text-center md:mx-0 mx-[7.5px] font-normal tracking-[150%]  mt-6 mb-[34px]"
        >
          Sell subscriptions, tokens, serial keys, digital downloads, video
          courses, softwares and licenses in a fast, easy and secure way.
        </p>

        <div class="flex md:justify-start justify-center">
          <Btn 
          bg-color="bg-white dark:bg-white-5"
          border-color="border border-light dark:border-white-5"
          text-color="text-primary dark:text-white"
          >Login</Btn>
          <Btn
            bg-color="bg-blue"
            text-color="text-white"
            border-color="border border-blue"
            class="flex items-center ml-2.5"
          >
            Get started
            <img src="../../assets/svgs/right-arrow.svg" class="ml-2" alt="" />
          </Btn>
        </div>
      </div>
      <div class="w-full xl:block hidden"></div>
    </div>
  </section>
</template>
