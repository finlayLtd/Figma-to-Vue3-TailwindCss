<template>
  <div :class="activeTab == 1 ? 'flex flex-col lg:items-center' : ''">
    <TabType2 @cngTab="(tabVal) => (activeTab = tabVal)" />
    <div v-if="activeTab == 0">
      <h1
        class="lg:text-[28px] text-[24px] font-bold leading-[90%] tracking-[0.28px] text-primary dark:text-white mt-[52px] lg:mb-4 mb-3.5"
      >
        Choose domain
      </h1>
      <p
        class="opacity-70 text-primary dark:text-white lg:text-base text-[15px] font-normal leading-[150%]"
      >
        Including free automatic backups and firewall!
      </p>
    </div>
    <div v-else class="text-center">
      <h1
        class="lg:text-[28px] text-[24px] font-bold leading-[90%] tracking-[0.28px] text-primary dark:text-white mt-[52px] lg:mb-4 mb-3.5"
      >
      Chekout to launch your products 
      </h1>
      <p
        class="opacity-70 text-primary dark:text-white lg:text-base text-[15px] font-normal leading-[150%]"
      >
      Complete your order.
      </p>
    </div>
  </div>

  <div
    class="flex xl:flex-row flex-col-reverse mb-10 lg:mt-[35px] mt-[30px]"
    v-if="activeTab == 0"
  >
    <div class="w-full xl:mt-0 mt-7">
      <div
        class="px-4 py-[18px] bg-white dark:bg-white-5 rounded-[12px] lg:flex block justify-between items-center"
      >
        <div class="flex items-center">
          <div
            class="px-3.5 py-3 bg-light-white dark:bg-light-white-8 rounded-[8px]"
          >
            <img
              src="../../assets/svgs/webhosting-black.svg"
              class="dark:brightness-[100] min-w-[17px]"
              alt="WWW"
            />
          </div>

          <div class="ml-4">
            <p
              class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
            >
              Free Webhosting
            </p>
            <p
              class="mt-[5px] text-primary dark:text-white opacity-70 text-sm font-normal leading-[150%]"
            >
              Including multiple email addresses. Secured with a free Let's
              Encrypt certificate.
            </p>
          </div>
        </div>

        <div
          class="flex items-center lg:justify-end justify-between lg:mt-0 mt-4"
        >
          <p
            class="text-base font-bold leading-[100%] tracking-[0.16px] text-primary dark:text-white mr-[18px]"
          >
            $0.00
          </p>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer" checked />
            <div
              class="w-11 h-6 bg-gray-200 rounded-full dark:bg-white-8 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-[#0000000D] peer-checked:bg-blue"
            ></div>
          </label>
        </div>
      </div>

      <div class="bg-white dark:bg-white-5 rounded-[14px] mt-4">
        <div
          class="px-5 py-[18px] rounded-[12px] lg:flex block justify-between items-center"
        >
          <div class="flex items-center">
            <div
              class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]"
            >
              <img
                src="../../assets/svgs/dashbord/www-plus.svg"
                class="dark:brightness-[100] min-w-[17px]"
                alt="WWW"
              />
            </div>

            <div class="ml-4">
              <p
                class="text-base font-medium leading-[100%] tracking-[0.16px] dark:text-white text-primary"
              >
                Connect Existing Domain
              </p>
              <p
                class="mt-[5px] text-primary dark:text-white opacity-70 text-sm font-normal leading-[150%]"
              >
                Select a domain you have already purchased from us
              </p>
            </div>
          </div>

          <Btn
            text-color="text-blue"
            border-color="border-0"
            bg-color="bg-transperent"
            btn-padding="p-0"
            class="mt-4 lg:mt-0 lg:w-auto w-full"
            @click="showDomain = !showDomain"
          >
            <div class="flex justify-center">
              <p>View my domain</p>
              <img
                src="../../assets/svgs/dropdown-blue.svg"
                class="ml-2"
                :class="showDomain ? '' : 'rotate-180'"
                alt="Drop"
              />
            </div>
          </Btn>
        </div>

        <div v-if="showDomain">
          <hr class="dark:opacity-10" />
          <div class="px-5 py-3.5 flex items-center justify-between">
            <Search
              class="xl:max-w-full max-w-[150px] lg:w-full w-[150px] mr-4"
            />
            <TypesDropdown class="px-cus-0">
              <ul>
                <li class="text-white">Default type</li>
              </ul>
            </TypesDropdown>
          </div>

          <div class="overflow-x-auto">
            <Table
              :headings="domainHead"
              :data="domainList"
              head-position="text-start"
              class="text-start"
            >
              <template #name="{ tdata }">
                <div
                  class="flex items-center 2xl:min-w-[450px] 2xl:max-w-[450px]"
                >
                  <div
                    class="p-2 lg:mr-3 mr-2.5 rounded-[8px] bg-light-white dark:bg-light-white-8"
                  >
                    <img
                      :src="`/src/assets/svgs/${tdata.icon}`"
                      class="dark:brightness-[100] min-w-[20px]"
                      alt="Window"
                    />
                  </div>
                  <div class="max-w-[100%]">
                    <p
                      class="text-primary dark:text-white text-start lg:text-[15px] text-[14px] font-medium leading-[100%] tracking-[0.15px]"
                    >
                      {{ tdata.name }}
                    </p>
                  </div>
                </div>
              </template>
              <template #date="{ tdata }">
                <div class="flex items-center">
                  <p
                    class="text-primary dark:text-white lg:text-[15px] text-[14px] text-start font-medium leading-[100%] tracking-[0.15px] min-w-fit"
                  >
                    {{ tdata.date }}
                  </p>
                </div>
              </template>
              <template #status="{ tdata }">
                <span
                  class="flex items-center w-fit bg-green-10 rounded-[16px] py-1.5 px-1.5 min-w-max"
                  v-if="tdata.status == 'Active'"
                >
                  <img src="../../assets/svgs/check-green.svg" alt="Check" />

                  <p
                    class="text-green text-center lg:text-[15px] text-[14px] ml-[5px] font-medium leading-[100%] tracking-[0.15px]"
                  >
                    Active
                  </p>
                </span>
                <span
                  class="flex items-center bg-tomato-10 rounded-[16px] py-1.5 px-1.5 min-w-max"
                  v-else-if="tdata.status == 'Suspended'"
                >
                  <img src="../../assets/svgs/suspend.svg" alt="Check" />

                  <p
                    class="text-tomato text-center lg:text-[15px] text-[14px] ml-[5px] font-medium leading-[100%] tracking-[0.15px]"
                  >
                    Suspended
                  </p>
                </span>
                <span
                  class="flex items-center bg-orange-10 rounded-[16px] py-1.5 px-1.5 min-w-max"
                  v-else
                >
                  <img src="../../assets/svgs/attract.svg" alt="Check" />

                  <p
                    class="text-orange text-center lg:text-[15px] text-[14px] ml-[5px] font-medium leading-[100%] tracking-[0.15px]"
                  >
                    Attracted
                  </p>
                </span>
              </template>
              <template #action="{ tdata }">
                <div class="flex justify-end">
                  <Btn
                    bg-color="bg-blue-5 dark:bg-white-5"
                    text-color="text-blue dark:text-white "
                    border-color="border-0"
                    class="whitespace-nowrap"
                  >
                    <p>Choose domain</p>
                    <!-- <div class="flex">
                      <img src="../../assets/svgs/check.svg" class="brightness-[100]" alt="Check">
                      <p class="ml-[7px]">Choosed</p>
                    </div> -->
                  </Btn>
                </div>
              </template>
            </Table>
          </div>

          <Pagination />
        </div>
      </div>
    </div>

    <Sidecart
      class="xl:max-w-[388px] bg-white dark:bg-white-5 w-full xl:ml-[60px] lg:p-6 p-5 rounded-[12px]"
    >
      <div
        class="py-[15px] px-3.5 bg-[#F9F9FA] dark:bg-[#F9F9FA14] border-2 border-[#026DEB26] shadow-blue-cart rounded-[10px] flex justify-between items-center"
      >
        <div class="flex items-center">
          <img
            src="../../assets/svgs/webhosting.svg"
            class="dark:brightness-[100]"
            alt="Webhosting"
          />
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[15px] font-bold leading-[115%] tracking-[0.15px]"
            >
              Webhosting
            </p>
            <p
              class="text-primary-50 dark:text-white-50 mt-[5px] text-sm font-normal leading-[115%] tracking-[0.14px]"
            >
              1 months
            </p>
          </div>
        </div>

        <div>
          <p
            class="text-primary dark:text-white lg:text-sm text-[15px] font-bold leading-[130%]"
          >
            $0.00
            <del
              class="text-primary-50 lg:text-sm text-[13px] dark:text-white-50 font-normal"
              >$19.99</del
            >
          </p>
          <img
            src="../../assets/svgs/bin40.svg"
            class="mt-[7px] ml-auto"
            alt="Bin"
          />
        </div>
      </div>
      <div
        class="py-[15px] mt-3 px-3.5 bg-[#F9F9FA] dark:bg-[#F9F9FA14] border-2 border-[#026DEB26] shadow-blue-cart rounded-[10px] flex justify-between items-center"
      >
        <div class="flex items-center">
          <img
            src="../../assets/svgs/earth.svg"
            class="min-w-[20px] dark:brightness-[100]"
            alt="Webhosting"
          />
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[15px] font-bold leading-[115%] tracking-[0.15px]"
            >
              cccompro.com
            </p>
            <p
              class="text-primary-50 dark:text-white-50 mt-[5px] text-sm font-normal leading-[115%] tracking-[0.14px]"
            >
              12 months
            </p>
          </div>
        </div>

        <div>
          <p
            class="text-primary dark:text-white text-sm font-bold leading-[130%]"
          >
            $0.00
          </p>
          <img
            src="../../assets/svgs/bin40.svg"
            class="mt-[7px] ml-auto"
            alt="Bin"
          />
        </div>
      </div>
    </Sidecart>
  </div>
  <Payment v-else class="max-w-[717px] mx-auto mb-10 mt-[35px] lg:p-6 p-5 bg-white dark:bg-white-5 rounded-[12px]" :list="paymentList" >
  </Payment>
