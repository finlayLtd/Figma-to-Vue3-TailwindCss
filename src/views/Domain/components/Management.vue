<template>
  <div>
    <div class="bg-white dark:bg-white-5 rounded-[14px]">
      <div
        class="lg:flex block justify-between items-center py-[18px] lg:px-5 px-4 border-b border-light-white-blue dark:border-light-white-blue-8"
      >
        <div class="flex items-center">
          <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
            <img
              src="../../../assets/svgs/dns.svg"
              class="dark:brightness-[100]"
              alt="DNS"
            />
          </div>
          <div class="ml-3">
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              DNS Setting
            </p>
            <p
              class="mt-[7px] text-primary-50 dark:text-white-50 lg:text-sm text-[13px]  font-normal leading-[100%] tracking-[0.14px]"
            >
              ns1.serverly.com : ns2.serverly.com
            </p>
          </div>
        </div>
        <Btn
          bg-color="bg-blue-5 dark:bg-white-5"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
          text-size="lg:text-[15px] text-[14px]"
          textColor="text-blue dark:text-white"
          border-color="border-0"
          @click="isDnsOpen = true"
          >Change DNS</Btn
        >
        <Model :isopen="isDnsOpen">
          <Dns @closeModel="(mvalue) => isDnsOpen = mvalue" />
        </Model>
      </div>
      <div class="lg:flex block justify-between items-center py-[18px] px-5">
        <div class="flex items-center">
          <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
            <img
              src="../../../assets/svgs/nameserver.svg"
              class="dark:brightness-[100]"
              alt="DNS"
            />
          </div>
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              Nameserver settings
            </p>
            <p
              class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
            >
              Nameserver settings
            </p>
          </div>
        </div>
        <Btn
        bg-color="bg-blue-5 dark:bg-white-5"
        textColor="text-blue dark:text-white"
          border-color="border-0"
          text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
          >Change Nameserver</Btn
        >
      </div>
    </div>

    <div
      class="lg:flex block justify-between items-center py-[18px] px-5 bg-white dark:bg-white-5 my-4 rounded-[14px]"
    >
      <div class="flex items-center">
        <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
          <img
            src="../../../assets/svgs/renewal.svg"
            class="dark:brightness-[100]"
            alt="DNS"
          />
        </div>
        <div class="ml-3">
          <p
            class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
          >
          Renewal
          </p>
          <p
            class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
          >
          Registered until 10/19/2023
          </p>
        </div>
      </div>
      <Btn
        bg-color="bg-blue"
        textColor="text-white"
        border-color="border-0"
        text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
        @click="isRenualOpen = true"
        >Extend</Btn
      >

      <Model :isopen="isRenualOpen" >
        <RenewalModel class="bg-white dark:bg-black-blue" :data="renewalDomain" @closeModel="(mvalue) => isRenualOpen = mvalue"/>
      </Model>
    </div>

    <div class="bg-white dark:bg-white-5  rounded-[14px]">
      <div
        class="lg:flex block justify-between items-center py-[18px] px-5 border-b border-light-white-blue dark:border-light-white-blue-8"
      >
        <div class="flex items-center">
          <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
            <img
              src="../../../assets/svgs/request-code.svg"
              class="dark:brightness-[100]"
              alt="DNS"
            />
          </div>
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
            Request transfer code
            </p>
            <p
              class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
            >
            Registered until 10/19/2023
            </p>
          </div>
        </div>
        <Btn
          bg-color="bg-blue"
          textColor="text-white"
          border-color="border-0"
          text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
          @click="isTransferOpen = true"
          >Request</Btn
        >

          <Model :isopen="isTransferOpen">
            <Transfercode @closeModel="(mvalue) => isTransferOpen = mvalue" />
          </Model>
      </div>
      <div class="lg:flex block justify-between items-center py-[18px] px-5">
        <div class="flex items-center">
          <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
            <img
              src="../../../assets/svgs/turmineted-domain.svg"
              class="dark:brightness-[100]"
              alt="DNS"
            />
          </div>
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
            Terminate domain
            </p>
            <p
              class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
            >
            Closed domain
            </p>
          </div>
        </div>
        <Btn
          bg-color="bg-transparent"
          textColor="text-tomato-8"
          border-color="border-0"
          text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
          btn-padding="p-0"
          @click="isTerminetedOpen = true"
          >Delete domain</Btn
        >

        <Model :isopen="isTerminetedOpen">
          <Terminate @closeModel="(mvalue) => isTerminetedOpen = mvalue" />
        </Model>
      </div>
    </div>

  </div>
</template>

<script setup>
import Btn from "../../../components/Helper/Btn.vue";
import RenewalModel from "./RenewalModel.vue";
import Model from './Model.vue'
import Dns from './Dns.vue'
import {ref} from 'vue'
import Transfercode from "./Transfercode.vue";
import Terminate from "./Terminate.vue";
const isRenualOpen = ref(false)
const isTransferOpen = ref(false)
const isTerminetedOpen = ref(false)
const isDnsOpen = ref(false)

const renewalDomain = [
  {
    year: "1 Year",
    isPopular: false,
    price: 4.99,
  },
  {
    year: "2 Year",
    isPopular: true,
    price: 9.99,
  },
  {
    year: "3 Year",
    isPopular: false,
    price: 15.99,
  },
  {
    year: "4 Year",
    isPopular: false,
    price: 29.99,
  },
  {
    year: "5 Year",
    isPopular: false,
    price: 39.99,
  },
];
</script>


<style scoped>
.model-dark {
  @apply dark:bg-black !important
}
</style>