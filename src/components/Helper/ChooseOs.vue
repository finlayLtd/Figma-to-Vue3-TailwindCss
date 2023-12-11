<template>
  <div>
    <p class="dark:text-white">Operating system</p>

    <div class="grid lg:grid-cols-4 grid-cols-2 mt-5 gap-[15px]">
      <div
        class="py-3 px-3.5 rounded-[8px] border flex items-start cursor-pointer"
        :class="activeServer == index ? 'border-blue bg-blue-5' : 'border-primary-8 dark:border-white-8'"
        v-for="(server, index) in data"
        :key="index"
        @click="activeServer = index"
      >
        <img
          :src="getImageUrl(server.icon)"
          class="h-[29px] aspect-square"
          alt="Ubuntu"
        />

        <div class="ml-3" >
            <p class="text-[15px] font-medium leading-[100%] tracking-[0.15px] text-primary dark:text-white" >{{ server.name }}</p>
            <p class="text-sm text-primary dark:text-white opacity-70 mt-[3px] font-normal leading-[150%]" >{{ server.price == 'Free' ? 'Free' : `$ ${server.price.toFixed(2)}` }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  data: {
    required: true,
  },
});
import {ref} from 'vue'
const activeServer = ref(0)

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};
</script>
