<script setup>
import Btn from "../../Helper/Btn.vue";
</script>

<template>
  <section
    class="bg-[url('../assets/images/banner-grad.png')] bg-[length:auto_100%] lg:bg-right-top bg-center object-cover bg-no-repeat px-4 bg-[#F8F9FC] dark:bg-[#191919]"
  >
    <div
      class="container grid place-items-center mx-auto lg:h-[445px] h-[380px]"
    >
      <div class="text-center">
        <p class="lg:text-[19px] text-[16px] font-medium leading-[150%] text-blue">
          Frequently Asked Question
        </p>
        <h2
          class="lg:text-[54px] text-[39px] font-medium leading-[90%] tracking-[0.54px] mt-3.5 lg:mb-[50px] mb-[35px] text-primary dark:text-white"
        >
          Help Center
        </h2>

        <div class="max-w-[530px] xl:min-w-[530px]" >
          <div
            class="flex justify-between items-center w-full py-1.5 px-3.5 bg-white dark:shadow-input-dark dark:bg-white-5 rounded-[8px]"
          >
            <div class="flex items-center grow">
              <img
                src="../../../assets/svgs/search.svg"
                class="dark:brightness-[100]"
                alt="Search"
              />
              <input
                type="search"
                class="bg-transparent text-primary dark:text-white lg:text-base text-[15px] outline-0 mx-2.5 grow"
                placeholder="Search in our resources"
              />
            </div>
            <Btn
              bgColor="bg-[#026DEBB8]"
              textColor="text-white"
              text-size="text-[14px] lg:text-[15px]"
              border-color="border-0"
              >Search</Btn
            >
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
