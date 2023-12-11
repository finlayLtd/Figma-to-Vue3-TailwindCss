<template>
  <header
    class="fixed top-0 w-full z-50 bg-white dark:bg-[#1A1A1D] shadow-[0px_1px_1px_0px_#E4E7EC,0px_0px_30px_-12px_rgba(16,24,40,0.05)] 
    dark:shadow-[0px_1px_1px_0px_rgba(75,75,75,0.25)]"
  >
      <div class="justify-between items-center flex h-[66px]">
      <div class="flex lg:px-7 pl-4">
        <RouterLink to="#">
          <img
            src="../../assets/svgs/logo.svg"
            class="dark:hidden block lg:h-[22px] h-[29px]"
            alt="LOGO"
          />
          <img
            src="../../assets/svgs/logo-white.svg"
            class="dark:block hidden lg:h-[22px] h-[29px]"
            alt="LOGO"
          />
        </RouterLink>
      </div>

      <div class="container relative lg:mx-auto mx-4">
        <div class="flex justify-between">
          <div></div>
          <div class="flex items-center">
            <div class="items-center lg:flex hidden">
              <img
                src="../../assets/svgs/language.svg"
                class="mr-2 dark:hidden block"
                alt="Languange"
              />
              <img
                src="../../assets/svgs/language-white.svg"
                class="mr-2 dark:block hidden"
                alt="Languange"
              />
              <select class="bg-transparent dark:text-white">
                <option value="english">English</option>
              </select>
            </div>

            <img
              src="../../assets/svgs/divider.svg"
              class="mx-4 dark:hidden lg:block hidden"
              alt="Divider"
            />
            <img
              src="../../assets/svgs/divider-white.svg"
              class="mx-4 dark:block hidden dark-divider"
              alt="Divider"
            />

            <div class="justify-center flex flex-row items-center">
              <div class="flex flex-row justify-between toggle">
                <label
                  for="dark-toggle"
                  class="flex items-center cursor-pointer"
                >
                  <div class="relative">
                    <input
                      type="checkbox"
                      name="dark-mode"
                      id="dark-toggle"
                      class="checkbox hidden"
                      v-model="isDark"
                    />
                    <div
                      class="block border-[1px] border-black-50 dark:border-[#FFFFFF40] rounded-full h-6 w-10 bg-transparent dark:bg-black"
                    ></div>
                    <div
                      class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition flex items-center justify-center"
                    >
                      <img
                        src="../../assets/svgs/sun.svg"
                        v-if="!isDark"
                        alt="Sun"
                      />
                      <img src="../../assets/svgs/moon.svg" v-else alt="Moon" />
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <img
              src="../../assets/svgs/divider.svg"
              class="lg:ml-4 mx-4 dark:hidden block"
              alt="Divider"
            />
            <img
              src="../../assets/svgs/divider-white.svg"
              class="lg:ml-4 mx-4 dark:block hidden"
              alt="Divider"
            />

            <Menu
              as="div"
              class="relative inline-block text-left lg:pt-1.5 lg:ml-2.5 lg:mx-4 p-0 m-0"
            >
              <div>
                <MenuButton
                  class="lg:inline-flex hidden w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm"
                  ref="notification"
                >
                  <img
                    src="../../assets/svgs/ball.svg"
                    class="dark:hidden block"
                    alt="Ball"
                  />
                  <img
                    src="../../assets/svgs/ball-white.svg"
                    class="dark:block hidden"
                    alt="Ball"
                  />
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
                  class="absolute min-[1900px]:-translate-x-2 -translate-x-[45%] sm:left-0 left-0 origin-top-right rounded-md bg-white dark:bg-[#323235] shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-5 z-50"
                >
                  <div role="none">
                    <div>
                      <h3
                        class="text-primary dark:text-white text-[17px]  font-bold leading-[normal] px-5 text-start mt-3.5"
                      >
                        Notifications
                      </h3>
                      <div
                        class="flex [&>*]:min-w-fit dark:text-white [&>*]:mr-[22px] [&>*]:pb-3.5 px-5 mt-5"
                      >
                        <button
                          :class="
                            activeNotifictionTab == index
                              ? 'border-b border-blue'
                              : ''
                          "
                          v-for="(ntab, index) in notificationTab"
                          :key="index"
                          @click="activeNotifictionTab = index"
                        >
                          {{ ntab }}
                        </button>
                      </div>

                      <ul>
                        <li
                          class="px-[18px] py-3.5 text-start border-t border-primary-8 dark:border-white-8"
                        >
                          <h5
                            class="text-primary dark:text-white text-sm  font-bold leading-[100%]"
                          >
                            New update!
                          </h5>
                          <p
                            class="py-2.5 text-primary-80 dark:text-[#ffffffcc] text-[13px]  font-medium leading-[140%] opacity-80"
                          >
                            Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s,
                          </p>
                          <p
                            class="text-primary-50 dark:text-white-50 text-[12.5px]  font-normal leading-[140%] opacity-50"
                          >
                            1 min ago
                          </p>
                        </li>
                        <li
                          class="px-[18px] py-3.5 text-start border-t border-primary-8 dark:border-white-8"
                        >
                          <h5
                            class="text-primary dark:text-white text-sm  font-bold leading-[100%]"
                          >
                            New update!
                          </h5>
                          <p
                            class="py-2.5 text-primary-80 dark:text-[#ffffffcc] text-[13px]  font-medium leading-[140%] opacity-80"
                          >
                            Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s,
                          </p>
                          <p
                            class="text-primary-50 dark:text-white-50 text-[12.5px]  font-normal leading-[140%] opacity-50"
                          >
                            1 min ago
                          </p>
                        </li>
                        <li
                          class="px-[18px] py-3.5 text-start border-t border-primary-8 dark:border-white-8"
                        >
                          <h5
                            class="text-primary dark:text-white text-sm  font-bold leading-[100%]"
                          >
                            New update!
                          </h5>
                          <p
                            class="py-2.5 text-primary-80 dark:text-[#ffffffcc]  text-[13px]  font-medium leading-[140%] opacity-80"
                          >
                            Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s,
                          </p>
                          <p
                            class="text-primary-50 dark:text-white-50 text-[12.5px]  font-normal leading-[140%] opacity-50"
                          >
                            1 min ago
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </MenuItems>
              </transition>
            </Menu>

            <Btn
              bg-color="bg-blue"
              text-color="text-white"
              border-color="border border-blue"
              text-size="lg:text-[15px] text-[14px]"
              btnPadding="py-2 px-2 lg:py-1.5 lg:px-4 max-[380px]:py-1"
              class="flex items-center font-medium"
              @click="isrefillOpen = true"
            >
              $10.30
              <img
                src="../../assets/svgs/plus-blue.svg"
                class="ml-1.5 min-w-[16px]"
                alt="Plus"
              />
            </Btn>
            <Menu as="div" class="relative inline-block text-left ml-2.5 lg:mr-2.5 mr-0">
              <div>
                <MenuButton
                  class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white dark:bg-white-5 lg:px-3 px-2 lg:py-2 py-[7px] text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-light-8 hover:bg-gray-50"
                >
                  <img
                    src="../../assets/svgs/user-avtar.svg"
                    class="rounded-full min-w-[18px]"
                    alt="Plus"
                  />
                  <p class="lg:block dark:text-white hidden ml-1.5">Udodov</p>
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
                  class="absolute right-0 z-10 w-56 origin-top-right rounded-md bg-white dark:bg-[#323235] shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-4"
                >
                  <div role="none">
                    <div class="user-dropdown">
                      <div class="flex items-center py-2 px-4">
                        <img
                          src="../../assets/svgs/user-avtar.svg"
                          class="mr-1.5 rounded-full aspect-square h-[30px]"
                          alt="Plus"
                        />
                        <div>
                          <h5
                            class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
                          >
                            Renewal
                          </h5>
                          <p
                            class="text-primary-50 dark:text-white text-[13px]  font-normal leading-[100%] tracking-[0.13px] opacity-50 mt-[5px]"
                          >
                            udodov@gmail.com
                          </p>
                        </div>
                      </div>
                      <hr class="dark:opacity-10" />
                      <ul>
                        <li class="py-2.5 hover:bg-light-white px-4">
                          <router-link to="#" class="flex">
                            <img
                              src="../../assets/svgs/setting.svg"
                              class="dark:hidden block"
                              alt="Setting"
                            />
                            <img
                              src="../../assets/svgs/setting-white.svg"
                              class="dark:block hidden"
                              alt="Setting"
                            />
                            <p
                              class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                            >
                              Settings
                            </p>
                          </router-link>
                        </li>
                        <li class="py-2.5 hover:bg-light-white px-4">
                          <router-link to="#" class="flex">
                            <img
                              src="../../assets/svgs/security.svg"
                              class="dark:hidden block"
                              alt="Security"
                            />
                            <img
                              src="../../assets/svgs/security-white.svg"
                              class="dark:block hidden"
                              alt="Security"
                            />
                            <p
                              class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                            >
                              Settings
                            </p>
                          </router-link>
                        </li>
                        <li class="py-2.5 hover:bg-light-white px-4">
                          <router-link to="#" class="flex">
                            <img
                              src="../../assets/svgs/tickets.svg"
                              class="dark:hidden block"
                              alt="Tickets"
                            />
                            <img
                              src="../../assets/svgs/tickets-white.svg"
                              class="dark:block hidden"
                              alt="Tickets"
                            />
                            <p
                              class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                            >
                              Settings
                            </p>
                          </router-link>
                        </li>
                        <hr class="dark:opacity-10" />
                        <li class="py-2.5 hover:bg-light-white px-4">
                          <router-link to="#" class="flex">
                            <img
                              src="../../assets/svgs/signout.svg"
                              class="dark:hidden block"
                              alt="Signout"
                            />
                            <img
                              src="../../assets/svgs/signout-white.svg"
                              class="dark:block hidden"
                              alt="Signout"
                            />
                            <p
                              class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                            >
                              Settings
                            </p>
                          </router-link>
                        </li>
                      </ul>
                    </div>
                  </div>
                </MenuItems>
              </transition>
            </Menu>

            <button class="ml-4 lg:hidden block hidden-dark  min-w-[17px]" @click="sidebarOpen">
              <img src="../../assets/svgs/bar.svg" alt="Bar" class="fade" v-if="!isSidebarOpen">
              <img src="../../assets/svgs/dashbord/close.svg" alt="Bar" class="fade" v-else>
            </button>
            <button class="ml-4 dark:block hidden-cus hidden min-w-[17px]" @click="sidebarOpen">
              <img src="../../assets/svgs/bar-white.svg" alt="Bar" class="fade" v-if="!isSidebarOpen">
              <img src="../../assets/svgs/close-white.svg" alt="Bar" class="fade" v-else>
            </button>
          </div>
        </div>

        <!-- <div class="user-dropdown" v-if="isActiveUserDropdown">
          <div class="flex items-center py-2 px-4">
            <img
              src="../../assets/svgs/user-avtar.svg"
              class="mr-1.5 rounded-full aspect-square h-[30px]"
              alt="Plus"
            />
            <div>
              <h5
                class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
              >
                Renewal
              </h5>
              <p
                class="text-primary-50 dark:text-white text-[13px]  font-normal leading-[100%] tracking-[0.13px] opacity-50 mt-[5px]"
              >
                udodov@gmail.com
              </p>
            </div>
          </div>
          <hr class="dark:opacity-10" />
          <ul>
            <li class="py-2.5 hover:bg-light-white px-4">
              <router-link to="#" class="flex">
                <img
                  src="../../assets/svgs/setting.svg"
                  class="dark:hidden block"
                  alt="Setting"
                />
                <img
                  src="../../assets/svgs/setting-white.svg"
                  class="dark:block hidden"
                  alt="Setting"
                />
                <p
                  class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                >
                  Settings
                </p>
              </router-link>
            </li>
            <li class="py-2.5 hover:bg-light-white px-4">
              <router-link to="#" class="flex">
                <img
                  src="../../assets/svgs/security.svg"
                  class="dark:hidden block"
                  alt="Security"
                />
                <img
                  src="../../assets/svgs/security-white.svg"
                  class="dark:block hidden"
                  alt="Security"
                />
                <p
                  class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                >
                  Settings
                </p>
              </router-link>
            </li>
            <li class="py-2.5 hover:bg-light-white px-4">
              <router-link to="#" class="flex">
                <img
                  src="../../assets/svgs/tickets.svg"
                  class="dark:hidden block"
                  alt="Tickets"
                />
                <img
                  src="../../assets/svgs/tickets-white.svg"
                  class="dark:block hidden"
                  alt="Tickets"
                />
                <p
                  class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                >
                  Settings
                </p>
              </router-link>
            </li>
            <hr class="dark:opacity-10" />
            <li class="py-2.5 hover:bg-light-white px-4">
              <router-link to="#" class="flex">
                <img
                  src="../../assets/svgs/signout.svg"
                  class="dark:hidden block"
                  alt="Signout"
                />
                <img
                  src="../../assets/svgs/signout-white.svg"
                  class="dark:block hidden"
                  alt="Signout"
                />
                <p
                  class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                >
                  Settings
                </p>
              </router-link>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
    <Model :isopen="isrefillOpen">
      <Refill @closeModel="(mVal) => isrefillOpen = mVal" />
    </Model>
  </header>
