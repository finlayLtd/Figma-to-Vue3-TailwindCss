<template>
  <div
    class="grid bg-white dark:bg-black-blue place-items-center max-w-[536px] mx-auto rounded-[20px] border border-white-5"
  >
    <div
      class="lg:p-[30px] p-5 shadow-black-8 dark:shadow-none rounded-[14px] w-full"
    >
      <div class="flex justify-between items-center">
        <button
          class="rounded-[6.119px] bg-light-white dark:bg-[#f5f7f80a] py-2 px-3"
        >
          <img
            src="../../assets/svgs/plus-gray.svg"
            class="brightness-[0] dark:brightness-[100] min-w-[20px] aspect-square"
            alt="Code"
          />
        </button>
        <button>
          <img
            src="../../assets/svgs/close.svg"
            class="dark:brightness-[100]"
            alt="Close"
            @click="$emit('closeModel', false)"
          />
        </button>
      </div>

      <h4
        class="text-secondary dark:text-white text-[20px] lg:text-[22px] font-bold leading-[100%] tracking-[0.168px] pt-[15px]"
      >
        Deposit
      </h4>
      <p
        class="text-[15px] font-normal leading-[140%] tracking-[0.15px] text-secondary-50 dark:text-white-50 mt-2.5"
      >
        Refill balance account.
      </p>

      <p
        class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white mt-[30px] mb-5"
      >
        Select payment method
      </p>
      <div class="grid lg:grid-cols-2 grid-cols-1 gap-3">
        <div
          class="p-3 border rounded-[8px] flex justify-between cursor-pointer"
          :class="
            paymentMethod == 0
              ? 'border-blue-80 bg-blue-5'
              : 'border-light dark:border-light-white-8'
          "
          @click="paymentMethod = 0"
        >
          <div class="flex items-center">
            <img src="../../assets/svgs/paypal.svg" alt="Paypal" />
            <p
              class="ml-2.5 text-secondary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px]"
            >
              Paypal
            </p>
          </div>
          <img
            src="../../assets/svgs/check.svg"
            v-if="paymentMethod == 0"
            class="min-w-[18px] max-w-[18px]"
            alt="Check"
          />
        </div>
        <div
          class="p-3 border rounded-[8px] flex justify-between cursor-pointer"
          :class="
            paymentMethod == 1
              ? 'border-blue-80 bg-blue-5'
              : 'border-light dark:border-light-white-8'
          "
          @click="paymentMethod = 1"
        >
          <div class="flex items-center">
            <img src="../../assets/svgs/visa.svg" alt="Paypal" />
            <p
              class="ml-2.5 text-secondary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px]"
            >
              Debit Cards / Credit
            </p>
          </div>
          <img
            src="../../assets/svgs/check.svg"
            v-if="paymentMethod == 1"
            class="min-w-[18px] max-w-[18px]"
            alt="Check"
          />
        </div>
      </div>

      <p
        class="text-base font-medium leading-[100%] text-primary dark:text-white tracking-[0.16px] mt-[30px] mb-5"
      >
        Amount
      </p>
      <div
        class="relative dark:bg-white-5 bg-white border border-light dark:border-light-8 shadow-light-white dark:shadow-input-dark rounded-lg px-1"
      >
        <input
          type="number"
          id="floating_filled"
          class="block px-5 pb-2.5 pt-5 w-full text-[16px] text-primary bg-transparent dark:text-white dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=""
          v-model="refillbalance"
        />
        <label class="absolute dark:text-white text-[16px] opacity-0 bottom-0 -translate-y-[40%] translate-x-3/4" :class="refillbalance ? 'opacity-100' : 'peer-focus:opacity-100 '">$</label>
        <label
          for="floating_filled"
          class="absolute text-[16px] text-primary opacity-40 dark:text-gray-400 duration-300 transform -translate-y-3.5 scale-75 top-3.5 z-10 origin-[0] left-3.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3.5"
          >Refill amount</label
        >
      </div>

      <div
        class="mb-[27px] bg-[#F9F9FA] dark:bg-[#f9f9fa0a] rounded-[7.649px] mt-5"
      >
        <div class="p-4 flex justify-between items-center">
          <p
            class="text-primary dark:text-white lg:text-[16px] text-[15px] font-bold leading-[115%]"
          >
            Total
          </p>

          <p
            class="text-primary dark:text-white text-right lg:text-[17px] text-[16px] font-bold leading-[100%] tracking-[0.13px]"
          >
            $ 2.50
          </p>
        </div>
        <hr class="ml-[10.709px] mr-[10.194px] dark:opacity-10" />
        <div class="p-4 flex justify-between items-center">
          <p
            class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[115%] opacity-70"
          >
            + VAT (21)%
          </p>

          <p
            class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[115%] opacity-70"
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
          @click="$emit('closeModel', false)"
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
import Btn from "../../components/Helper/Btn.vue";
import { ref } from "vue";
import TextInput from "../Helper/TextInput.vue";
const paymentMethod = ref(0);
const refillbalance = ref('')
</script>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>