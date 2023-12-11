<template>
    <div
      class="grid place-items-center max-w-[536px] mx-auto  rounded-[20px] border border-white-5"
    >
      <div
        class="lg:p-[30px] p-5 shadow-black-8 rounded-[14px] w-full"
      >
        <div class="flex justify-between items-center">
          <button class="rounded-[6.119px] bg-light-white dark:bg-[#f5f7f80a] py-2 px-3">
            <img src="../../../assets/svgs/feedback-plus.svg" class="dark:brightness-[100]" alt="Code" />
          </button>
          <button>
            <img src="../../../assets/svgs/close.svg" class="dark:brightness-[100]" alt="Close" @click="$emit('closeModel',false)"/>
          </button>
        </div>
  
        <h4
          class="text-secondary dark:text-white text-[20px] lg:text-[22px]  font-bold leading-[100%] tracking-[0.168px] pt-[15px] pb-[26px]"
        >
          Renewal domain
        </h4>
  
        <div
          class="px-3.5 py-[14px] flex justify-between items-center rounded-[7.649px] border-[0.765px] border-solid border-primary-8 dark:border-white-8 dark:bg-[#f9f9fa0a] bg-[#f9f9fa]"
        >
          <div class="flex justify-between items-center">
            <img src="../../../assets/svgs/earth.svg" alt="">
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px] ml-2  font-medium leading-[115%] tracking-[0.115px]"
            >
              serverly.com
            </p>
          </div>
  
          <p
            class="text-primary-50 dark:text-white-50 text-[14px]  font-normal leading-[115%] lg:block hidden"
          >
            12 months
          </p>
        </div>
  
        <hr class="lg:my-[15px] my-5 dark:opacity-10" />
  
        <div class="block lg:grid grid-cols-2 gap-2.5">
  
          <div
            class="px-3.5 py-[14px] mr-2 w-full flex border dark:border-white-8 justify-between items-center grow rounded-[6.119px] cursor-pointer lg:my-0 my-2.5"
            v-for="(renuwal , ind) in data" :key="ind" :class="[ind == 0 ? 'col-start-1 col-end-3' : '' , selectRenewal.index == ind ? 'border-[#026deb80] dark:border-[#026deb80] bg-blue-5' : '' ]"
            @click="selectRenewal.index = ind , selectRenewal.price = renuwal.price"
          >
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[115%]"
            >
              {{ renuwal.year }}
              <span
                class="ml-2 bg-blue-80 px-[3.825px] py-[3px] text-white text-[13px]  font-medium leading-[15.299px] rounded-[3.825px]"
                v-if="renuwal.isPopular"
                >Popular</span
              >
            </p>
  
            <p
              class="text-primary dark:text-white text-right lg:text-[15px] text-[14px]  font-bold leading-[100%] tracking-[0.115px] flex"
            >
            <img src="../../../assets/svgs/check.svg" class="mr-1" alt="Check" v-if="selectRenewal.index == ind" />
              $ {{ renuwal.price }}
            </p>
          </div>
  
        </div>
  
        <div class="mt-4 mb-[27px] bg-[#F9F9FA] dark:bg-[#f9f9fa0a] rounded-[7.649px]">
          <div
            class="p-4 flex justify-between items-center"
          >
            <p
              class="text-primary dark:text-white lg:text-[16px] text-[15px]  font-bold leading-[115%]"
            >
              Total
            </p>
  
            <p
              class="text-primary dark:text-white text-right lg:text-[17px] text-[16px]  font-bold leading-[100%] tracking-[0.13px]"
            >
              $ {{ (selectRenewal.price + 2.50).toFixed(2) }}
            </p>
          </div>
          <hr class="ml-[10.709px] mr-[10.194px] dark:opacity-10" />
          <div
            class="p-4 flex justify-between items-center"
          >
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[115%] opacity-70"
            >
              + VAT (21)%
            </p>
  
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[115%] opacity-70"
            >
              $ 2.50
            </p>
          </div>
        </div>
  
        <div class="flex">
          <Btn
            class="w-full text-[12.239px] mr-1 font-medium"
            btn-padding=" lg:py-2.5 py-1"
            text-color="text-primary dark:text-white"
            bg-color="bg-light-white dark:bg-light-white-8"
            border-color="border-light-white"
            @click="$emit('closeModel',false)"
            >Cancel</Btn
          >
          <Btn
            class="w-full whitespace-nowrap text-[12.239px] ml-1 font-medium"
            text-color="text-white"
            bg-color="bg-[#1378EF]"
            border-color="border-[#1378EF]"
            >Renewal domain</Btn
          >
        </div>
      </div>
    </div>
  </template>
  
  
  <script setup>
  import Btn from "../../../components/Helper/Btn.vue";
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