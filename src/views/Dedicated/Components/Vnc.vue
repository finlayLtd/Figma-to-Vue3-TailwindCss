<template>
  <div class="lg:p-5 p-4 bg-white dark:bg-white-5 border border-light-white-blue-8 rounded-[14px]">
    <p
      class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]"
    >
      VNC
    </p>
    <p
      class="text-secondary-70 dark:text-white-70 mt-[5px] mb-[14px] lg:text-sm text-[13px]  font-normal leading-[140%]"
    >
      Remote access your virtual machines through host VNC.
    </p>
    <Btn class="text-white max-w-[200px] w-full" bgColor="bg-blue" border-color="dark:border-blue"
      >Connect VNC</Btn
    >
  </div>
</template>
<script setup>
import Btn from "@/components/Helper/Btn.vue";
</script>
