<template>
  <section class="bg-[url('../assets/images/sm-grad3.png')] sm:bg-[url('../assets/images/grad3.png')] bg-no-repeat px-4 object-cover bg-center bg-[length:100%_100%]">
    <div class="xl:my-[150px] my-[120px] container mx-auto">
      <div class="flex xl:flex-row flex-col items-center justify-between">
        <div class="xl:max-w-[405px] w-full">
          <h2
            class="text-[#171618] dark:text-white xl:text-[60px] xl:max-w-[405px] max-w-[243px] w-full text-[36px] font-bold leading-[95%] tracking-[0.6px]"
          >
            Capture
            <span class="feedtext"
              >feedback
              <img
                src="../../assets/svgs/textdeco.svg"
                class="absolute top-0 left-0 -z-50 dark:z-20"
                alt="Decoration"
              />
            </span>
            from many sources
          </h2>
          <p
            class="text-[#171618] dark:text-white  xl:max-w-[405px] max-w-[256px]  w-full xl:text-[19px] text-[16px] opacity-70 font-normal leading-[150%] xl:mt-6 mt-4"
          >
            All of your feedback, all in one place. User interviews, NPS
            surveys.
          </p>

          <div class="mt-[40px] xl:mb-0 mb-[30px]">
            <div
              class="sm:py-[17px] py-2 sm:px-[25px] px-3 cursor-pointer"
              v-for="(doc, ind) in feedbackDoc"
              :key="ind"
              :class="ind == activeFeedback ? 'active-feedback' : ''"
              @click="activeFeedback = ind"
            >
              <p
                class="opacity-30 text-[#222] dark:text-white text-[20px] font-medium leading-[29.04px]"
              >
                {{ doc }}
              </p>
              <img
                src="../../assets/svgs/right-arrow-black.svg"
                v-show="activeFeedback == ind"
                class="dark:hidden block dark:brightness-[100]"
                alt="Right arrow"
              />
              <img
                src="../../assets/svgs/right-arrow-strach.svg"
                v-show="activeFeedback == ind"
                alt="Right arrow"
                class="dark:block hidden min-w-[24px]"
              />
            </div>
          </div>
        </div>

        <div>
          <Renuwal :data="renewalDomain" />
        </div>
      </div>
      <div class="flex xl:flex-row flex-col-reverse items-center justify-between xl:mt-[150px] mt-[120px]">
        <div class="mt-[30px] xl:mt-0" >
          <img src="../../assets/images/feedback2.png" class="sm:max-w-[640px] dark:hidden block" alt="Feddback" />
          <img src="../../assets/images/feedback2-dark.png" class="sm:max-w-[640px] dark:block hidden" alt="Feedback" />
        </div>
        <div class="xl:max-w-[405px] w-full">
          <h2
            class="text-[#171618] dark:text-white xl:text-[60px] xl:max-w-[405px] max-w-[243px] w-full text-[36px] font-bold leading-[95%] tracking-[0.6px]"
          >
            Capture
            <span
              class="text-[#A330FD] font-bold leading-[95%] tracking-[0.6px]"
              >feedback
              <img
                src="../../assets/svgs/textdeco2.svg"
                class="absolute top-0 left-0 -z-10 dark:z-10"
                alt=""
              />
            </span>
            from many sources
          </h2>
          <p
            class="text-[#171618] xl:text-[19px] text-[16px] opacity-70 dark:text-white xl:max-w-[405px] max-w-[256px] w-full font-normal leading-[150%] xl:mt-6 mt-4"
          >
            All of your feedback, all in one place. User interviews, NPS
            surveys.
          </p>

          <div class="mt-[40px]">
            <div
              class="sm:py-[17px] py-2 sm:px-[25px] px-3 cursor-pointer"
              v-for="(doc, ind) in feedbackDoc"
              :key="ind"
              :class="ind == activeFeedback2 ? 'active-feedback' : ''"
              @click="activeFeedback2 = ind"
              >
              <p
              class="opacity-30 text-[#222] dark:text-white text-[20px] font-medium leading-[29.04px]"
              >
                {{ doc }}
              </p>
              <img
                src="../../assets/svgs/right-arrow-black.svg"
                v-show="activeFeedback2 == ind"
                class="dark:hidden block dark:brightness-[100]"
                alt="Right arrow"
              />
              <img
                src="../../assets/svgs/right-arrow-strach.svg"
                v-show="activeFeedback2 == ind"
                alt="Right arrow"
                class="dark:block hidden min-w-[24px]"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.feedtext {
  @apply bg-clip-text font-bold leading-[95%] tracking-[0.6px] relative text-transparent z-10;
  background: linear-gradient(
    123deg,
    #308efd 2.08%,
    #1ebcca 54.17%,
    #0ee39d 99.48%
  );
  -webkit-background-clip: text;
}

.active-feedback {
  @apply justify-between items-center shadow-[0px_1px_1px_0px_#E4E7EC,10px_0px_64px_-12px_rgba(16,24,40,0.15)] rounded-xl flex [&>*]:opacity-100 bg-white dark:bg-white-8 dark:shadow-none !important;
}
</style>

<script setup>
import { ref } from "vue";
const activeFeedback = ref(0);
const activeFeedback2 = ref(0);
import Renuwal from "../Helper/Renewal.vue";

const feedbackDoc = [
  "Bring it all in your inbox",
  "Document rich user interviews",
  "Capture with context",
];

const renewalDomain = [
  {
    year: "1 Year",
    isPopular: false,
    price: 4.99,
  },
  {
    year: "2 Year",
    isPopular: true,
    price: 9.99,
  },
  {
    year: "3 Year",
    isPopular: false,
    price: 15.99,
  },
  {
    year: "4 Year",
    isPopular: false,
    price: 29.99,
  },
  {
    year: "5 Year",
    isPopular: false,
    price: 39.99,
  },
];
</script>
