<script setup>
import Btn from "../../Helper/Btn.vue";

const props = defineProps({
  subtitle : {
    default : 'Blog'
  },
  title : {
    default : 'Article resourse'
  },
  caption : {
    default : 'Our pricing structure is transparent from the outset, with no hidden charges.'
  }
})
</script>

<template>
  <section
    class="bg-[url('../assets/images/banner-grad.png')] bg-[length:auto_100%] lg:bg-right-top bg-center object-cover bg-no-repeat px-4 bg-[#F8F9FC] dark:bg-[#191919]"
  >
    <div
      class="container flex items-center mx-auto lg:h-[445px] h-[380px]"
    >
      <div>
        <p class="lg:text-[19px] text-[16px] font-medium sm:text-start text-center leading-[150%] text-blue">
            {{ subtitle }}
        </p>
        <h2
          class="lg:text-[54px] text-[39px] sm:text-start text-center font-medium leading-[90%] tracking-[0.54px] mt-3.5 mb-5 text-primary dark:text-white"
        >
        {{ title }}
        </h2>

        <p class="max-w-[504px] text-secondary lg:text-[19px] text-[16px] sm:text-start text-center dark:text-white opacity-70 font-normal leading-[150%]" >
            {{ caption }}
        </p>
      </div>
    </div>
  </section>
</template>
