<template>
  <div :class="activeTab == 2 ? 'flex flex-col lg:items-center' : ''">
    <TabType2
      :tabList="['Domain setup', 'Configure', 'Payment']"
      @cngTab="(tabVal) => (activeTab = tabVal)"
    />
    <div v-if="activeTab == 0">
      <h1
        class="lg:text-[28px] text-[24px] font-bold leading-[90%] tracking-[0.28px] text-primary dark:text-white mt-[52px] lg:mb-4 mb-3.5"
      >
        Configure your virtual server as you wish
      </h1>
      <p
        class="opacity-70 text-primary dark:text-white lg:text-base text-[15px] font-normal leading-[150%]"
      >
        Including free automatic backups and firewall!
      </p>
    </div>
    <div v-else-if="activeTab == 1">
      <h1
        class="lg:text-[28px] text-[24px] font-bold leading-[90%] tracking-[0.28px] text-primary dark:text-white mt-[52px] lg:mb-4 mb-3.5"
      >
        Time to launch!
      </h1>
      <p
        class="opacity-70 text-primary dark:text-white lg:text-base text-[15px] font-normal leading-[150%]"
      >
        Internet for every idea.
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
    class="flex xl:flex-row flex-col-reverse lg:mt-[35px] mt-[30px] mb-10"
    v-if="activeTab == 0"
  >
    <div class="w-full xl:mt-0 mt-7">
      <div
        class="flex justify-between items-center py-1.5 px-3.5 bg-white dark:shadow-input-dark dark:bg-white-5 rounded-[8px]"
      >
        <div class="flex items-center grow">
          <img src="../../assets/svgs/search.svg" class="dark:brightness-[100]" alt="Search" />
          <input
            type="search"
            class="bg-transparent text-primary dark:text-white lg:text-base text-[15px] outline-0 mx-2.5 grow"
          />
        </div>
        <Btn bgColor="bg-[#026DEBB8]" textColor="text-white" text-size="text-[14px] lg:text-[15px]" border-color="border-0">Search</Btn>
      </div>

      <div
        class="rounded-[12px] bg-white dark:bg-white-5 mt-[25px] shadow-black-8 dark:shadow-none"
      >
        <div
          class="px-4 py-3 lg:flex block justify-between items-center border-b border-light-white-blue dark:border-light-white-8"
          v-for="(server, index) in serverList"
          :key="index"
        >
          <div class="flex items-center justify-between">
            <p
              class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
            >
              {{ server.name }}
            </p>
            <p
              class="text-[15px] font-medium leading-[150%] text-green px-2 py-[3px] bg-green-10 rounded-[8px] ml-2.5"
              v-if="server.available"
            >
              Available
            </p>
            <p
              class="text-[15px] font-medium leading-[150%] text-tomato px-2 py-[3px] bg-tomato-10 rounded-[8px] ml-2.5"
              v-else
            >
              Unavailable
            </p>
          </div>
          <div class="flex items-center justify-between lg:border-t-0 border-t border-light-white-8 lg:mt-0 lg:pt-0 pt-2 mt-2">
            <p
              class="text-base font-bold leading-[100%] tracking-[0.16px] text-primary dark:text-white"
            >
              ${{ server.price.toFixed(2) }}/yr
              <del
                class="text-[15px] font-normal leading-[130%] text-secondary-50 dark:text-white-50 ml-1.5"
                >${{ server.del.toFixed(2) }}</del
              >
            </p>
            <Btn
              class="flex items-center ml-9"
              bgColor="bg-blue-8"
              border-color="border border-blue-8"
              text-color="text-blue"
              btn-padding="py-1.5 px-2.5"
            >
              <p class="min-w-max" >Add to card</p>
              <img
                src="../../assets/svgs/cart-desh-blue.svg"
                class="ml-1.5"
                alt="Cart"
              />
            </Btn>
          </div>
        </div>

        <div class="py-6 flex justify-center">
          <p
            class="text-base font-medium leading-[100%] tracking-[0.16px] text-blue-80 cursor-pointer"
          >
            Explore 400+ Additional Extensions
          </p>
          <img
            src="../../assets/svgs/right-arrow-blue.svg"
            class="max-w-[16px] ml-2.5"
            alt="Blue Arrow"
          />
        </div>
      </div>
    </div>

    <Sidecart
      class="xl:max-w-[388px] bg-white h-fit dark:bg-white-5 w-full lg:mt-[72px] xl:ml-[60px] lg:p-6 p-5 rounded-[12px] [&>*:last-child]:mb-0"
    >
      <div
        class="py-[15px] mb-3 px-3.5 bg-[#F9F9FA] dark:bg-[#F9F9FA14] border-2 border-[#026DEB26] shadow-blue-cart rounded-[10px] flex justify-between items-center"
        v-for="(cartList , index) in setupcart" :key="index"
      >
        <div class="flex items-center">
          <img
            :src="getImageUrl(cartList.icon)"
            class="min-w-[20px] dark:brightness-[100]"
            alt="Webhosting"
          />
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[15px] font-bold leading-[115%] tracking-[0.15px]"
            >
              {{ cartList.name }}
            </p>
            <p
              class="text-primary-50 dark:text-white-50 mt-[5px] text-sm font-normal leading-[115%] tracking-[0.14px]"
            >
              {{  cartList.month }}
            </p>
          </div>
        </div>

        <div>
          <p
            class="text-primary dark:text-white lg:text-sm text-[15px] font-bold leading-[130%]"
          >
            ${{  cartList.price.toFixed(2) }}
            <del
              class="text-primary-50 lg:text-sm text-[13px] dark:text-white-50 font-normal"
              v-if="cartList.del"
              > ${{ cartList.del.toFixed(2) }} </del
            >
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

  <div
    class="flex xl:flex-row flex-col lg:mt-[35px] mb-10"
    v-else-if="activeTab == 1"
  >
    <div class="w-full xl:mt-0 mt-7 lg:mb-0 mb-[30px]">
      <div class="bg-white dark:bg-white-5 dark:border border-light-white-8 shadow-black-8 dark:shadow-none rounded-[12px]">
        <div
          class="px-4 py-[18px] bg-white dark:bg-white-5 rounded-[12px] lg:flex block justify-between items-center"
        >
          <div class="flex items-center">
            <div
              class="px-3.5 py-3 bg-light-white dark:bg-light-white-8 rounded-[8px]"
            >
              <img
                src="../../assets/svgs/world-blue.svg"
                class="dark:brightness-[100] min-w-[17px]"
                alt="WWW"
              />
            </div>

            <div class="ml-4">
              <p
                class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
              cccompro.com
              </p>
              <p
                class="mt-[5px] text-primary dark:text-white opacity-70 text-sm font-normal leading-[150%]"
              >
              Your domain is automatically provided with the security protocol DNSSEC
              </p>
            </div>
          </div>

        </div>
        <div class="py-[18px] px-3 bg-blue-80">
          <p class="text-[15px] font-medium leading-[100%] tracking-[0.15px] text-white" >What do you want to do with your domain name?</p>
        </div>
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
            class="flex items-center lg:justify-end justify-center lg:mt-0 mt-4"
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
      </div>
    </div>

    <Sidecart
      class="xl:max-w-[388px] bg-white h-fit dark:bg-white-5 w-full xl:ml-[60px] lg:p-6 p-5 rounded-[12px] [&>*:last-child]:mb-0"
    >
      <div
        class="py-[15px] mb-3 px-3.5 bg-[#F9F9FA] dark:bg-[#F9F9FA14] border-2 border-[#026DEB26] shadow-blue-cart rounded-[10px] flex justify-between items-center"
        v-for="(cartList , index) in configcart" :key="index"
      >
        <div class="flex items-center">
          <img
            :src="getImageUrl(cartList.icon)"
            class="min-w-[20px] dark:brightness-[100]"
            alt="Webhosting"
          />
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[15px] font-bold leading-[115%] tracking-[0.15px]"
            >
              {{ cartList.name }}
            </p>
            <p
              class="text-primary-50 dark:text-white-50 mt-[5px] text-sm font-normal leading-[115%] tracking-[0.14px]"
            >
              {{  cartList.month }}
            </p>
          </div>
        </div>

        <div>
          <p
            class="text-primary dark:text-white lg:text-sm text-[15px] font-bold leading-[130%]"
          >
            ${{  cartList.price.toFixed(2) }}
            <del
              class="text-primary-50 lg:text-sm text-[13px] dark:text-white-50 font-normal"
              v-if="cartList.del"
              > ${{ cartList.del.toFixed(2) }} </del
            >
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

  <Payment
    v-else
    class="max-w-[717px] mx-auto my-[35px] lg:p-6 p-5 bg-white dark:bg-white-5 rounded-[12px]"
    :list="paymentList"
  >
  </Payment>
