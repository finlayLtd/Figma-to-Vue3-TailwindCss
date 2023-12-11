<template>
  <div style="box-shadow: 0px 4.94653px 16.48842px 0px rgba(0, 0, 0, 0.05)">
    <div class="flex items-start justify-between">
      <div class="flex items-center mb-6">
        <img
          src="../../assets/svgs/cart-desh.svg"
          class="min-w-[22px] dark:brightness-[100]"
          alt="Cart"
        />
        <p
          class="text-primary dark:text-white ml-2 lg:text-xl text-[17px] font-bold leading-[100%] tracking-[0.2px]"
        >
          Cart
        </p>
      </div>

      <div class="hidden items-center lg:flex" >
        <img src="../../assets/svgs/edit.svg" class="dark:brightness-[100]" alt="Edit">
        <p class="pl-2 text-primary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px]" >Edit WHOIS and nameservers</p>
      </div>
    </div>

    <div class="[&>*:last-child]:mb-0" >
      <div
        class="py-[15px] px-3.5 bg-[#F9F9FA] mb-3 dark:bg-[#F9F9FA14] border-2 border-[#026DEB26] shadow-blue-cart rounded-[10px] flex justify-between items-center"
        v-for="(paymentList , index) in list"
      >
        <div class="flex items-center">
          <img
            :src="getImageUrl(paymentList.icon)"
            class="dark:brightness-[100]"
            alt="Webhosting"
          />
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[15px] font-bold leading-[115%] tracking-[0.15px]"
            >
              {{ paymentList.title }}
            </p>
            <p
              class="text-primary-50 dark:text-white-50 mt-[5px] text-sm font-normal leading-[115%] tracking-[0.14px]"
            >
              {{ paymentList.time }}
            </p>
          </div>
        </div>

        <div>
          <p
            class="text-primary dark:text-white lg:text-sm text-[15px] font-bold leading-[130%]"
          >
            ${{ paymentList.price.toFixed(2) }}
            <del
              class="text-primary-50 lg:text-sm text-[14px] dark:text-white-50 font-normal"
              >${{ paymentList.del.toFixed(2) }}</del
            >
          </p>
          <img
            src="../../assets/svgs/bin40.svg"
            class="mt-[7px] ml-auto"
            alt="Bin"
          />
        </div>
      </div>
      
      <div class="my-[30px]">

        <p class="text-primary dark:text-white mb-5 text-base font-medium leading-[100%] tracking-[0.16px]" >Select payment method</p>
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-3">
            <div class="p-3 border rounded-[8px] flex justify-between cursor-pointer" :class="paymentMethod == 0 ? 'border-blue-80' : 'border-light dark:border-light-white-8'" @click="paymentMethod = 0">
                <div class="flex items-center">
                    <img src="../../assets/svgs/paypal.svg" alt="Paypal">
                    <p class="ml-2.5 text-secondary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px]" >Paypal</p>
                </div>
                <img src="../../assets/svgs/check.svg" v-if="paymentMethod == 0" class="min-w-[18px] max-w-[18px]" alt="Check">
            </div>
            <div class="p-3 border rounded-[8px] flex justify-between cursor-pointer" :class="paymentMethod == 1 ? 'border-blue-80' : 'border-light dark:border-light-white-8'" @click="paymentMethod = 1">
                <div class="flex items-center">
                    <img src="../../assets/svgs/visa.svg" alt="Paypal">
                    <p class="ml-2.5 text-secondary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px]" >Debit Cards / Credit</p>
                </div>
                <img src="../../assets/svgs/check.svg"  v-if="paymentMethod == 1" class="min-w-[18px] max-w-[18px]" alt="Check">
            </div>
        </div>
      </div>

      <div
        class="my-5 py-[18px] px-4 rounded-[10px] bg-[#F9F9FA] dark:bg-[#F9F9FA14]"
      >
        <div class="flex justify-between items-center">
          <p
            class="text-primary dark:text-white text-base font-bold leading-[100%] tracking-[0.16px]"
          >
            Total
          </p>
          <p
            class="text-primary dark:text-white text-[17px] font-bold leading-[100%] tracking-[0.17px]"
          >
            $ 0.00
          </p>
        </div>

        <hr class="dark:opacity-10 my-5" />

        <div class="flex justify-between items-center">
          <p
            class="text-primary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px] opacity-70"
          >
            Discount
          </p>
          <p
            class="text-tomato text-[15px] font-medium leading-[100%] tracking-[0.15px] opacity-70"
          >
            $ 0.00
          </p>
        </div>
        <div class="flex justify-between items-center mt-4">
          <p
            class="text-primary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px] opacity-70"
          >
            + VAT (21)%
          </p>
          <p
            class="text-primary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px] opacity-70"
          >
            $ 2.50
          </p>
        </div>
      </div>

      <Btn
        class="w-full"
        bg-color="bg-blue"
        text-color="text-white"
        border-color="border-blue"
        btn-padding="py-[11px] px-5"
        >order</Btn
      >
    </div>
  </div>
</template>

<script setup>
import Btn from "../../components/Helper/Btn.vue";


import {ref} from 'vue'
const paymentMethod = ref(0)

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};

const props = defineProps({
    list : {
        default : []
    }
})
</script>
