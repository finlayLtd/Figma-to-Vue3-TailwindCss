<template>
  <div
    class="container sm:px-0 px-4 flex flex-col-reverse 2xl:flex-row justify-between mx-auto lg:mt-[60px] mt-[50px]"
  >
    <div
      class="2xl:max-w-[934px] w-full grow mt-[60px] lg:mb-0 mb-[150px] 2xl:mt-0"
    >
      <div v-for="(para , ind) in test" class="mb-[50px]" :key="ind">
        <h3 v-if="para.title" class="lg:text-[32px] text-[22px] font-bold leading-[90%] tracking-[0.32px] dark:text-white text-primary" >{{ para.title }}</h3>

        <p v-if="para.subTitle" class="lg:mt-[30px] mt-6 mb-[16px] text-[18px] lg:text-[22px] dark:text-white text-primary font-bold leading-[90%] tracking-[0.22px]">{{ `${ind}. ${para.subTitle}` }}</p>

        <p
          class="whitespace-pre-line lg:text-[19px] text-[16px] font-normal leading-[160%] text-primary dark:text-white opacity-70"
          v-if="para.text"
        >
          {{ para.text }}
        </p>
      </div>
    </div>

    <div class="2xl:max-w-[389px] w-full">

      <div class="lg:px-4 py-[9px]" >
        <h5 class="text-[22px] font-bold leading-[90%] tracking-[0.22px] text-primary dark:text-white pb-2" >Contents</h5>

        <p class="mt-4" v-for="i in 3" :key="i" >

            <RouterLink class="text-lg font-normal underline leading-[115%] tracking-[0.18px] text-blue-80" 
            to="#">Anything information. Episode {{ i }}</RouterLink>
        </p>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
const test = ref([
  {
    title: "",
    subTitle: "",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).`,
  },
  {
    title: "Reading",
    subTitle: "About everything",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."`,
  },
  {
    title: "",
    subTitle: "About everything",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."`,
  },
  {
    title: "",
    subTitle: "About everything",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."`,
  },
  {
    title: "Discount everythings",
    subTitle: "About everything",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."`,
  },
  {
    title: "",
    subTitle: "About everything",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."`,
  },
  {
    title: "",
    subTitle: "About everything",
    text: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).

It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
Here is your text.. Here is your text.."`,
  },
]);
</script>
