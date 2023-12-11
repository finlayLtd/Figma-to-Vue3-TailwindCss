<template>
  <div class="lg:p-5 p-4 dark:bg-white-5 border border-light-white-blue-8 bg-white rounded-[14px]">
    <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]">
      To connect to your Linux virtual machine using SSH, please use the
      following command.
    </p>
    <Btn class="lg:mt-3.5 mt-3 mb-5 dark:text-white" bgColor="dark:bg-white-5" border-color="border dark:border-[#e6e6e617]">ssh root@147.189.161.205</Btn>
    <p
      class="text-secondary-50 dark:text-white-50 text-sm font-normal leading-[140%]"
    >
      You will most likely be using cmd if you are connecting from Windows OS or <br class="lg:block hidden">
      Terminal if you are running macOS or Linux <br>
      For more information, please visit this
    </p>
  </div>
</template>
<script setup>
import Btn from "@/components/Helper/Btn.vue";
</script>
