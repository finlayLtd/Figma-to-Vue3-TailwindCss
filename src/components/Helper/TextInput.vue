<template>
  <div
    class="relative dark:bg-white-5 bg-white border shadow-light-white dark:shadow-input-dark rounded-lg px-1"
    :class="isMessageShow ? 'border-tomato' : 'border-light dark:border-light-8'"
  >
    <input
      :type="type"
      class="block px-2.5 pb-[8.5px] pt-5 w-full text-[16px] bg-transparent appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      :class="isMessageShow ? 'text-tomato' : 'text-primary dark:text-white'"
      :id="`float${Number(label)}`"
      placeholder=""
      :value="value"
      @input="$emit('atInput' , $event.target.value)"
      autocomplete="off"
    />
    <label
      :for="`float${Number(label)}`"
      class="absolute text-[16px] text-primary opacity-40 dark:text-gray-400 duration-300 transform -translate-y-3.5 scale-75 top-3.5 z-10 origin-[0] left-3.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3.5"
      >{{ label }}</label
    >
    <slot />
  </div>
  <div class="flex mt-2.5" v-if="isMessageShow">
    <img src="../../assets/svgs/input-error.svg" class="lg:max-w-[20px] max-w-[18px]" alt="Error">
    <p class="lg:text-base text-[15px] font-medium leading-[130%] text-tomato ml-1.5" >{{ errorMessage }}</p>
  </div>
</template>

<script setup>
const props = defineProps(
    {
        label : {
            default : 'name'
        },
        value : {
            default : ''
        },
        type : {
          default : 'text'
        },
        isMessageShow : {
          default : false
        },
        errorMessage : {
          default : 'error'
        }
    }
)
</script>
