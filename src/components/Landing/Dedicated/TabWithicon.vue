<template>
  <div
    class="sm:flex grid grid-cols-2 flex-wrap mt-[27px] p-[3px] mx-auto justify-center border rounded-[10px] border-solid dark:bg-white-5 dark:border-light-white-8 border-light-white-gray w-fit bg-white-50 [&>*:last-child>*:last-child]:hidden"
  >
    <div
      class="flex sm:justify-start justify-between"
      v-for="(tab, index) in tablist"
      :class="tab?.isnotDestopDispaly ? 'sm:hidden flex' : ''"
      :key="index"
      @click="activeTab = index"
    >
      <div
        class="flex items-center justify-between md:px-5 px-4 py-2 cursor-pointer"
        :class="activeTab == index
              ? 'bg-white dark:bg-white-15 rounded-[8px] shadow-gray-15 dark:shadow-none'
              : 'opacity-70'"
      >

        <img :src="getImageUrl(tab.icon)" :alt="tab.name">
        <p
          class="text-dark dark:text-white md:text-lg text-base leading-6 ml-2.5"
          :class="activeTab == index ? 'font-medium' : 'font-normal'"
        >
          {{ tab.name }}
        </p>
      </div>

      <img
        src="../../../assets/svgs/divider.svg"
        class="mx-1.5 dark:brightness-[100] "
        :class="index % 2 == 0 ? '' : 'sm:block hidden'"
        alt="Divider"
      />
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  tablist: {
    default: ["CPU", "Memory", "Disk"],
  },
});
import { ref } from "vue";
const activeTab = ref(0);

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};
</script>
