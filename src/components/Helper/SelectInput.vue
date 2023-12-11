<template>
  <Listbox as="div" v-model="selected">
    <div class="relative">
      <ListboxButton
        class="relative w-full cursor-default bg-white dark:bg-white-5 py-2.5 px-3.5 text-left text-gray-900 shadow-light-white dark:shadow-input-dark border border-light dark:border-light-8 rounded-[8px] focus:outline-none sm:text-sm sm:leading-6"
      >
        <div class="flex justify-between items-center">
          <div>
            <p class="text-primary dark:text-white opacity-40 text-xs font-medium leading-[100%] tracking-[-0.12px]">{{ label }}</p>
            <span class="flex items-center mt-1.5">
              <img
                :src="getImageUrl(selected.icon)"
                v-if="selected.icon"
                alt="Flag"
                class="min-w-[16px] max-w-[16px] flex-shrink-0 rounded-full mr-[5px]"
              />
              <span
                class=" text-primary dark:text-white text-base font-medium leading-[100%] tracking-[-0.16px]; block truncate"
                >{{ selected.name }}</span
              >
            </span>
          </div>
          <span
            class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center"
          >
            <img
              src="../../assets/svgs/drop-thin.svg"
              class="dark:brightness-[100]"
              alt="drop"
            />
          </span>
        </div>
      </ListboxButton>

      <transition
        leave-active-class="transition ease-in duration-100"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <ListboxOptions
          class="absolute z-20 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white dark:bg-black py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
        >
          <ListboxOption
            as="template"
            v-for="person in list"
            :key="person.id"
            :value="person"
            v-slot="{ active, selected }"
          >
            <li
              :class="[
                active ? 'bg-indigo-600 text-white' : 'text-gray-900 dark:text-white',
                'relative cursor-default select-none py-2 pl-3 pr-9',
              ]"
            >
              <div class="flex items-center">
                <img
                  :src="getImageUrl(person.icon)"
                  v-if="person.icon"
                  alt="Flag"
                  class="h-5 w-5 flex-shrink-0 rounded-full"
                />
                <span
                  :class="[
                    selected ? 'font-semibold' : 'font-normal',
                    'ml-3 block truncate',
                  ]"
                  >{{ person.name }}</span
                >
              </div>

              <span
                v-if="selected"
                :class="[
                  active ? 'text-white' : 'text-indigo-600',
                  'absolute inset-y-0 right-0 flex items-center pr-4',
                ]"
              >
                <CheckIcon class="h-5 w-5" aria-hidden="true" />
              </span>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>
</template>

<script setup>
import { ref } from "vue";
import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, ChevronUpDownIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
    list : {
        required : true
    },
    label : {
        default : 'Country'
    }
})

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};

const selected = ref(props.list[0]);
</script>
