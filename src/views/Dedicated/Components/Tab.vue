<template>
      <ul class="flex border-b border-[#15171c1a] overflow-auto tabUl">
        <li
          v-for="(tab, ind) in overViewTab"
          :key="ind"
          class="lg:mr-6 mr-5 pb-4 cursor-pointer min-w-fit dark:text-white"
          :class="
            activeOverviweTab == ind
              ? 'border-b border-blue opacity-100'
              : 'opacity-70'
          "
          @click="activeOverviweTab = ind,$emit('updateTab',ind)"
        >
          {{ tab }}
        </li>
      </ul>
  </template>
  
  <script setup>
  import { ref } from "vue";
  const activeOverviweTab = ref(0);
  const overViewTab = ref([
    "Overview",
    "Analytics",
    "Connect",
    "Reinstall",
    "IP Address Management",
    "VNC",
    "Billing",
    "Settings",
  ]);
  </script>
  
  <style scoped>
  .tabUl::-webkit-scrollbar {
    display: none;
  }
  </style>
  