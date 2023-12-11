<template>
  <div :class="activeTab == 1 ? 'flex flex-col lg:items-center' : ''">
    <TabType2 @cngTab="(tabVal) => (activeTab = tabVal)" />
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
    class="flex xl:flex-row flex-col-reverse lg:mt-[35px] my-[30px]"
    v-if="activeTab == 0"
  >
    <div class="w-full xl:mt-0 mt-7">
      <div class="bg-white dark:bg-white-5 rounded-[14px]">
        <div
          class="px-4 py-[18px] rounded-[12px] lg:flex block justify-between items-center"
        >
          <div class="flex items-center">
            <div
              class="px-3.5 py-3 bg-light-white dark:bg-light-white-8 rounded-[8px]"
            >
              <img
                src="../../assets/svgs/dashbord/cloud-server-plus-blue.svg"
                class="min-w-[17px]"
                alt="WWW"
              />
            </div>

            <div class="ml-4">
              <p
                class="lg:text-base text-[18px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                PerformanceVPS C4
              </p>
              <p
                class="mt-[5px] text-primary dark:text-white opacity-70 lg:text-sm text-[15px] font-normal leading-[150%]"
              >
                Self managed virtial server
              </p>
            </div>
          </div>
        </div>

        <div
          class="py-2.5 px-3.5 bg-[#F9F9FA] dark:bg-[#F9F9FA14] mx-4 mt-[2px] mb-5 flex items-center rounded-[8px] cursor-pointer border border-primary-8 justify-center"
        >
          <p class="dark:text-white text-[15.5px] lg:text-[15px]">
            Customize your VPS
          </p>
          <img
            src="../../assets/svgs/drop-thin.svg"
            class="ml-3 dark:brightness-[100]"
            alt="Drop"
          />
        </div>

        <div>
          <div class="px-5 lg:pb-0 grow w-full lg:mt-0">
            <div class="flex justify-between items-center mb-[18px]">
              <div class="flex items-center">
                <div
                  class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
                >
                  <img
                    src="../../assets/svgs/cpu.svg"
                    class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                    alt="Window"
                  />
                </div>
                <p
                  class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[-0.155px]"
                >
                  CPU
                </p>
              </div>
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[0.31px]"
              >
                12vCore
              </p>
            </div>
            <div class="flex justify-between items-center mb-[18px]">
              <div class="flex items-center">
                <div
                  class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
                >
                  <img
                    src="../../assets/svgs/ram-overview.svg"
                    class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                    alt="Window"
                  />
                </div>
                <p
                  class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[-0.155px]"
                >
                  RAM
                </p>
              </div>
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[0.31px]"
              >
                512 MB
              </p>
            </div>
            <div class="flex justify-between items-center mb-[18px]">
              <div class="flex items-center">
                <div
                  class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
                >
                  <img
                    src="../../assets/svgs/storge.svg"
                    class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                    alt="Window"
                  />
                </div>
                <p
                  class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[-0.155px]"
                >
                  SSD
                </p>
              </div>
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[0.31px]"
              >
                128 GB
              </p>
            </div>
            <div class="flex justify-between items-center mb-[18px]">
              <div class="flex items-center">
                <div
                  class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
                >
                  <img
                    src="../../assets/svgs/snap-shot.svg"
                    class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                    alt="Window"
                  />
                </div>
                <p
                  class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[-0.155px]"
                >
                  Snapshots
                </p>
              </div>
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[0.31px]"
              >
                4
              </p>
            </div>
            <div class="flex justify-between items-center mb-[18px]">
              <div class="flex items-center">
                <div
                  class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
                >
                  <img
                    src="../../assets/svgs/ip-world.svg"
                    class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                    alt="Window"
                  />
                </div>
                <p
                  class="text-primary dark:text-white lg:text-[15px] text-[16px] font-medium leading-[100%] tracking-[-0.155px]"
                >
                  IPv4 Address
                </p>
              </div>

              <div class="flex items-center">
                <div
                  class="hidden flex-row-reverse [&>*:last-child]:ml-0 relative lg:flex"
                >
                  <hr
                    class="w-full absolute top-1/2 translate-y-1/2 dark:opacity-20"
                  />
                  <div
                    class="h-[18px] rounded-[50%] ml-[30px] z-10 aspect-square"
                    :class="
                      ip == i
                        ? 'bg-blue'
                        : 'bg-white dark:bg-black-blue dark:border-light-white-8 border-2 border-light-white-blue'
                    "
                    v-for="i in 6"
                    :key="i"
                  ></div>
                </div>
                <input
                  type="text"
                  v-model="ip"
                  class="text-right outline-0 max-w-[68px] ml-2.5 bg-[#F9F9FA] dark:bg-[#F9F9FA14] px-1 py-[5px] text-[15px] rounded-[6px] border border-light-white-blue dark:border-light-white-blue-8 dark:text-white"
                />
              </div>
            </div>
          </div>
        </div>

        <div
          class="py-[18px] px-4 border-y border-light-white-blue dark:border-light-white-blue-8"
        >
          <p
            class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
          >
            Choose availability zone
          </p>

          <div class="grid lg:grid-cols-2 grid-cols-1 gap-[15px] mt-5">
            <div
              class="py-3 px-3.5 flex items-center justify-between border rounded-[8px] cursor-pointer"
              :class="
                zone == 0
                  ? 'border-blue bg-blue-5'
                  : 'border-primary-8 dark:border-white-8'
              "
              @click="zone = 0"
            >
              <div class="flex items-center">
                <img
                  src="../../assets/svgs/flags/de.svg"
                  class="min-w-[20px] max-w-[20px]"
                  alt="Flag"
                />
                <p
                  class="lg:text-[15px] text-[15.5px] font-medium leading-[115%] ml-2.5 dark:text-white"
                >
                  Amsterdam, AMS0
                </p>
              </div>
              <img
                src="../../assets/svgs/check.svg"
                v-if="zone == 0"
                alt="Ckeck"
              />
            </div>
            <div
              class="py-3 px-3.5 flex items-center justify-between border rounded-[8px] cursor-pointer"
              :class="
                zone == 1
                  ? 'border-blue bg-blue-5'
                  : 'border-primary-8 dark:border-white-8'
              "
              @click="zone = 1"
            >
              <div class="flex items-center">
                <img
                  src="../../assets/svgs/flags/de.svg"
                  class="min-w-[20px] max-w-[20px]"
                  alt="Flag"
                />
                <p
                  class="lg:text-[15px] text-[15.5px] font-medium leading-[115%] ml-2.5 dark:text-white"
                >
                  Amsterdam, RTM0
                </p>
              </div>
              <img
                src="../../assets/svgs/check.svg"
                v-if="zone == 1"
                alt="Ckeck"
              />
            </div>
          </div>
        </div>

        <ChooseOs class="py-5 px-4" :data="osList" />
        <InstallMethod
          class="border-t border-primary-8 dark:border-white-8 py-[18px] px-4"
        />
      </div>
    </div>

    <Sidecart
      class="xl:max-w-[388px] bg-white dark:bg-white-5 w-full h-fit xl:ml-[60px] lg:p-6 p-5 rounded-[12px]"
    >
      <div
        class="bg-[#F9F9FA] dark:bg-[#F9F9FA14] border-2 border-[#026DEB26] px-3.5 shadow-blue-cart rounded-[10px]"
      >
        <div class="flex justify-between items-center py-[15px]">
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
        <hr class="dark:opacity-10" />

        <div>
          <p class="text-[15px] text-primary dark:text-white mt-4 mb-5 font-medium leading-[115%] tracking-[0.15px]" >Your configuration</p>

          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/cpu.svg"
                  class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
                CPU
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
              12vCore
            </p>
          </div>
          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/ram-overview.svg"
                  class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
                RAM
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
              512 MB
            </p>
          </div>
          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/storge.svg"
                  class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
                SSD
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
              128 GB
            </p>
          </div>
          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/snap-shot.svg"
                  class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
                Snapshots
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
              4
            </p>
          </div>
          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/bandwidth.svg"
                  class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
              Bandwidth
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
            1500 GB
            </p>
          </div>
          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/flags/de.svg"
                  class="h-[14px] aspect-square min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
              Availability zone
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
            Amsterdam, AMS0
            </p>
          </div>
          <div class="flex justify-between items-center mb-[14px]">
            <div class="flex items-center">
              <div
                class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 dark:bg-white-8 border-light p-[5px] lg:mr-3 mr-2.5"
              >
                <img
                  src="../../assets/svgs/servers/ubuntu.svg"
                  class="h-[14px] aspect-square min-w-[14px]"
                  alt="Window"
                />
              </div>
              <p
                class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[-0.155px]"
              >
              OS
              </p>
            </div>
            <p
              class="text-primary dark:text-white text-[14px] font-medium leading-[100%] tracking-[0.31px]"
            >
            Windows RDP 2019
            </p>
          </div>
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
import Btn from "../../components/Helper/Btn.vue";
import TabType2 from "../../components/Helper/TabType2.vue";
import { ref } from "vue";
import Payment from "../../components/Helper/Payment.vue";
import Sidecart from "../../components/Helper/Sidecart.vue";
import ChooseOs from "../../components/Helper/ChooseOs.vue";
import InstallMethod from "../../components/Helper/InstallMethod.vue";

