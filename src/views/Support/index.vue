<template>
  <div class="flex justify-between items-center">
    <h1
      class="text-primary dark:text-white lg:text-3xl text-[24px] font-bold leading-[115%] tracking-[0.3px]"
    >
      Tickets
    </h1>

    <Menu as="div" class="relative inline-block text-left lg:px-0">
      <div>
        <MenuButton
          class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm lg:mt-0 lg:w-[128px]"
          ref="ticket"
          :is="isCreateTicketsOpen =! isCreateTicketsOpen"
        >
          <Btn
            bg-color="bg-blue"
            text-color="text-white"
            border-color="border border-blue"
            class="flex items-center justify-center text-[15px] leading-[22.5px] w-fit whitespace-nowrap font-medium"
            @click="isCreateTicketsOpen =! isCreateTicketsOpen"
          >
            <img
              src="../../assets/svgs/close-white.svg"
              v-if="isCreateTicketsOpen"
              class="brightness-[100] mr-1.5"
              alt="Close"
            />
            Create ticket
            <img
              src="../../assets/svgs/plus-blue.svg"
              class="ml-1.5"
              v-if="!isCreateTicketsOpen"
              alt="Plus"
            />
          </Btn>
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition ease-out duration-100"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
      >
        <MenuItems
          class="absolute right-0 z-10 mt-2 lg:w-[420px] w-[calc(100vw-32px)] origin-top-right rounded-[8px] bg-white dark:bg-[#323235] max-w-[420px] shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        >
          <div class="p-[25px]">
            <div class="flex justify-between">
              <h3
                class="text-primary dark:text-white text-2xl font-bold leading-[100%] tracking-[0.24px]"
              >
                New ticket
              </h3>
              <img
                src="../../assets/svgs/close.svg"
                class="cursor-pointer dark:brightness-[100]"
                @click="ticket.$el.click()"
                alt="Close"
              />
            </div>
            <p
              class="text-secondary-70 dark:text-white-50 mt-3 text-base font-normal leading-[100%] tracking-[0.16px]"
            >
              Create new ticket now.
            </p>

            <form class="mt-[30px]">
              <input
                class="py-5 px-3.5 w-full rounded-[8px] dark:text-white border dark:bg-white-5 dark:border-light-white-8 dark:shadow-light-black border-light outline-0 shadow-light-white text-primary opacity-50"
                placeholder="Write subject"
                type="text"
              />
              <div
                class="my-[18px] py-5 px-3.5 w-full rounded-[8px] border border-light outline-0 shadow-light-white dark:bg-white-5 dark:border-light-white-8 dark:shadow-light-black text-primary opacity-40"
              >
                <select class="w-full outline-0 bg-transparent  dark:text-white-70">
                  <option value="server">Server related</option>
                </select>
              </div>
              <textarea
                class="py-5 resize-none h-[200px] lg:h-[238px] px-3.5 w-full rounded-[8px] dark:bg-white-5 dark:border-light-white-8 dark:shadow-light-black border border-light outline-0 shadow-light-white text-primary dark:text-white opacity-50"
                placeholder="Describe the problem"
              ></textarea>
              <Btn
                class="w-full mt-6"
                bg-color="bg-blue"
                text-color="text-white"
                btn-padding="lg;py-[11px] py-1.5"
                border-color="border border-blue"
              >
                Create ticket
              </Btn>
            </form>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </div>

  <SupportTickets class="mt-10" :head="ticketsHead" :data="tickets">
    <template #filter>
      <TabList
        class="lg:w-fit w-full"
        :tab-list="['All', 'In work', 'Closed']"
      />
    </template>
  </SupportTickets>
</template>

<script setup>
import { ref } from "vue";
import Btn from "../../components/Helper/Btn.vue";
import SupportTickets from "../Dashbord/components/SupportTickets.vue";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import TabList from "../../components/Helper/TabList.vue";
const ticket = ref(null);
const isCreateTicketsOpen = ref(false);
const ticketsHead = ref([
  {
    name: "number",
    slotName: "number",
    isSort: false,
    mobileIndex: 0,
  },
  {
    name: "title",
    slotName: "title",
    isSort: false,
    mobileIndex: 1,
  },
  {
    name: "request",
    slotName: "request",
    isSort: false,
    mobileIndex: 2,
  },
  {
    name: "date",
    slotName: "date",
    isSort: false,
    mobileIndex: 3,
  },
  {
    name: "action",
    slotName: "action",
    isSort: false,
    mobileIndex: 3,
  },
]);

const tickets = ref([
  {
    icon: "flag.svg",
    number: 1234,
    title: "Name about yes request..",
    request: "Refund Request",
    date: "2023-13-03",
    status: "Successful",
  },
  {
    icon: "flag.svg",
    number: 1235,
    title: "Name about yes request..",
    request: "Refund Request",
    date: "2023-13-03",
    status: "Canceled",
  },
  {
    icon: "flag.svg",
    number: 1236,
    title: "Name about yes request..",
    request: "Refund Request",
    date: "2023-13-03",
    status: "Process",
  },
]);
</script>
