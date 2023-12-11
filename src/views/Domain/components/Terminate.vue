<template>
    <div
      class="grid place-items-center max-w-[519px] mx-auto rounded-[20px]"
    >
      <div
        class="lg:p-[30px] p-5 bg-white dark:bg-black-blue w-full lg:min-w-[519px] shadow-black-8 rounded-[10.709px]"
      >
        <div class="flex justify-between items-center">
          <button class="rounded-[6.119px] bg-light-white dark:bg-light-white-8 py-1.5 px-2.5">
            <img src="../../../assets/svgs/turmineted-domain-red.svg" alt="Dust" />
          </button>
          <button>
            <img src="../../../assets/svgs/close.svg" class="dark:brightness-[100]" alt="Close" @click="$emit('closeModel',false)"/>
          </button>
        </div>

        <h2 class="text-secondary dark:text-white text-[20px] lg:text-[22px]  font-bold leading-[100%] tracking-[0.22px] mt-5 mb-2.5">Terminate domain?</h2>
        <p class="text-[#171e2699] dark:text-[#ffffff99] text-[15px]  font-normal leading-[140%] tracking-[0.15px]">Are you sure you want to delete domain? You can’t undo this action</p>


        <div class="flex items-center lg:mt-9 mt-8">
            <Btn class="w-full" bg-color="bg-light-white dark:bg-light-white-8" border-color="border dark:border-light-white-8" text-color="text-primary dark:text-white" btn-padding="py-1.5 lg:py-[11px]" @click="$emit('closeModel',false)">Close</Btn>
            <Btn class="w-full ml-3" bg-color="bg-tomato" border-color="border border-tomato" text-color="text-white" btn-padding="py-1.5 lg:py-[11px]">Terminate domain</Btn>
        </div>
      </div>
    </div>
  </template>
  x
  
  <script setup>
  import Btn from "../../../components/Helper/Btn.vue";
  </script>