const showDomain = ref(true);
const activeTab = ref(0);
const zone = ref(0);

const ip = ref(1);

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

const osList = ref([
  {
    icon: "../../assets/svgs/servers/ubuntu.svg",
    name: "Ubuntu",
    price: "Free",
  },
  {
    icon: "../../assets/svgs/servers/arch.svg",
    name: "ArchaLinux",
    price: 29.99,
  },
  {
    icon: "../../assets/svgs/servers/fedora2.svg",
    name: "Ubuntu",
    price: 39.99,
  },
  {
    icon: "../../assets/svgs/servers/cent.svg",
    name: "Ubuntu",
    price: 19.99,
  },
  {
    icon: "../../assets/svgs/servers/windows.svg",
    name: "Windows Server",
    price: 79.99,
  },
  {
    icon: "../../assets/svgs/servers/rocky.svg",
    name: "Ubuntu",
    price: 99.99,
  },
  {
    icon: "../../assets/svgs/servers/fedora-core.svg",
    name: "Ubuntu",
    price: "Free",
  },
  {
    icon: "../../assets/svgs/servers/window-core.svg",
    name: "Ubuntu",
    price: 55.99,
  },
]);
</script>

<style scoped>
.px-cus-0 {
  @apply px-0 !important;
}
</style>