</template>

<script setup>
import TabType2 from "../../components/Helper/TabType2.vue";
import Btn from "../../components/Helper/Btn.vue";
import Search from "../../components/Helper/Search.vue";
import TypesDropdown from "../../components/Helper/TypesDropdown.vue";
import Table from "../../components/server/Table.vue";
import { ref } from "vue";
import Payment from '../../components/Helper/Payment.vue'
import Pagination from "../../components/Helper/Pagination.vue";
import Sidecart from "../../components/Helper/Sidecart.vue";

const showDomain = ref(true);
const activeTab = ref(0);

const domainHead = ref([
  {
    name: "Domain name",
    slotName: "name",
    isSort: true,
  },
  {
    name: "Date",
    slotName: "date",
    isSort: true,
  },
  {
    name: "Status",
    slotName: "status",
    isSort: false,
  },
  {
    name: "Action",
    slotName: "action",
    isSort: false,
    headPosition: "justify-end",
  },
]);

const domainList = ref([
  {
    icon: "world.svg",
    name: "serverly.com",
    date: "12.07.2023",
    status: "Active",
    actions: "",
  },
  {
    icon: "world.svg",
    name: "addroblox.xyz",
    date: "12.07.2023",
    status: "Active",
    actions: "",
  },
  {
    icon: "world.svg",
    name: "addroblox.xyz",
    date: "12.07.2023",
    status: "Active",
    actions: "",
  },
]);

const paymentList = ref([
  {
    icon : '../../assets/svgs/world.svg',
    title : 'cccompro.com',
    time : '12 months',
    price : 12.50,
    del : 13.99
  },
  {
    icon : '../../assets/svgs/webhosting.svg',
    title : 'Webhosting',
    time : '1 months',
    price : 0.00,
    del : 9.99
  },
])
</script>

<style scoped>
.px-cus-0 {
  @apply px-0 !important;
}
</style>
