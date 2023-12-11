<template>
    <div class="lg:p-5 p-4 bg-white dark:bg-white-5 border border-light-white-blue-8 rounded-[14px]">
      <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]">
        Select an Operating System / Application to reinstall
      </p>
      <div class="lg:mt-3.5 mt-3 mb-5 flex items-center py-2.5 px-3 border border-light dark:border-light-white-blue-8 max-w-[400px] w-full rounded-[8px]">
        <img src="../../../assets/svgs/reinstall.svg" alt="Res\install">
        <select class="outline-0 ml-2 border-0 h-full w-full bg-transparent dark:text-white">
            <option value="Debian 11">Debian 11</option>
        </select>
      </div>
    <Btn class="text-white max-w-[400px] w-full" bgColor="bg-blue" border-color="border-blue">Reinstall</Btn>
    </div>
  </template>
  <script setup>
  import Btn from "@/components/Helper/Btn.vue";
  </script>