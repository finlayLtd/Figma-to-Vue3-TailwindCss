<template>
  <div class="bg-white dark:bg-white-5 w-full rounded-[14px] mb-10">
    <div
      class="px-5 py-3.5 flex justify-between items-center lg:border-b border-dark-5"
    >
      <h3
        class="text-primary dark:text-white lg:text-lg text-[16px] font-medium leading-[normal] tracking-[0.18px]"
      >
        Support data
      </h3>
      <div class="flex items-center">
        <Search class="lg:w-full w-[150px]" />
        <div class="hidden lg:block">
          <slot name="filter">
            <Btn
              bg-color="bg-blue"
              text-color="text-white"
              border-color="border border-blue"
              class="hidden items-center whitespace-nowrap justify-center text-[15px] leading-[22.5px] min-w-fit font-medium ml-5 lg:flex"
            >
              Create server
              <img
                src="../../../assets/svgs/plus-blue.svg"
                class="ml-1.5"
                alt="Plus"
              />
            </Btn>
          </slot>
        </div>
      </div>
    </div>
    <div class="mb-3.5 px-4 lg:hidden block">
      <div class="lg:hidden block">
        <slot name="filter">
          <Btn
            bg-color="bg-blue"
            text-color="text-white"
            border-color="border border-blue"
            class="flex items-center justify-center text-[15px] leading-[22.5px] w-full font-medium"
          >
            Create server
            <img
              src="../../../assets/svgs/plus-blue.svg"
              class="ml-1.5"
              alt="Plus"
            />
          </Btn>
        </slot>
      </div>
    </div>
    <Table
      :headings="head"
      :data="data"
      :isHeadDisplay="false"
      data-position="text-left"
    >
      <template #number="{ tdata }">
        <div class="flex items-center lg:min-w-[250px] lg:max-w-[250px]">
          <div
            class="p-2 lg:mr-3 mr-2.5 rounded-[8px] bg-light-white group-hover:bg-white dark:group-hover:bg-light-white-8 dark:bg-light-white-8"
          >
            <img
              src="../../../assets/svgs/dashbord/flag.svg"
              class="h-[20px] aspect-square block min-w-[20px] dark:brightness-[100]"
              alt="Window"
            />
          </div>
          <div>
            <p
              class="text-primary-50 dark:text-white-50 text-sm font-normal leading-[100%] tracking-[0.14px]"
            >
              Number Ticket
            </p>
            <p
              class="text-primary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px] mt-[7px]"
            >
              # {{ tdata.number }}
            </p>
          </div>
        </div>
      </template>

      <template #title="{ tdata }">
        <p
          class="text-primary-50 dark:text-white-50 text-[13px] lg:text-sm font-normal leading-[100%] tracking-[0.14px]"
        >
          Title
        </p>
        <p
          class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[100%] tracking-[0.15px] mt-[7px] max-w-[171px] text-ellipsis overflow-hidden whitespace-nowrap"
        >
          {{ tdata.title }}
        </p>
      </template>

      <template #request="{ tdata }">
        <p
          class="text-primary-50 dark:text-white-50 text-[13px] lg:text-sm font-normal leading-[100%] tracking-[0.14px]"
        >
          Request Type
        </p>
        <p
          class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[100%] tracking-[0.15px] mt-[7px] min-w-max"
        >
          {{ tdata.request }}
        </p>
      </template>

      <template #date="{ tdata }">
        <p
          class="text-primary-50 dark:text-white-50 text-[13px] lg:text-sm font-normal leading-[100%] tracking-[0.14px]"
        >
          Date
        </p>
        <p
          class="text-primary dark:text-white text-[14px] lg:text-[15px] font-medium leading-[100%] tracking-[0.15px] mt-[7px] min-w-max"
        >
          {{ tdata.date }}
        </p>
      </template>
      <template #action="{ tdata }">
        <span
          class="flex items-center lg:w-fit w-full action-full justify-center min-w-max bg-green-10 rounded-[16px] py-1.5 px-1.5 ml-auto"
          v-if="tdata.status == 'Successful'"
        >
          <img src="../../../assets/svgs/check-green.svg" alt="Check" />

          <p
            class="text-green text-center text-[14px] lg:text-[15px] ml-[5px] font-medium leading-[100%] tracking-[0.15px]"
          >
            Successful
          </p>
        </span>
        <span
          class="flex items-center bg-tomato-10 rounded-[16px] py-1.5 px-1.5 lg:w-fit w-full action-full justify-center ml-auto"
          v-else-if="tdata.status == 'Canceled'"
        >
          <img src="../../../assets/svgs/suspend.svg" alt="Check" />

          <p
            class="text-tomato text-center text-[14px] lg:text-[15px] ml-[5px] font-medium leading-[100%] tracking-[0.15px]"
          >
            Canceled
          </p>
        </span>
        <span
          class="flex items-center bg-orange-10 rounded-[16px] py-1.5 px-1.5 lg:w-fit w-full action-full justify-center ml-auto"
          v-else
        >
          <img src="../../../assets/svgs/attract.svg" alt="Check" />

          <p
            class="text-orange text-center text-[14px] lg:text-[15px] ml-[5px] font-medium leading-[100%] tracking-[0.15px]"
          >
            Process
          </p>
        </span>
      </template>
    </Table>
    <Pagination />
  </div>
</template>

<script setup>
import Table from "@/components/server/Table.vue";
import Pagination from "@/components/Helper/Pagination.vue";
import Btn from "@/components/Helper/Btn.vue";
const props = defineProps({
  data: {
    required: true,
  },
  head: {
    required: true,
  },
});
</script>
