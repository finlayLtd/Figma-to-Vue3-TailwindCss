<template>
  <div class="flex overflow-x-auto tab items-center [&>*:last-child>*:last-child]:hidden">
    <div class="flex cursor-pointer" v-for="(tab, index) in tabList" :key="index" @click="activeCng = index , $emit('cngTab' , index)">
      <div class="flex items-center">
        <!-- v-if="index >= activeCng" -->
        <div
          class="aspect-square h-[26px] rounded-[50%] grid place-items-center"
          :class="
            activeCng >= index
              ? 'bg-blue  text-white'
              : 'bg-transparent border border-primary-50 dark:border-white-15 box-border text-primary-50 dark:text-white'
          "
        >
        <span v-if="index >= activeCng" >{{ index + 1 }}</span>
        <img src="../../assets/svgs/check-white.svg" v-else alt="Check" />
        </div>
        <p
          class="text-primary dark:text-white text-base font-medium leading-[120%] tracking-[-0.5px] ml-2 min-w-max"
          :class="activeCng == index ? '' : 'opacity-70'"
        >
          {{ tab }}
        </p>
      </div>
      <img
        src="../../assets/svgs/divider.svg"
        class="rotate-90 mx-5 dark:brightness-[100]"
        alt="Devider"
      />
    </div>
  </div>
</template>

<script setup>
import {ref} from 'vue'
const props = defineProps({
  tabList: {
    default: ["Choose domain", "Payment"],
  },
  active: {
    default: 0,
  },
});

const activeCng = ref(props.active)
</script>

<style scoped >
.tab::-webkit-scrollbar {
  display: none;
  /* height: 0px; */
}
</style>
