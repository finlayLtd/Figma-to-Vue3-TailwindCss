<script setup>
import Btn from "../Helper/Btn.vue";
import SimpleSelect from "../Helper/SimpleSelect.vue";
</script>

<template>
  <section
    class="bg-[url('../assets/images/banner-grad.png')] bg-[length:50%_auto] lg:bg-right-top object-cover bg-no-repeat px-4 bg-[#F8F9FC] dark:bg-[#191919] lg:mb-0 mb-[150px]"
  >
    <div
      class="bg-[url('../assets/images/banner-grad.png')] bg-[length:100%_100%] bg-center object-cover 2xl:hidden block"
    >
      <div class="container pt-[150px] mb-[50px] mx-auto">
        <p class="text-[16px] font-medium leading-[150%] text-blue text-center">
          Blog
        </p>
        <h1
          class="text-[39px] font-medium leading-[90%] tracking-[0.54px] text-primary text-center dark:text-white mb-5 mt-3.5"
        >
          Abuse report
        </h1>
        <p
          class="text-[16px] font-normal leading-[150%] text-primary text-center opacity-70 dark:text-white"
        >
          Our pricing structure is transparent from the outset
        </p>
      </div>
    </div>

    <div
      class="container flex 2xl:flex-row flex-col-reverse justify-between items-center mx-auto 2xl:h-[780px]"
    >
      <div class="max-w-[586px] w-full mt-[50px] 2xl:mt-0">
        <div class="2xl:block hidden" >
          <p class="text-[19px] font-medium leading-[150%] text-blue">Blog</p>
          <h1
            class="text-[54px] font-medium leading-[90%] tracking-[0.54px] text-primary dark:text-white mb-5 mt-3.5"
          >
            Abuse report
          </h1>
          <p
            class="text-[19px] font-normal leading-[150%] text-primary opacity-70 dark:text-white"
          >
            Our pricing structure is transparent from the outset
          </p>
        </div>

        <div class="grid grid-cols-2 gap-y-10 lg:gap-x-0 gap-x-[26px] mt-10">
          <div v-for="i in 4" :key="i">
            <img
              src="../../assets/svgs/check.svg"
              class="min-w-[28px] lg:mx-0 mx-auto"
              alt="Check"
            />
            <p
              class="text-secondary lg:text-start text-center  dark:text-white lg:text-lg text-[16px] font-bold leading-[109%] mt-[18px] mb-2.5"
            >
              AI-Powered DDoS Protection
            </p>
            <p
              class="lg:text-base text-[14px] lg:text-start text-center font-normal leading-[130.5%] dark:text-white-70 text-primary-70 opacity-90"
            >
              Lock your domain to prevent
            </p>
          </div>
        </div>
      </div>
      <div class="max-w-[586px] w-full">
        <div
          class="lg:p-[30px] p-5 bg-white bg-white-5 border border-primary-8 rounded-[12px]"
        >
          <h3
            class="lg:text-2xl text-[20px] font-bold leading-[120%] text-primary dark:text-white"
          >
            Report Form
          </h3>

          <form
            class="lg:grid block grid-cols-2 gap-x-3.5 gap-y-[18px] mt-[30px]"
            @submit.prevent
          >
            <input
              type="text"
              placeholder="Name"
              class="py-2.5 px-3.5 w-full border dark:bg-white-5 dark:border-light-8 dark:text-white bg-white border-light outline-0 rounded-[7px]"
            />
            <input
              type="text"
              placeholder="Email address"
              class="py-2.5 px-3.5 my-4 lg:my-0 w-full border dark:bg-white-5 dark:border-light-8 dark:text-white bg-white border-light outline-0 rounded-[7px]"
            />

            <SimpleSelect class="col-start-1 col-end-3" />

            <textarea
              placeholder="Text about"
              class="py-2.5 w-full mt-4 lg:mt-0  col-start-1 col-end-3 dark:bg-white-5 dark:border-light-8 dark:text-white px-3.5 border bg-white border-light outline-0 rounded-[7px] resize-none h-[106px] mb-[22px]"
            ></textarea>

            <Btn
              bg-color="bg-blue"
              border-color="border border-blue"
              text-color="text-white"
              class="w-full col-start-1 col-end-3"
              >Send report</Btn
            >
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
