<template>
  <div class="grid xl:grid-cols-3 grid-cols-1 gap-5">
    <div
      class="bg-white dark:bg-white-5 py-[25px] rounded-[14px] border border-light-white-blue dark:border-light-white-blue-8"
      v-for="(cdata , index) in chartdata"
      :key="index"
    >
      <h3
        class="text-secondary dark:text-white lg:text-lg text-[16px]  font-bold leading-[100%] mb-[30px] px-5"
      >
        CPU Utilization (%)
      </h3>
      <Chart :canvasid="`canvas-${index}`" :data="cdata.data" :label="cdata.label" />
      <hr class="mx-5 dark:opacity-0" />

      <div class="flex items-end mt-5">
        <div class="grow">
          <p
            class="text-center text-secondary-70 dark:text-white-70 lg:text-sm text-[11px]  font-medium leading-[100%]"
          >
            CPU Utilization
          </p>
        </div>
        <div class="grow flex">
          <div class="grow">
            <p
              class="text-secondary-50 dark:text-white-50 lg:text-[13px] text-[10px]  font-normal leading-[100%]"
            >
              Min
            </p>
            <p
              class="text-secondary-70 dark:text-white-70 lg:text-[13px] text-[11px]  font-normal leading-[100%] mt-2.5"
            >
              6.4%
            </p>
          </div>
          <div class="grow">
            <p
              class="text-secondary-50 dark:text-white-50 lg:text-[13px] text-[10px]  font-normal leading-[100%]"
            >
              Average
            </p>
            <p
              class="text-secondary-70 dark:text-white-70 lg:text-[13px] text-[11px]  font-normal leading-[100%] mt-2.5"
            >
              6.4%
            </p>
          </div>
          <div class="grow lg:hidden block">
            <p
              class="text-secondary-50 dark:text-white-50 lg:text-[13px] text-[10px]  font-normal leading-[100%]"
            >
              Max
            </p>
            <p
              class="text-secondary-70 dark:text-white-70 lg:text-[13px] text-[11px]  font-normal leading-[100%] mt-2.5"
            >
              9.6%
            </p>
          </div>
        </div>
      </div>
    </div>
    <div></div>
    <div></div>
  </div>
</template>

<script setup>
import Chart from "../../../components/Layout/Chart.vue";
import { ref } from "vue";

const chartdata = ref([
  {
    data: [0, 40, 0, 0, 0, 40, 0, 40],
    label: [
      "18 Apr",
      "19 Apr",
      "20 Apr",
      "21 Apr",
      "22 Apr",
      "23 Apr",
      "24 Apr",
    ],
  },
  {
    data: [0, 40, 0, 0, 0, 40, 0, 40],
    label: [
      "18 Apr",
      "19 Apr",
      "20 Apr",
      "21 Apr",
      "22 Apr",
      "23 Apr",
      "24 Apr",
    ],
  },
  {
    data: [0, 40, 0, 0, 0, 40, 0, 40],
    label: [
      "18 Apr",
      "19 Apr",
      "20 Apr",
      "21 Apr",
      "22 Apr",
      "23 Apr",
      "24 Apr",
    ],
  },
]);

</script>

