<template>
  <div class="flex justify-between">
    <button
      v-for="i in 4"
      :key="i"
      class="h-[5px] rounded-[2px] xl:max-w-[90px] max-w-[76px] w-full cursor-pointer"
      :class="
        activeTab == i ? 'bg-blue' : 'bg-[#E6EBED] dark:bg-[#E6EBED14]'
      "
      @click="$emit('changeTab', i) , activeTab = i"
    ></button>
  </div>
</template>
<script setup>
import { ref } from "vue";
const props = defineProps({
  activeVal: {
    default: 0,
  },
});

const activeTab = ref(props.activeVal);
</script>
