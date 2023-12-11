<template>
  <div class="container max-w-[1100px] mx-auto mt-[169px] px-4">
    <div id="accordion-collapse" data-accordion="collapse">
      <div v-for="(faq , index) in faqList" :key="index" class="py-5 border-b border-[#1F202214] dark:border-white-8">
        <h2 id="accordion-collapse-heading-1">
          <button
            type="button"
            class="flex items-center justify-between w-full font-medium text-left"
            data-accordion-target="#accordion-collapse-body-1"
            aria-expanded="true"
            aria-controls="accordion-collapse-body-1"
            @click="activeFaq = index"
          >
            <span class="lg:text-xl font-medium leading-[150%] text-[18px] text-dark dark:text-white" >{{ faq.title }}</span>
            <img src="../../../assets/svgs/right-arrow-black.svg" class="dark:hidden block"  :class="activeFaq == index ? 'rotate-90' : ''" alt="Arrow" />
            <img src="../../../assets/svgs/swiper-arrow-white.svg"  class="dark:block hidden" :class="activeFaq == index ? 'rotate-90' : ''" alt="Arrow" />
          </button>
        </h2>
        <div
          id="accordion-collapse-body-1"
          :class="activeFaq == index ? '' : 'hidden'"
          aria-labelledby="accordion-collapse-heading-1"
        >
          <div
            class="mt-3"
          >
            <p class="whitespace-pre-line lg:text-base text-[15px] font-normal leading-[140%] text-dark dark:text-white opacity-50" >{{ faq.disc }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from "vue";

const activeFaq = ref(0)
const faqList = reactive([
  {
    title: "Any question on any topic!",
    disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
        
        Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
    `,
  },
  {
    title: "Any question on any topic!",
    disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
        
        Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
    `,
  },
  {
    title: "Any question on any topic!",
    disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
        
        Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
    `,
  },
  {
    title: "Any question on any topic!",
    disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
        
        Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
    `,
  },
  {
    title: "Any question on any topic!",
    disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
        
        Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
    `,
  },
  {
    title: "Any question on any topic!",
    disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
        
        Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
    `,
  },
]);
</script>
