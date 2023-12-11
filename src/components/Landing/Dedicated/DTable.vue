<template>
  <div
    class="mt-6 bg-white dark:bg-white-5 shadow-[0px_22px_27px_0px_rgba(246,246,246,0.50)] dark:shadow-none rounded-[12px]"
  >
    <div class="py-[18px] px-[25px]">
      <h2 class="text-primary dark:text-white text-[22px] font-bold">
        Filter for the server models
      </h2>
    </div>

    <div class="overflow-x-auto">
      <Table
        :data="data.data"
        headPosition="justify-start"
        data-position="text-start"
        :headings="head"
      >
        <template #country="{ tdata }">
          <div class="flex justify-between items-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              viewBox="0 0 16 16"
              fill="none"
              class="lg:hidden mr-3 block"
            >
              <circle cx="8" cy="8" r="8" fill="#2AC869" />
            </svg>
            <img :src="`/src/assets/svgs/flags/${tdata.flag}`" alt="Flag" />
            <div class="items-center ml-7 lg:flex hidden">
              <p class="ml-2.5 text-primary dark:text-white">
                {{ tdata.countx }}
              </p>
            </div>
          </div>
        </template>

        <template #cpu="{ tdata }">
          <p class="text-primary dark:text-white min-w-max">{{ tdata.cpu }}</p>
        </template>

        <template #bench="{ tdata }">
          <p class="text-primary dark:text-white">{{ tdata.bench }}</p>
        </template>

        <template #cores="{ tdata }">
          <p class="text-primary dark:text-white">{{ tdata.cores }}</p>
        </template>

        <template #base="{ tdata }">
          <p class="text-primary dark:text-white">{{ tdata.base }}</p>
        </template>

        <template #turbo="{ tdata }">
          <p class="text-primary dark:text-white">{{ tdata.turbo }}</p>
        </template>

        <template #ram="{ tdata }">
          <p class="text-primary dark:text-white min-w-max">{{ tdata.ram }}</p>
        </template>

        <template #ssd="{ tdata }">
          <p class="text-primary dark:text-white min-w-max">{{ tdata.ssd }}</p>
        </template>

        <template #ddos="{ tdata }">
          <span
            class="flex items-center bg-[#2AC86915] rounded-[16px] w-max py-1.5 px-2"
          >
            <img src="../../../assets/svgs/shield-check.svg" alt="" />

            <p class="text-green ml-[5px]">Enable</p>
          </span>
        </template>

        <template #monthly="{ tdata }">
          <div class="flex lg:justify-between justify-end items-center">
            <p class="text-primary dark:text-white">{{ tdata.price }}</p>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              viewBox="0 0 16 16"
              fill="none"
              class="lg:block hidden"
            >
              <circle cx="8" cy="8" r="8" fill="#2AC869" />
            </svg>
          </div>
        </template>
        <template #action="{ tdata }">
          <div class="action-full w-full flex justify-center">
            <span class="flex ml-2">
              <p class="text-blue-80 pr-1">Order</p>
              <img src="../../../assets/svgs/cart.svg" alt="cart" />
            </span>
          </div>
        </template>
      </Table>
    </div>
  </div>
</template>

<script setup>
import Table from "../../server/Table.vue";
const props = defineProps({
  data: {
    required: true,
  },
  head: {
    required: true,
  },
});
</script>
