<template>
  <div
    class="shadow-[0px_1px_1px_0px_#E4E7EC] dark:shadow-none grid place-items-center aspect-square md:min-w-[640px] min-w-[calc(100vw-32px)] rounded-[20px] dark:bg-[#f8f9fc14] bg-[#F8F9FC]" 
  >
    <div
      class="sm:p-[23px] p-3 sm:max-w-[410px] max-w-[240px] w-full shadow-black-8 dark:shadow-none rounded-[10.709px] bg-white dark:bg-[#272729]"
    >
      <div class="flex justify-between items-center">
        <button class="rounded-[6.119px] bg-light-white dark:bg-white-5 py-1.5 px-2.5">
          <img src="../../assets/svgs/feedback-plus.svg" class="dark:brightness-[100] sm:w-[15px] w-[10px]" alt="Renuwal" />
        </button>
        <button>
          <img src="../../assets/svgs/close.svg" class="dark:brightness-[100] sm:w-[15px] w-[9px]" alt="Close" />
        </button>
      </div>

      <h4
        class="text-secondary dark:text-white sm:text-[16.828px] text-[10px] font-bold leading-[100%] tracking-[0.168px] sm:pt-[15px] pt-[8px] sm:pb-[26px] pb-[15px]"
      >
        Renewal domain
      </h4>

      <div
        class="sm:pl-[10.709px] sm:pr-[10.194px] sm:pt-[11.091px] sm:pb-[10.327px] p-1.5 flex justify-between items-center rounded-[7.649px] border-[0.765px] border-solid border-primary-8 bg-[#f9f9fa] dark:bg-[#F9F9FA0A]"
      >
        <div class="flex justify-between items-center">
          <img src="../../assets/svgs/earth.svg" class="dark:brightness-[100] sm:w-[16px] w-[8px]" alt="Earth">
          <p
            class="text-primary dark:text-white sm:text-[11.474px] text-[6.7px] sm:ml-2 ml-1 font-medium leading-[115%] tracking-[0.115px]"
          >
            serverly.com
          </p>
        </div>

        <p
          class="text-primary-50 dark:text-white-50 sm:text-[10.709px] text-[6.2px] font-normal leading-[115%]"
        >
          48 months
        </p>
      </div>

      <hr class="sm:my-[15px] my-[8px] dark:opacity-10" />

      <div class="grid grid-cols-2 sm:gap-2 gap-1">

        <div
          class="sm:pl-[10.709px] sm:pr-[10.194px] sm:pt-[11.091px] sm:pb-[10.327px] p-1.5 mr-2 w-full flex border dark:border-white-8 justify-between items-center grow rounded-[6.119px] cursor-pointer"
          v-for="(renuwal , ind) in data" :key="ind" :class="[ind == 0 ? 'col-start-1 col-end-3' : '' , selectRenewal.index == ind ? 'border-[#026deb80] bg-blue-5' : '' ]"
          @click="selectRenewal.index = ind , selectRenewal.price = renuwal.price"
        >
          <p
            class="text-primary dark:text-white sm:text-[11.474px] text-[6.7px] font-medium relative leading-[100%]"
          >
            {{ renuwal.year }}
            <span
              class="sm:ml-2 ml-[2px] bg-blue-80 sm:px-[3.825px] absolute top-0 left-full bottom-0 flex justify-center items-center sm:py-[3px] p-[1px] text-white sm:text-[9px] text-[5.8px] font-medium leading-[15.299px] rounded-[3.825px]"
              v-if="renuwal.isPopular"
              >Popular</span
            >
          </p>

          <p
            class="text-primary dark:text-white text-right sm:text-[11.474px] text-[6.7px] font-bold leading-[100%] tracking-[0.115px] flex"
          >
          <img src="../../assets/svgs/check.svg" class="mr-1 sm:w-[13px] w-[8px]" v-if="selectRenewal.index == ind" alt="Check" />
            $ {{ renuwal.price }}
          </p>
        </div>

      </div>

      <div class="sm:mt-4 mt-2 sm:mb-[27px] mb-4 bg-[#F9F9FA] dark:bg-[#F9F9FA0A] rounded-[7.649px]">
        <div
          class="sm:pl-[10.709px] px-[7.2px] pt-[7.2px] pb-[9px] sm:pr-[10.194px] sm:pt-[11.091px] sm:pb-[10.327px] flex justify-between items-center"
        >
          <p
            class="text-primary dark:text-white sm:text-[12.239px] text-[7.1px] font-bold leading-[115%]"
          >
            Total
          </p>

          <p
            class="text-primary dark:text-white text-right sm:text-[13.004px] text-[7.6px]  font-bold leading-[100%] tracking-[0.13px]"
          >
            $ {{ (selectRenewal.price + 2.50).toFixed(2) }}
          </p>
        </div>
        <hr class="sm:ml-[10.709px] sm:mr-[10.194px] mx-[7.2px] dark:opacity-10" />
        <div
          class="sm:pl-[10.709px] px-[7.2px] pt-[7.2px] pb-[9px] sm:pr-[10.194px] sm:pt-[11.091px] sm:pb-[10.327px] flex justify-between items-center"
        >
          <p
            class="text-primary dark:text-white sm:text-[11.474px] text-[6.7px] font-medium leading-[115%] opacity-70"
          >
            + VAT (21)%
          </p>

          <p
            class="text-primary dark:text-white sm:text-[11.474px] text-[6.7px] font-medium leading-[115%] opacity-70"
          >
            $ 2.50
          </p>
        </div>
      </div>

      <div class="flex">
        <Btn
          class="w-full lg:text-[12.239px] text-[7px] mr-1 font-medium py-2.5"
          text-color="text-primary dark:text-white"
          bg-color="bg-light-white dark:bg-light-white-8"
          border-color="border-light-white"
          btn-padding="py-[6.2px]"
          >Cancel</Btn
        >
        <Btn
          class="w-full whitespace-nowrap lg:text-[12.239px] text-[7px] ml-1 font-medium"
          text-color="text-white"
          bg-color="bg-[#1378EF]"
          border-color="border-[#1378EF]"
          btn-padding="py-[6.2px]"
          >Renewal domain</Btn
        >
      </div>
    </div>
  </div>
</template>


<script setup>
import Btn from "../Helper/Btn.vue";
import {ref} from 'vue'

const prop = defineProps(
    {
        data : {
            required : true,
        }
    }
)

const selectRenewal = ref(
    {
        index : 3 ,
        price : 29.99
    }
)
</script>