</template>

<script setup>
import TabType2 from "../../components/Helper/TabType2.vue";
import Btn from "../../components/Helper/Btn.vue";
import { ref } from "vue";
import Payment from "../../components/Helper/Payment.vue";
import Sidecart from "../../components/Helper/Sidecart.vue";

const showDomain = ref(true);
const activeTab = ref(0);

const setupcart = ref([
  {
    icon : '../../assets/svgs/earth.svg',
    name : 'cccompro.com',
    month : '12 months',
    price : 12.50,
    del : 13.99
  }
])

const configcart = ref([
  {
    icon : '../../assets/svgs/earth.svg',
    name : 'cccompro.com',
    month : '12 months',
    price : 12.50,
    del : 13.99
  },
  {
    icon : '../../assets/svgs/webhosting.svg',
    name : 'Webhosting',
    month : '1 months',
    price : 0.00 ,
    del : 9.99
  }
])

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};

const serverList = ref([
  {
    name: "cccompro.com",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.com",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.uk.co",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.info",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.stidio",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 12.5,
    del: 13.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 15.0,
    del: 16.99,
  },
  {
    name: "cccompro.xyz",
    available: true,
    price: 15.0,
    del: 16.99,
  },
]);

const paymentList = ref([
  {
    icon: "../../assets/svgs/world.svg",
    title: "cccompro.com",
    time: "12 months",
    price: 12.5,
    del: 13.99,
  },
  {
    icon: "../../assets/svgs/webhosting.svg",
    title: "Webhosting",
    time: "1 months",
    price: 0.0,
    del: 9.99,
  },
]);
</script>

<style scoped>
.px-cus-0 {
  @apply px-0 !important;
}
</style>
