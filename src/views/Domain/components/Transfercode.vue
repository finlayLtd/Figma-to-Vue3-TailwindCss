<template>
    <div
      class="grid place-items-center rounded-[20px] max-w-[502px] mx-auto"
    >
      <div
        class="lg:p-[30px] p-5 bg-white lg:min-w-[502px] dark:bg-black-blue shadow-black-8 rounded-[10.709px] w-full"
      >
        <div class="flex justify-between items-center">
          <button class="rounded-[6.119px] bg-light-white dark:bg-light-white-8 py-1.5 px-2.5">
            <img src="../../../assets/svgs/request-code.svg" class="dark:brightness-[100]" alt="Code" />
          </button>
          <button>
            <img src="../../../assets/svgs/close.svg" class="dark:brightness-[100]" alt="close" @click="$emit('closeModel',false)"/>
          </button>
        </div>

        <h2 class="text-secondary dark:text-white lg:text-[22px] text-[20px]  font-bold leading-[100%] tracking-[0.22px] mt-5 mb-2.5">Transfer code</h2>
        <p class="text-[#171e2699] dark:text-[#FFFFFF99]  text-[15px]  font-normal leading-[140%] tracking-[0.15px]">Information about transfer code.</p>

        <div class="py-2.5 px-3.5 border border-light dark:bg-white-5 dark:border-light-8 rounded-[8px] flex justify-between items-center lg:mt-[30px] mt-[25px] lg:mb-9 mb-8">
            <div>
                <p class="text-primary dark:text-white text-xs  font-medium leading-[100%] tracking-[-0.12px] opacity-40">Your domain secret</p>
                <p class="text-primary dark:text-white text-base  font-medium leading-[100%] tracking-[-0.16px] mt-1.5" id="transfercode">{{ data }}</p>
            </div>

            <img src="../../../assets/svgs/copy.svg" alt="Copy" class="cursor-pointer dark:brightness-[100]" @click="copytext('transfercode')">
        </div>

        <Btn class="w-full" bg-color="bg-blue" border-color="border border-blue" btn-padding="lg:py-[11px] py-[6px]" text-color="text-white" @click="$emit('closeModel',false)">Close</Btn>
      </div>
    </div>
  </template>
  
  
  <script setup>
  import Btn from "../../../components/Helper/Btn.vue";
  
  const copytext = (elementId) => {
  navigator.clipboard.writeText(document.getElementById(elementId).innerText);
};

  const prop = defineProps(
      {
          data : {
              default : 'kGVoSd2313Fl',
          }
      }
  )
  </script>

  <style scoped>
.cus-min-w {
  @apply w-full !important
}
</style>