<template>
    <Listbox as="div" v-model="selected">
      <div class="relative">
        <ListboxButton class="relative w-full cursor-default text-left py-2.5 dark:bg-white-5 dark:border-light-8 dark:text-white px-3.5 border bg-white border-light outline-0 rounded-[7px]">
            <span class="block truncate">{{ selected.name }}</span>
          <span class="pointer-events-none absolute inset-y-0 right-0 mr-2 flex items-center pr-2">
            <img src="../../assets/svgs/drop-thin.svg" class="w-[15px] dark:brightness-[100]" alt="Drop">
          </span>
        </ListboxButton>
  
        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute z-10 mt-2 max-h-56 w-full rounded-[8px] overflow-auto shadow-[0px_8px_35px_0px_rgba(0,0,0,0.10)] bg-white dark:bg-[#323235] p-1.5 text-base">
            <ListboxOption as="template" v-for="person in people" :key="person.id" :value="person" v-slot="{ active, selected }">
              <li :class="[active ? 'bg-light-white dark:bg-light-white-8 rounded-[6px] dark:text-white text-primary' : 'dark:text-white text-primary', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{ person.name }}</span>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
  import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
  
  const people = [
    {
      id: 1,
      name: 'Any category 1...',
    },
    {
      id: 2,
      name: 'Any category 2...',
    },
    {
      id: 3,
      name: 'Any category 3...',
    },
    {
      id: 4,
      name: 'Any category 4...',
    }
  ]
  
  const selected = ref(people[3])
  </script>