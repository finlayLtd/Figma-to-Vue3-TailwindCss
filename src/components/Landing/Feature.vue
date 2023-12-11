<template>
  <div class="container mx-auto xl:mt-[140px] mt-[120px]">
    <div class="max-w-[1220px] mx-4 xl:mx-auto">
      <div class="mx-auto text-center">
        <span class="px-3.5 py-[5px] 2xl:text-[17px] text-[15px] rounded-[76px] bg-[#3C95FF] text-white"
          >Any text about!</span
        >
        <h2
          class="mx-auto mt-3.5 lg:mb-[22px] mb-[18px] text-primary dark:text-white 2xl:text-[56px] text-[38px] tracking-[0.56px] font-bold leading-[95%] 2xl:w-[40%]"
        >
        Features for you love out site!
        </h2>
        <p
          class="text-secondary dark:text-white 2xl:text-[19px] text-[16px] font-normal leading-[150%] mb-[50px] opacity-70"
        >
        Reinstall or change the OS of your server at any time
        </p>
      </div>
    </div>

    <div class="grid xl:grid-cols-4 grid-cols-2 lg:gap-4 gap-3 px-4">
        <Subfeature :data="featuresList" />
    </div>
  </div>
</template>

<script setup>
import Subfeature from '../Helper/Subfeature.vue';
import {reactive} from 'vue'

const featuresList = reactive(
    [
        {
            img : 'setup.svg',
            title : 'Instant setup',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'system.svg',
            title : 'Protection System',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'ignore.svg',
            title : 'DMCA ignored',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'crypto.svg',
            title : 'Pay with any crypto',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'setup2.svg',
            title : 'Instant setup',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'system2.svg',
            title : 'Protection System',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'ignore2.svg',
            title : 'DMCA ignored',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
        {
            img : 'crypto2.svg',
            title : 'Pay with any crypto',
            caption : '«Servervy» protects your funds with both centralized and decentralized '
        },
    ]
)
</script>
