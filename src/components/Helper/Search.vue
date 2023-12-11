<template>
  <div
    class="flex h-[38px] justify-center items-center border shadow-gray-5 rounded-lg border-solid dark:border-light-8 border-light dark:bg-white-5 px-3 py-2"
    :class="maxWidth"
  >
    <img
      src="../../assets/svgs/search.svg"
      class="ml-[5px] dark:hidden block"
      alt="Dropdown"
    />
    <img
      src="../../assets/svgs/search-white.svg"
      class="ml-[5px] dark:block hidden"
      alt="Dropdown"
    />

    <input
      type="search"
      class="h-full w-full bg-transparent outline-0 ml-2.5 dark:text-white"
      placeholder="Search"
    />
  </div>
</template>

<script setup>
const props = defineProps({
  maxWidth : {
    default : 'max-w-[250px]'
  }
})
</script>