<template>
  <div
    class="bg-white dark:bg-transparent rounded-b-[12px] responsive-table hidden lg:block"
    :class="overflow"
  >
    <table class="w-full">
      <tr
        class="[&>*]:py-4 [&>*]:px-5 border-y border-light-white-blue dark:border-light-white-blue-8 dark:text-white-50 text-primary-50 text-[14.5px] [&>*]:font-normal [&>*]:tracking-[0.31px] [&>*]:leading-[100%]" v-if="isHeadDisplay"
      >
        <th v-for="(head, i) in headings.filter((item) => item?.lgDisplay != false)" :key="i">
          <div
            class="flex items-center min-w-max"
            :class="[i == 0 ? 'justify-start' : headPosition , head?.headPosition]"
          >
            {{ head.name }}
            <Button class="ml-1.5" v-if="head.isSort">
              <img
                src="../../assets/svgs/sortUp.svg"
                class="dark:hidden block"
                alt="sortUp"
              />
              <img
                src="../../assets/svgs/sortUp-white.svg"
                class="dark:block hidden"
                alt="sortUp"
              />
              <img
                src="../../assets/svgs/sortDown.svg"
                class="dark:hidden block"
                alt="sortDown"
              />
              <img
                src="../../assets/svgs/sortDown-white.svg"
                class="dark:block hidden"
                alt="sortDown"
              />
            </Button>
          </div>
        </th>
      </tr>

      <tr
        class="[&>*]:px-[20px] [&>*]:py-[18px] border-y last:border-b-0 border-light-white-blue dark:border-light-white-blue-8 text-white text-primary-80 [&>*]:font-medium [&>*]:tracking-[0.16px] hover:bg-[#F8F9FB] group dark:hover:bg-[#00000040] [&>*]:lg:text-[15px]"
        v-for="(tdata, ind) in data"
        :key="ind"
      >
        <td v-for="(head, i) in headings.filter((item) => item?.lgDisplay != false)" :class="dataPosition">
          <slot :name="`${head.slotName}`" :tdata="tdata" :index="ind" />
        </td>
      </tr>
    </table>
  </div>
  <div class="lg:hidden block">
    <div
      class="p-4 border-y border-dark-5 flex items-center justify-between"
      v-if="isHeadDisplay"
    >
      <div
        class="flex items-center"
        v-for="(head, i) in headingMobile.length ? headingMobile[0] : [] "
        :key="i"
      >

        <p
          class="text-primary-50 dark:text-white-50 text-[13px]  font-normal leading-[100%] tracking-[0.26px]"
        >
          {{ head.name }}
        </p>
        <Button class="ml-1.5" v-if="head.isSort">
          <img
            src="../../assets/svgs/sortUp.svg"
            class="dark:hidden block"
            alt="sortUp"
          />
          <img
            src="../../assets/svgs/sortUp-white.svg"
            class="dark:block hidden"
            alt="sortUp"
          />
          <img
            src="../../assets/svgs/sortDown.svg"
            class="dark:hidden block"
            alt="sortDown"
          />
          <img
            src="../../assets/svgs/sortDown-white.svg"
            class="dark:block hidden"
            alt="sortDown"
          />
        </Button>
      </div>
    </div>

    <div class="px-[18px] border-y border-dark-5 dark:border-[#eaeaea14] [&>*:first-child]:border-t-0 [&>*:last-child]:border-b-0" v-for="(tdata, ind) in data" :key="ind">
      <div
        class="py-4 border-y border-dark-5 dark:border-[#eaeaea14]"
        v-for="(mHeading, mindex) in headingMobile"
        :key="mindex"
      >
        <div class="flex items-center justify-between">
          <div
            v-for="(singleHeading, sindex) in mHeading"
            :key="sindex"
            :class="sindex == 1 ? 'text-right' : ''"
            class="[&:has(>.action-full)]:w-full"
          >
            <p
              class="text-primary dark:text-white text-[13px]  font-normal leading-[100%] opacity-50 mb-2.5"
              v-if="mindex != 0 || singleHeading?.mobileDisplayHeadonly" :class="[isHeadDisplay ? '' : 'hidden', singleHeading?.smHidden ? 'hidden' : '']"
            >
              {{ singleHeading.name }}
            </p>
            <slot :name="`${singleHeading.slotName}`" :tdata="tdata" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "vue";

const arrayToMatrix = (array, columns) =>
  Array(Math.ceil(array.length / columns))
    .fill("")
    .reduce((acc, cur, index) => {
      return [...acc, [...array].splice(index * columns, columns)];
    }, []);

// const head = ref([...head])

const headingMobile = computed(() => {
  let sort = ref(
    [...props.headings].sort((a, b) => a?.mobileIndex - b?.mobileIndex)
  );
  return arrayToMatrix(
    [...sort.value.filter((item) => item?.mobileDisplay != false)],
    2
  );
  // return arrayToMatrix(props.headings , 2)
});
const props = defineProps({
  data: {
    required: true,
  },
  headings: {
    required: true,
  },
  headPosition : {
    default : 'justify-center',
  },
  dataPosition : {
    default : 'text-center'
  },
  overflow : {
    default : ''
  },
  isHeadDisplay : {
    default : true
  }
});
</script>
