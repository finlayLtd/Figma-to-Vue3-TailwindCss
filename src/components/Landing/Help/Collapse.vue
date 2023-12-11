<template>
    <div class="container mx-auto">
      <div id="accordion-collapse" data-accordion="collapse">
        <div v-for="(faq , index) in listItem" :key="index" class="py-[17px] border-b border-[#1F202214] dark:border-white-8">
          <h2 id="accordion-collapse-heading-1">
            <button
              type="button"
              class="flex items-center justify-between w-full font-medium text-left lg:px-5 px-4"
              data-accordion-target="#accordion-collapse-body-1"
              aria-expanded="true"
              aria-controls="accordion-collapse-body-1"
              @click="activeFaq == index ? activeFaq = null : activeFaq = index"
            >
              <span class="font-medium leading-[150%]  text-dark dark:text-white" :class="btnText" >{{ faq.title }}</span>
              <img src="../../../assets/svgs/right-arrow-black.svg" class="dark:hidden block"  :class="activeFaq == index ? 'rotate-90' : ''" alt="Arrow" />
              <img src="../../../assets/svgs/swiper-arrow-white.svg"  class="dark:block hidden" :class="activeFaq == index ? 'rotate-90' : ''" alt="Arrow" />
            </button>
          </h2>
          <div
            id="accordion-collapse-body-1"
            :class="activeFaq == index ? '' : 'hidden'"
            aria-labelledby="accordion-collapse-heading-1"
          >
            <div
              class="mt-3 lg:px-5 px-4"
            >
              <p class="whitespace-pre-line lg:text-base text-[15px] font-normal leading-[140%] text-dark dark:text-white opacity-50" >{{ faq.disc }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive, ref } from "vue";
  
  const activeFaq = ref(0)
  const props = defineProps({
    listItem : {
        default : []
    },
    btnText : {
      default : 'text-[18px] lg:text-xl '
    }
  })
  </script>
  