</template>

<script setup>
import { RouterLink } from "vue-router";
import Btn from "@/components/Helper/Btn.vue";
import { ref, watch, onMounted, computed } from "vue";
import { store } from "@/stores";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Model from "../../views/Domain/components/Model.vue";
import Refill from './Refill.vue'

const isActiveUserDropdown = ref(false);
const activeNotifictionTab = ref(0);
const isDark = ref(false);
const getTheme = computed(() => store.getters["theme/getTheme"]);
const isNotificationEffect = computed(() => store.getters["notification/getNotificationOpen"]);
const isSidebarOpen = computed(() => store.getters["sidebar/getSidebarOpen"]);
const sidebarOpen = () => {
  isSidebarOpen.value ? store.dispatch('sidebar/set_sidebar_close') : store.dispatch('sidebar/set_sidebar_open')
}

const notification = ref(null);
const isrefillOpen = ref(false)


watch(isNotificationEffect , (newTheme, oldTheme) => {
  // console.log(newTheme , oldTheme);
  if(newTheme) {
    console.log(notification.value.$el.click());
  }
})

onMounted(() => {
  isDark.value = getTheme.value;
}),
  watch(isDark, (newTheme, oldTheme) => {
    // console.log(newTheme , oldTheme);
    if (newTheme) {
      store.dispatch("theme/set_theme_dark");
    } else {
      store.dispatch("theme/set_theme_light");
    }
  });



const notificationTab = ref(["View all", "General", "Security", "Details"]);
</script>

<style scoped>
input:checked ~ .dot {
  transform: translateX(100%);
  /* background-color: #132b50; */
}

.user-btn {
  @apply p-1.5 !important;
}

@media screen and (max-width : 1024px) {
  .dark-divider {
    display: none;
  }
}

.hidden-cus {
  @apply lg:hidden !important ;
}

.hidden-dark {
  @apply dark:hidden !important ;
}
</style>
