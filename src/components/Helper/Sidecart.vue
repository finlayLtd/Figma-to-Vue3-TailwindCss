<template>
  <div style="box-shadow: 0px 4.94653px 16.48842px 0px rgba(0, 0, 0, 0.05)">
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

    <div>
      <slot></slot>

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
        >Continue to order</Btn
      >

      <hr class="my-5 dark:opacity-10" />
      <Btn
        class="w-full"
        bg-color="bg-white dark:bg-white-5"
        text-color="text-blue"
        border-color="border border-blue"
        btn-padding="py-[9px]"
      >
        <div class="mx-auto w-fit flex">
          <img src="../../assets/svgs/dashbord/www-plus-blue.svg" alt="WWW" />
          <p class="pl-2">Add another domain</p>
        </div>
      </Btn>
      <Btn
        class="w-full my-2.5"
        bg-color="bg-white dark:bg-white-5"
        text-color="text-blue"
        border-color="border border-blue"
        btn-padding="py-[9px]"
      >
        <div class="mx-auto w-fit flex">
          <img
            src="../../assets/svgs/dashbord/cloud-server-plus-blue.svg"
            alt="WWW"
          />
          <p class="pl-2">Add another VPS</p>
        </div>
      </Btn>
      <Btn
        class="w-full"
        bg-color="bg-white dark:bg-white-5"
        text-color="text-blue"
        border-color="border border-blue"
        btn-padding="py-[9px]"
      >
        <div class="mx-auto w-fit flex">
          <img
            src="../../assets/svgs/dashbord/dedicated-server-plus-blue.svg"
            alt="WWW"
          />
          <p class="pl-2">Add another dedicated server</p>
        </div>
      </Btn>
    </div>
  </div>
</template>

<script setup>
import Btn from "../../components/Helper/Btn.vue";
</script>
