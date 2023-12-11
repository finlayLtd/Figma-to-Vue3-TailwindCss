<template>
  <header
    class="fixed top-0 w-full z-50 px-4"
    :class="backActive ? 100 > scrollYNumber ? '' : bgColor : bgColor"
  >
    <div class="container justify-between items-center flex mx-auto h-[66px]">
      <div class="flex grow box-border initial">
        <RouterLink to="#">
          <img
            src="../../assets/svgs/logo.svg"
            :class="backActive ? backBlack > scrollYNumber ? 'dark:hidden hidden' : 'dark:hidden block' :'dark:hidden block'"
            alt="LOGO"
            />
            <img
            src="../../assets/svgs/logo-white.svg"
            :class="backActive ? backBlack > scrollYNumber ? 'dark:block block' : 'dark:block hidden' :'dark:block hidden'"
            alt="LOGO"
          />
        </RouterLink>

        <img
          src="../../assets/svgs/divider.svg"
          class="ml-[25px] mr-[13px] xl:block hidden"
          :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
          alt="Divaider"
        />

        <ul
          class="xl:flex xl:static rounded-[12px] xl:p-0 p-4 xl:bg-transparent bg-white absolute top-[75px] left-0 right-0 xl:w-auto [&>li]:xl:mx-3  [&>li>a]:text-[15px]  [&>li>a]:font-medium [&>li]:xl:mb-0 [&>li]:mb-5 [&>li:last-child]:mb-0 dark:bg-[#252629E5] dark:xl:bg-transparent xl:border-0 border border-white-8 xl:shadow-none shadow-black-35"
          :class="[isMenuOpen ? 'block' : 'hidden' , backActive ? backBlack > scrollYNumber ? '[&>li>a]:xl:text-white' : '[&>li>a]:text-primary' :'[&>li>a]:text-primary']"
        >
          <li>
            <Menu as="div" class="relative inline-block text-left w-full">
              <div>
                <MenuButton
                  class="inline-flex w-full justify-center"
                  ref="notification"
                >
                  <div
                    class=" dark:text-white flex xl:justify-center justify-between w-full items-center"
                    :class="backActive ? backBlack > scrollYNumber ? 'xl:text-white' : 'text-primary' :'text-primary'"
                  >
                    Cloud Servers
                    <img
                      src="../../assets/svgs/dropdown.svg"
                      class="ml-[5px]"
                      :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
                      alt="Drop"
                    />
                  </div>
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
                  class="absolute sm:left-0 left-0 origin-top-right rounded-md bg-white dark:bg-[#323235] w-40 mt-1 z-50"
                >
                  <div role="none">
                    <ul>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'Policy'}">
                          Policy
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </li>
          <li>
            <Menu as="div" class="relative inline-block text-left w-full">
              <div>
                <MenuButton
                  class="inline-flex w-full justify-center"
                  ref="notification"
                >
                  <div
                    class="dark:text-white flex xl:justify-center justify-between w-full items-center"
                    :class="backActive ? backBlack > scrollYNumber ? 'xl:text-white' : 'text-primary' :'text-primary'"
                  >
                    Dedicated Servers
                    <img
                      src="../../assets/svgs/dropdown.svg"
                      class="dark:brightness-[100] ml-[5px]"
                      :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
                      alt="Drop"
                    />
                  </div>
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
                  class="absolute sm:left-0 left-0 origin-top-right rounded-md bg-white dark:bg-[#323235] w-40 mt-1 z-50"
                >
                  <div role="none">
                    <ul>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'DedicatedLanding'}">
                          Dedicated
                        </router-link>
                      </li>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'Blog'}">
                          Blog
                        </router-link>
                      </li>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'Abuse'}">
                          Abuse
                        </router-link>
                      </li>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'About'}">
                          About
                        </router-link>
                      </li>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'Glass'}">
                          Glass
                        </router-link>
                      </li>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'Policy'}">
                          Policy
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </li>
          <li>
            <Menu as="div" class="relative inline-block text-left w-full">
              <div>
                <MenuButton
                  class="inline-flex w-full justify-center"
                  ref="notification"
                >
                  <div
                    class=" dark:text-white flex xl:justify-center justify-between w-full items-center"
                  :class="backActive ? backBlack > scrollYNumber ? 'xl:text-white' : 'text-primary' :'text-primary'"

                  >
                    Storage Servers
                    <img
                      src="../../assets/svgs/dropdown.svg"
                      class="dark:brightness-[100] ml-[5px]"
                      :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
                      alt="Divider"
                    />
                  </div>
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
                  class="absolute sm:left-0 left-0 origin-top-right rounded-md bg-white dark:bg-[#323235] w-40 mt-1 z-50"
                >
                  <div role="none">
                    <ul>
                      <li class="py-1.5 px-1.5" >
                        <router-link :to="{name : 'Policy'}">
                          Policy
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </li>
          <li>
            <RouterLink
              :to="{name : 'Help'}"
              class="text-primary dark:text-white flex xl:justify-center items-center"
              >Help Center
            </RouterLink>
          </li>
          <li class="flex justify-between mt-1 xl:hidden">
            <Btn
              class="w-full"
              bg-color="bg-white dark:bg-white-5"
              border-color="border border-light dark:border-0"
              text-color="text-primary dark:text-white"
              >Login</Btn
            >
            <Btn
              bg-color="bg-blue"
              text-color="text-white"
              border-color="border border-blue"
              class="items-center w-full ml-2.5 flex justify-center"
            >
              Get started
              <img
                src="../../assets/svgs/right-arrow.svg"
                class="ml-2"
                alt=""
              />
            </Btn>
          </li>
        </ul>
      </div>

      <div class="flex items-center">
        <div class="flex items-center">
          <img
            src="../../assets/svgs/language.svg"
            class="mr-2"
            :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
            alt="Language"
          />
          <select class="bg-transparent dark:text-white" :class="backActive ? backBlack > scrollYNumber ? ' text-white' : ' text-primary' :' text-primary'">
            <option value="english">English</option>
          </select>
        </div>

        <img
          src="../../assets/svgs/divider.svg"
          class="mx-4"
          :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
          alt="Divider"
        />

        <div class="justify-center flex flex-row items-center">
          <div class="flex flex-row justify-between toggle">
            <label for="dark-toggle" class="flex items-center cursor-pointer">
              <div class="relative">
                <input
                  type="checkbox"
                  name="dark-mode"
                  id="dark-toggle"
                  class="checkbox hidden"
                  v-model="isDark"
                />
                <div
                  class="block border-white-5 border-[1px] border-black-50 rounded-full h-6 w-10 bg-white-50 dark:bg-white-5"
                ></div>
                <div
                  class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition flex items-center justify-center"
                >
                  <img src="../../assets/svgs/sun.svg" v-if="!isDark" alt="Sun" />
                  <img src="../../assets/svgs/moon.svg" v-else alt="Moon" />
                </div>
              </div>
            </label>
          </div>
        </div>

        <img
          src="../../assets/svgs/divider.svg"
          class="mx-4 select-none lg:block hidden"
          :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
          alt="Divider"
        />

        <Btn
          class="xl:block hidden"
          bg-color="bg-white dark:bg-white-5"
          border-color="border border-light dark:border-white-5"
          text-color="text-primary dark:text-white"
          >Login</Btn
        >
        <Btn
          bg-color="bg-blue"
          text-color="text-white"
          border-color="border border-blue"
          class="items-center ml-2.5 xl:flex hidden"
        >
          Get started
          <img
            src="../../assets/svgs/right-arrow.svg"
            class="ml-2"
            alt="Right arrow"
          />
        </Btn>

        <button @click="isMenuOpen = !isMenuOpen" class="ml-4 xl:hidden block">
          <img
            :src="
              isMenuOpen
                ? getImageUrl(`../../assets/svgs/close.svg`)
                : getImageUrl(`../../assets/svgs/bar.svg`)
            "
            class="min-w-[17px]"
            :class="backActive ? backBlack > scrollYNumber ? 'brightness-[100]' : 'dark:brightness-[100]' :'dark:brightness-[100]'"
            alt="Bar"
          />
        </button>
      </div>
    </div>
  </header>
</template>

<script setup>
import { RouterLink } from "vue-router";
import Btn from "../Helper/Btn.vue";
import { ref, watch, onMounted, computed } from "vue";
import { store } from "@/stores";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";

const isMenuOpen = ref(false);

const props = defineProps({
  backBlack: {
    default: 1000,
  },
  backActive: {
    default: false,
  },
  bgColor: {
    default : 'backdrop-blur-[25px] bg-[#f8f9fc26] dark:bg-transparent',
  }
});

const isDark = ref(false);
const getTheme = computed(() => store.getters["theme/getTheme"]);

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};

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

const scrollYNumber = ref(null);

window.addEventListener("scroll", (event) => {
  scrollYNumber.value = window.scrollY;
});
</script>

<style scoped>
input:checked ~ .dot {
  transform: translateX(100%);
}

.initial {
  position: initial;
}
</style>
