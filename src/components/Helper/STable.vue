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
      <Table :data="data.data" :headings="head" headPosition="justify-start">
        <template #country="{ tdata }">
          <div class="flex justify-between items-center">
            <img :src="`/src/assets/svgs/flags/${tdata.flag}`" alt="" />
            <div class="flex items-center ml-7">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="12"
                height="12"
                viewBox="0 0 12 12"
                fill="none"
              >
                <circle
                  cx="6"
                  cy="6"
                  r="6"
                  :fill="tdata.active ? '#2AC869' : '#FD3232'"
                />
              </svg>

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
            <img src="../../assets/svgs/shield-check.svg" alt="" />

            <p class="text-green ml-[5px]">Enable</p>
          </span>
        </template>

        <template #monthly="{ tdata }">
          <div class="flex lg:justify-between justify-end items-center">
            <p class="text-primary dark:text-white">{{ tdata.price }}</p>
            <router-link to="#" class="hidden lg:block">
              <span class="ml-2 flex">
                <p class="text-blue-80 pr-1">Order</p>
                <img src="../../assets/svgs/cart.svg" alt="cart" />
              </span>
            </router-link>
          </div>
        </template>
        <template #action="{ tdata }">
          <div class="action-full w-full flex justify-center" >
            <span class="flex ml-2">
              <p class="text-blue-80 pr-1">Order</p>
              <img src="../../assets/svgs/cart.svg" alt="cart" />
            </span>
          </div>
        </template>
      </Table>
    </div>
  </div>
</template>

<script setup>
import Table from "../server/Table.vue";
const props = defineProps({
  data: {
    required: true,
  },
  head: {
    required: true,
  },
});
</script>
