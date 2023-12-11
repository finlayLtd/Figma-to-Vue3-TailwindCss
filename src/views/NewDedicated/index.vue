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
      <div
        class="bg-white border border-light-white-blue-8 dark:bg-white-5 rounded-[14px]"
      >
        <div
          class="px-4 py-[18px] rounded-[12px] lg:flex block justify-between items-center"
        >
          <div class="flex items-center">
            <div
              class="px-3.5 py-3 bg-light-white dark:bg-light-white-8 rounded-[8px]"
            >
              <img
                src="../../assets/svgs/dashbord/server-blue.svg"
                class="min-w-[17px]"
                alt="WWW"
              />
            </div>

            <div class="ml-4">
              <p
                class="lg:text-base text-[16px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                Dedicated server
              </p>
              <p
                class="mt-[5px] text-primary dark:text-white opacity-70 lg:text-sm text-[14px] font-normal leading-[150%]"
              >
                Dell PowerEdge R6515
              </p>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg-white border border-light-white-blue-8 dark:bg-white-5 rounded-[14px] py-5 mt-6"
      >
        <div class="px-4">
          <p class="font-medium dark:text-white text-[16px]">
            Choose processor
          </p>

          <div
            class="p-3.5 flex justify-between items-center border border-[#026DEB80] bg-blue-5 mt-5 rounded-[8px]"
          >
            <div class="flex items-start">
              <img
                src="../../assets/svgs/cpu.svg"
                class="dark:brightness-[100]"
                alt="CPU"
              />
              <div class="ml-2.5">
                <p
                  class="text-[15px] font-medium leading-[115%] text-primary dark:text-white"
                >
                  AMD EPYC 7402P
                </p>
                <p
                  class="text-[14.5px] font-normal leading-[115%] text-primary dark:text-white opacity-70 mt-[7px]"
                >
                  24 Cores / 47 Threads / 2.80Ghz
                </p>
              </div>
            </div>
            <div class="flex items-center">
              <img src="../../assets/svgs/check.svg" alt="Check" />
              <p
                class="text-[15px] font-medium leading-[115%] text-primary dark:text-white ml-2.5"
              >
                $58.00 <span class="opacity-70"> / Mo </span>
              </p>
            </div>
          </div>
        </div>
        <div
          class="px-4 my-5 py-5 border-y border-[#EBEEF6] dark:border-light-white-8"
        >
          <p class="font-medium dark:text-white text-[16px]">Choose memory</p>

          <div
            class="p-3.5 flex justify-between items-center border border-[#026DEB80] bg-blue-5 mt-5 rounded-[8px]"
          >
            <div class="flex items-start">
              <img
                src="../../assets/svgs/ram-overview.svg"
                class="dark:brightness-[100]"
                alt="CPU"
              />
              <div class="ml-2.5">
                <p
                  class="text-[15px] font-medium leading-[115%] dark:text-white text-primary"
                >
                  64GB REG ECC DDR4 RAM
                </p>
                <p
                  class="text-[14.5px] font-normal leading-[115%] dark:text-white text-primary opacity-70 mt-[7px]"
                >
                  64GB / 2400 HZ
                </p>
              </div>
            </div>
            <div class="flex items-center">
              <img src="../../assets/svgs/check.svg" alt="Check" />
              <p
                class="text-[15px] font-medium leading-[115%] dark:text-white text-primary ml-2.5"
              >
                $58.00 <span class="opacity-70"> / Mo </span>
              </p>
            </div>
          </div>
        </div>

        <ChooseOs class="mx-4" :data="osList" />

        <div
          class="px-4 my-5 py-5 border-y border-[#EBEEF6] dark:border-light-white-8"
        >
          <p class="font-medium dark:text-white text-[16px]">Choose storage</p>
          <p
            class="text-sm font-normal leading-[100%] tracking-[0.14px] mt-2.5 dark:text-white-70 text-primary-70"
          >
            This will be your fixed drive configuration.
          </p>

          <div
            class="p-3.5 flex justify-between items-center border border-[#026DEB80] bg-blue-5 mt-5 rounded-[8px]"
          >
            <div class="flex items-start">
              <img
                src="../../assets/svgs/storge.svg"
                class="dark:brightness-[100]"
                alt="CPU"
              />
              <div class="ml-2.5">
                <p
                  class="text-[15px] font-medium leading-[115%] dark:text-white text-primary"
                >
                  480GB Enterprise SSD
                </p>
                <p
                  class="text-[14.5px] font-normal leading-[115%] dark:text-white text-primary opacity-70 mt-[7px]"
                >
                  480GB / 2400 HZ
                </p>
              </div>
            </div>
            <div class="flex items-center">
              <img src="../../assets/svgs/check.svg" alt="Check" />
              <p
                class="text-[15px] font-medium leading-[115%] dark:text-white text-primary ml-2.5"
              >
                $58.00 <span class="opacity-70"> / Mo </span>
              </p>
            </div>
          </div>
        </div>
        <div
          class="px-4 pb-5 border-b border-[#EBEEF6] dark:border-light-white-blue-8"
        >
          <p class="font-medium dark:text-white text-[16px]">Bandwidth</p>
          <p
            class="text-sm font-normal leading-[100%] tracking-[0.14px] mt-2.5 dark:text-white-70 text-primary-70"
          >
            Our speeds are guaranteed, full-duplex. If you want unlimited
            traffic, choose unmetered.
          </p>

          <div class="grid lg:grid-cols-2 grid-cols-1 gap-[15px] mt-5">
            <div
              class="p-3.5 flex justify-between items-center cursor-pointer border rounded-[8px]"
              @click="activeBandwidth = 0"
              :class="
                activeBandwidth == 0
                  ? 'border-[#026DEB80] bg-blue-5'
                  : 'border-primary-8 dark:border-white-8'
              "
            >
              <div class="flex items-start">
                <img
                  src="../../assets/svgs/bandwidth.svg"
                  class="dark:brightness-[100]"
                  alt="CPU"
                />
                <div class="ml-2.5">
                  <p
                    class="text-[15px] font-medium leading-[115%] dark:text-white text-primary"
                  >
                    1Gbit/s - 100TB
                  </p>
                  <p
                    class="text-[14.5px] font-normal leading-[115%] dark:text-white text-primary opacity-70 mt-[7px]"
                  >
                    480GB / 2400 HZ
                  </p>
                </div>
              </div>
              <div class="flex items-center">
                <img
                  src="../../assets/svgs/check.svg"
                  v-if="activeBandwidth == 0"
                  alt="Check"
                />
                <p
                  class="text-[15px] font-medium leading-[115%] dark:text-white text-primary ml-2.5"
                >
                  Free
                </p>
              </div>
            </div>
            <div
              class="p-3.5 flex justify-between items-center border cursor-pointer rounded-[8px]"
              @click="activeBandwidth = 1"
              :class="
                activeBandwidth == 1
                  ? 'border-[#026DEB80] bg-blue-5'
                  : 'border-primary-8 dark:border-white-8'
              "
            >
              <div class="flex items-start">
                <img
                  src="../../assets/svgs/bandwidth.svg"
                  class="dark:brightness-[100]"
                  alt="CPU"
                />
                <div class="ml-2.5">
                  <p
                    class="text-[15px] font-medium leading-[115%] dark:text-white text-primary"
                  >
                    1Gbit/s - 100TB
                  </p>
                  <p
                    class="text-[14.5px] font-normal leading-[115%] dark:text-white text-primary opacity-70 mt-[7px]"
                  >
                    480GB / 2400 HZ
                  </p>
                </div>
              </div>
              <div class="flex items-center">
                <img
                  src="../../assets/svgs/check.svg"
                  v-if="activeBandwidth == 1"
                  alt="Check"
                />
                <p
                  class="text-[15px] font-medium leading-[115%] dark:text-white text-primary ml-2.5"
                >
                  $58.00 <span class="opacity-70"> / Mo </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="px-4 pt-5">
          <p class="font-medium dark:text-white text-[16px]">
            Choose IPv4 addresses
          </p>
          <p
            class="text-sm font-normal leading-[100%] tracking-[0.14px] mt-2.5 dark:text-white text-primary-70"
          >
            These IP addresses can be used in combination with your server.
          </p>

          <div class="mt-5 flex items-center lg:justify-start justify-between">
            <div
              class="py-2.5 px-3 shadow-light-white dark:shadow-input-dark lg:max-w-[54px] max-w-[200px] w-full rounded-[8px] border border-light-white dark:border-light-white-8 flex justify-between items-center"
            >
              <p
                class="lg:text-[14.5px] text-[15.5px] font-medium leading-[140%] text-secondary text-center lg:text-start grow dark:text-white"
              >
                {{ ipnumber }}
              </p>
              <div>
                <img
                  src="../../assets/svgs/drop-thin.svg"
                  class="rotate-180 cursor-pointer dark:brightness-[100]"
                  @click="ipnumber > 0 ? ipnumber-- : ''"
                  alt="Drop"
                />
                <img
                  src="../../assets/svgs/drop-thin.svg"
                  @click="ipnumber < 6 ? ipnumber++ : ''"
                  class="cursor-pointer dark:brightness-[100]"
                  alt="Drop"
                />
              </div>
            </div>
            <div
              class="grow ml-5 mr-10 relative justify-between lg:flex hidden"
            >
              <hr
                class="w-full absolute top-1/2 -translate-y-1/2 dark:opacity-20"
              />
              <div
                class="h-[18px] aspect-square rounded-[50%] ring-1 ring-offset-1 dark:ring-offset-0"
                :class="
                  i <= ipnumber
                    ? 'ring-blue bg-blue'
                    : 'ring-light-white-blue dark:ring-light-white-blue-8 bg-white dark:bg-[#2E2F31]'
                "
                v-for="i in 6"
              ></div>
            </div>
            <p
              class="text-base font-medium leading-[115%] text-primary dark:text-white"
            >
              $29.99
              <span class="text-primary-70 dark:text-white-70 font-normal">
                / Mo
              </span>
            </p>
          </div>
        </div>
      </div>

      <div
        class="bg-white mt-6 border border-light-white-blue-8 pb-5 dark:bg-white-5 rounded-[14px]"
      >
        <div
          class="px-4 py-5 rounded-[12px] lg:flex block justify-between items-center"
        >
          <div class="flex items-center">
            <div
              class="px-3.5 py-3 bg-light-white dark:bg-light-white-8 rounded-[8px]"
            >
              <img
                src="../../assets/svgs/dashbord/server-blue.svg"
                class="min-w-[17px]"
                alt="WWW"
              />
            </div>

            <div class="ml-4">
              <p
                class="lg:text-base text-[16px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                Services
              </p>
              <p
                class="mt-2.5 text-primary dark:text-white opacity-70 lg:text-sm text-[14px] font-normal leading-[150%]"
              >
                Control Panel
              </p>
            </div>
          </div>
        </div>

        <div
          class="rounded-[8px] px-2.5 mb-5 border border-primary-8 dark:border-white-8 mx-4 flex items-center"
        >
          <select
            class="appearance-none py-3.5 w-full outline-0 bg-transparent dark:text-white"
          >
            <option value="none">None</option>
            <option value="none">None2</option>
          </select>
          <img
            src="../../assets/svgs/dropdown.svg"
            class="dark:brightness-[100]"
            alt="Drop"
          />
        </div>

        <div class="mx-4">
          <p
            class="text-sm font-normal leading-[100%] tracking-[0.14px] text-primary dark:text-white"
          >
            cPanel & DirectAdmin can only be installed on:
          </p>
          <ul
            class="list-disc lg:list-inside mx-4 lg:mx-0 list-outside text-sm font-normal leading-[100%] tracking-[0.14px] text-primary-70 dark:text-white-70 mt-1 [&>*]:mt-2"
          >
            <li>cPanel: AlmaLinux 8 and 9, CloudLinux or Ubuntu 20</li>
            <li>
              DirectAdmin: AlmaLinux 8 and 9, CloudLinux, Ubuntu 20 and 22,
              Debian or CentOS 7
            </li>
          </ul>
        </div>
      </div>

      <div
        class="px-4 py-[18px] my-6 bg-white border border-light-white-blue-8 dark:bg-white-5 rounded-[12px] flex justify-between items-center"
      >
        <div class="flex items-center">
          <div>
            <p
              class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
            >
              DDoS Protection
            </p>
            <p
              class="mt-[5px] text-primary dark:text-white opacity-70 text-sm font-normal leading-[150%]"
            >
              40 Gbit/s is always included
            </p>
          </div>
        </div>

        <div class="flex items-center lg:justify-end justify-center">
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

      <div
        class="bg-white mt-6 pb-5 border border-light-white-blue-8 dark:bg-white-5 rounded-[14px]"
      >
        <div class="pb-5">
          <div
            class="px-4 py-5 rounded-[12px] lg:flex block justify-between items-center"
          >
            <div>
              <p
                class="lg:text-base text-[16px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                S3 Object Storage
              </p>
              <p
                class="mt-2.5 text-primary dark:text-white opacity-70 lg:text-sm text-[14px] font-normal leading-[150%]"
              >
                Control Panel
              </p>
            </div>
          </div>

          <div
            class="rounded-[8px] px-2.5 border border-primary-8 dark:border-white-8 mx-4 flex items-center"
          >
            <select
              class="appearance-none py-3.5 w-full outline-0 bg-transparent dark:text-white"
            >
              <option value="none">None</option>
              <option value="none">None2</option>
            </select>
            <img
              src="../../assets/svgs/dropdown.svg"
              class="dark:brightness-[100]"
              alt="Drop"
            />
          </div>
        </div>
        <div
          class="border-y pb-5 border-light-white-blue dark:border-light-white-blue-8"
        >
          <div
            class="px-4 py-5 rounded-[12px] lg:flex block justify-between items-center"
          >
            <div>
              <p
                class="lg:text-base text-[16px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                ThreadStone Cyber Security
              </p>
              <p
                class="mt-2.5 text-primary dark:text-white opacity-70 lg:text-sm text-[14px] font-normal leading-[150%]"
              >
                Control Panel
              </p>
            </div>
          </div>

          <div
            class="rounded-[8px] px-2.5 border border-primary-8 dark:border-white-8 mx-4 flex items-center"
          >
            <select
              class="appearance-none py-3.5 w-full outline-0 bg-transparent dark:text-white"
            >
              <option value="none">None</option>
              <option value="none">None2</option>
            </select>
            <img
              src="../../assets/svgs/dropdown.svg"
              class="dark:brightness-[100]"
              alt="Drop"
            />
          </div>
        </div>
        <div
          class="pb-5 border-b border-light-white-blue dark:border-light-white-blue-8"
        >
          <div
            class="px-4 py-5 rounded-[12px] lg:flex block justify-between items-center"
          >
            <div>
              <p
                class="lg:text-base text-[16px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                Remote Management
              </p>
              <p
                class="mt-2.5 text-primary dark:text-white opacity-70 lg:text-sm text-[14px] font-normal leading-[150%]"
              >
                You can remotely turn on, reboot or reinstall your server via
                the My Worldstream panel.
              </p>
            </div>
          </div>

          <!-- <div
            class="rounded-[8px] px-2.5 py-3.5 justify-between border border-blue bg-blue-5 mx-4 flex items-center"
          >
            <div class="flex items-start">
              <img
                src="../../assets/svgs/remote-server.svg"
                class="dark:brightness-[100]"
                alt="Remote"
              />
              <div class="ml-2.5">
                <p
                  class="text-[15px] font-medium leading-[115%] dark:text-white text-primary"
                >
                  iDRAC, Remote Reboot and Reinstallations
                </p>
                <p
                  class="text-[14.5px] font-normal text-primary dark:text-white leading-[115%] opacity-70 mt-[7px]"
                >
                  Date / Date
                </p>
              </div>
            </div>

            <div class="flex items-center">
              <img src="../../assets/svgs/check.svg" alt="Check" />
              <img
                src="../../assets/svgs/dropdown.svg"
                class="ml-2.5 dark:brightness-[100]"
                alt="Drop"
              />
            </div>
          </div> -->

          <Listbox as="div">
            <div class="relative">
              <ListboxButton
                class="relative w-full cursor-default text-left focus:outline-none sm:text-sm sm:leading-6"
              >
                <div
                  class="rounded-[8px] px-2.5 py-3.5 justify-between border border-blue bg-blue-5 mx-4 flex items-center"
                >
                  <div class="flex items-start">
                    <img
                      src="../../assets/svgs/remote-server.svg"
                      class="dark:brightness-[100]"
                      alt="Remote"
                    />
                    <div class="ml-2.5">
                      <p
                        class="text-[15px] font-medium leading-[115%] dark:text-white text-primary"
                      >
                        iDRAC, Remote Reboot and Reinstallations
                      </p>
                      <p
                        class="text-[14.5px] font-normal text-primary dark:text-white leading-[115%] opacity-70 mt-[7px]"
                      >
                        Date / Date
                      </p>
                    </div>
                  </div>

                  <div class="flex items-center">
                    <img src="../../assets/svgs/check.svg" alt="Check" />
                    <img
                      src="../../assets/svgs/dropdown.svg"
                      class="ml-2.5 dark:brightness-[100]"
                      alt="Drop"
                    />
                  </div>
                </div>
              </ListboxButton>

              <transition
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
              >
                <ListboxOptions
                  class="absolute z-20 mt-1 w-full overflow-auto rounded-md"
                >
                  <ListboxOption as="template" v-slot="{ active, selected }">
                    <div class="bg-black mx-4 p-4">
                      <p class="text-white">None</p>
                    </div>
                  </ListboxOption>
                </ListboxOptions>
              </transition>
            </div>
          </Listbox>
        </div>
        <div>
          <div
            class="px-4 py-5 rounded-[12px] lg:flex block justify-between items-center"
          >
            <div>
              <p
                class="lg:text-base text-[16px] font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
              >
                Service Level Agreement
              </p>
              <p
                class="mt-2.5 text-primary dark:text-white opacity-70 lg:text-sm text-[14px] font-normal leading-[150%]"
              >
                We offer 24/7 certified support all year long and answer your
                questions within 7 minutes.
              </p>
            </div>
          </div>

          <!-- <div
            class="rounded-[8px] px-2.5 py-3.5 justify-between border border-blue bg-blue-5 mx-4 flex items-center"
          >
            <div class="flex items-start">
              <img
                src="../../assets/svgs/sla.svg"
                class="dark:brightness-[100]"
                alt="Remote"
              />
              <p
                class="text-[15px] font-medium leading-[115%] text-primary dark:text-white ml-2.5"
              >
                SLA Premium-Support
              </p>
            </div>

            <div class="flex items-center">
              <img src="../../assets/svgs/check.svg" alt="Check" />
              <img
                src="../../assets/svgs/dropdown.svg"
                class="ml-2.5 dark:brightness-[100]"
                alt="Drop"
              />
            </div>
          </div> -->

          <Listbox as="div">
            <div class="relative">
              <ListboxButton
                class="relative w-full cursor-default text-left focus:outline-none sm:text-sm sm:leading-6"
              >
                <div
                  class="rounded-[8px] px-2.5 py-3.5 justify-between border border-blue bg-blue-5 mx-4 flex items-center"
                >
                  <div class="flex items-start">
                    <img
                      src="../../assets/svgs/sla.svg"
                      class="dark:brightness-[100]"
                      alt="Remote"
                    />
                    <p
                      class="text-[15px] font-medium leading-[115%] text-primary dark:text-white ml-2.5"
                    >
                      SLA Premium-Support
                    </p>
                  </div>

                  <div class="flex items-center">
                    <img src="../../assets/svgs/check.svg" alt="Check" />
                    <img
                      src="../../assets/svgs/dropdown.svg"
                      class="ml-2.5 dark:brightness-[100]"
                      alt="Drop"
                    />
                  </div>
                </div>
              </ListboxButton>

              <transition
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
              >
                <ListboxOptions
                  class="absolute z-20 mt-1 w-full overflow-auto rounded-md"
                >
                  <ListboxOption as="template" v-slot="{ active, selected }">
                    <div class="bg-black mx-4 p-4">
                      <p class="text-white">None</p>
                    </div>
                  </ListboxOption>
                </ListboxOptions>
              </transition>
            </div>
          </Listbox>
        </div>
      </div>

      <div
        class="bg-white border border-light-white-blue-8 dark:bg-white-5 rounded-[14px] my-5 py-5 px-4"
      >
        <p
          class="text-base font-medium leading-[100%] tracking-[0.16px] text-primary dark:text-white"
        >
          Payment terms
        </p>
        <p
          class="text-[15px] font-normal leading-[100%] tracking-[0.15px] text-primary-70 dark:text-white-70 mt-2.5"
        >
          Choose your terms
        </p>

        <div
          class="grid lg:grid-cols-2 grid-cols-1 gap-y-2.5 gap-x-[15px] mt-5 [&>*:first-child]:lg:col-start-1 [&>*:first-child]:lg :col-end-3"
        >
          <div
            class="px-2.5 py-3.5 border rounded-[8px] flex justify-between items-center cursor-pointer"
            v-for="(plist, index) in paymentlist"
            :key="index"
            @click="priceSelect = index"
            :class="
              priceSelect == index
                ? 'border-blue bg-blue-5'
                : 'border-primary-8 dark:border-white-8'
            "
          >
            <p
              class="lg:text-base text-[15px] font-medium leading-[115%] dark:text-white text-primary"
            >
              {{ plist.title }}
            </p>
            <div class="flex items-center">
              <img
                src="../../assets/svgs/check.svg"
                v-if="priceSelect == index"
                class="mr-2.5"
                alt="Check"
              />
              <p
                class="text-[15px] font-bold leading-[100%] tracking-[0.15px] dark:text-white text-primary"
              >
                $ {{ plist.price.toFixed(2) }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg-white border border-light-white-blue-8 dark:bg-white-5 rounded-[14px]"
      >
        <InstallMethod class="py-[18px] px-4" />
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
          <p
            class="text-[15px] text-primary dark:text-white mt-4 mb-5 font-medium leading-[115%] tracking-[0.15px]"
          >
            Your configuration
          </p>

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
import SelectInput from "../../components/Helper/SelectInput.vue";
import InstallMethod from "../../components/Helper/InstallMethod.vue";
import { ref } from "vue";
import Payment from "../../components/Helper/Payment.vue";
import Sidecart from "../../components/Helper/Sidecart.vue";
import ChooseOs from "../../components/Helper/ChooseOs.vue";
import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, ChevronUpDownIcon } from "@heroicons/vue/20/solid";

const activeTab = ref(0);
const activeBandwidth = ref(0);
const ipnumber = ref(2);
const priceSelect = ref(0);

const paymentlist = ref([
  {
    title: "Payment every month",
    price: 9.99,
  },
  {
    title: "Payment every 3 months",
    price: 9.99,
  },
  {
    title: "Payment every 6 months",
    price: 9.99,
  },
  {
    title: "Payment every 12 months",
    price: 9.99,
  },
  {
    title: "Payment every 24 months",
    price: 9.99,
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
