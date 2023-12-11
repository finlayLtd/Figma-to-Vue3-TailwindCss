<template>
  <h1
    class="text-primary dark:text-white lg:text-3xl text-[24px]  font-bold leading-[115%] tracking-[0.3px] lg:mb-10 mb-[35px]"
  >
    Dashboard
  </h1>

  <div>
    <div class="block justify-between 2xl:flex">
      <!-- Last News section -->
      <div class="w-full bg-white dark:bg-white-5 rounded-[14px] 2xl:max-w-[590px]">
        <div
          class="px-5 py-3.5 flex justify-between items-center border-b border-dark-5"
        >
          <h3
            class="text-primary dark:text-white lg:text-lg text-[16px]  font-medium leading-[normal] tracking-[0.18px] min-w-fit"
          >
            Last News
          </h3>
          <Search class="lg:w-full w-[150px]" />
        </div>

        <div
          class="ml-5 mr-2 pr-[9px] pt-[18px] max-h-[270px] overflow-y-auto latest-news"
        >
          <div
            class="flex justify-between items-center mb-[25px]"
            v-for="i in 20"
          >
            <div>
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[100%] tracking-[0.15px] lg:max-w-[400px] max-w-[220px]"
              >
                First Mover Americas: Ether-Bitcoin Ratio on Track
              </p>
              <p
                class="mt-[7px] text-primary-50 dark:text-white-50 lg:text-sm text-[13px]  font-normal leading-[100%] tracking-[0.14px]"
              >
                19 june 2023
              </p>
            </div>
            <Btn
              class="flex items-center"
              text-color="text-blue"
              btn-padding="p-0"
              border-color="border-0"
              bg-color="bg-transparent"
            >
              Open
              <img
                src="../../assets/svgs/collapse-right-blue.svg"
                class="ml-[5px]"
                alt="Collapse-right"
              />
            </Btn>
          </div>
        </div>
      </div>

        <!-- Domain section -->
        <Domain :data="Domainlist" :head="domainHead" class="bg-white dark:bg-white-5 w-full 2xl:ml-[30px] 2xl:mt-0 mt-[35px] rounded-[14px]" />
    </div>

    <div
      class="2xl:flex block justify-between items-stretch my-10 -mx-[15px] 2xl:mr-0 mr-[15px]"
    >
    <!-- VPS List section -->
      <div class="mx-[15px] px-[15px] 2xl:w-1/2 w-full">
        <Listtable
          class="-mx-[15px] h-full flex flex-col"
          title="VPS List"
          :table-data="vpnList"
          :table-head="vpnhead"
        />
      </div>

      <!-- Dedicated Server List -->
      <div class="mx-[15px] px-[15px] 2xl:w-1/2 w-full 2xl:mt-0 mt-[35px]">
        <Listtable
          class="-mx-[15px] h-full flex flex-col"
          title="Dedicated Server List"
          :table-data="dedicatedList"
          :table-head="dedicatedhead"
        />
      </div>
    </div>

    <!-- Support Tickets -->
    <SupportTickets :data="tickets" :head="ticketsHead" />
  </div>
</template>
<script setup>
import Btn from "../../components/Helper/Btn.vue";
import Search from "../../components/Helper/Search.vue";
import Domain from "./components/Domain.vue";
import SupportTickets from './components/SupportTickets.vue'
import { ref } from "vue";
import Listtable from "./components/Listtable.vue";

const Domainlist = ref([
  {
    icon: "world.svg",
    title: "serverly.com",
    date: "12.07.2023",
    status: "Active",
  },
  {
    icon: "world.svg",
    title: "addroblox.xyz",
    date: "12.07.2023",
    status: "Active",
  },
  {
    icon: "world.svg",
    title: "inrndow.us",
    date: "12.07.2023",
    status: "Active",
  },
]);

const vpnList = ref([
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Active",
  },
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Active",
  },
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Suspended",
  },
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Attracted",
  },
]);

const vpnhead = ref([
  {
    name: "Product",
    slotName: "product",
    isSort: true,
    mobileIndex: 0,
  },
  {
    name: "Valid until",
    slotName: "date",
    isSort: true,
    mobileIndex: 1,
  },
  {
    name: "Country",
    slotName: "country",
    isSort: false,
    mobileIndex: 2,
  },
  {
    name: "Status",
    slotName: "status",
    isSort: false,
    mobileIndex: 3,
  },
]);
const dedicatedList = ref([
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Active",
  },
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Active",
  },
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Suspended",
  },
  {
    icon: "window.svg",
    hoverIcon: "window-dark.svg",
    title: "Intel Xeon E5-2609v2",
    cpation: "Windows RDP 2019",
    date: "12.07.2023",
    flag: "de.svg",
    status: "Attracted",
  },
]);

const dedicatedhead = ref([
  {
    name: "Product",
    slotName: "product",
    isSort: true,
    mobileIndex: 0,
  },
  {
    name: "Valid until",
    slotName: "date",
    isSort: true,
    mobileIndex: 1,
  },
  {
    name: "Country",
    slotName: "country",
    isSort: false,
    mobileIndex: 2,
  },
  {
    name: "Status",
    slotName: "status",
    isSort: false,
    mobileIndex: 3,
  },
]);

const domainHead = ref([
  {
    name: "Domain name",
    slotName: "name",
    isSort: true,
    mobileIndex: 0,
  },
  {
    name: "Date",
    slotName: "date",
    isSort: true,
    mobileIndex: 1,
  },
  {
    name: "Status",
    slotName: "status",
    isSort: false,
    mobileIndex: 2,
  },
  {
    name: "Action",
    slotName: "action",
    isSort: false,
    mobileIndex: 3,
    headPosition: "justify-end",
    mobileDisplayHeadonly: false,
  },
]);

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

<style scoped>
.m-none {
  @apply m-0 !important;
}
.latest-news::-webkit-scrollbar {
  width: 3px;
  height: 5px;
}

/* Track */
.latest-news::-webkit-scrollbar-track {
  background: transparent;
  border-radius: 3.5px;
}

/* Handle */
.latest-news:-webkit-scrollbar-thumb {
  background: #dddde1;
  border-radius: 3.5px;
}

/* Handle on hover */
.latest-news::-webkit-scrollbar-thumb:hover {
  background: #dddde1;
}

</style>
