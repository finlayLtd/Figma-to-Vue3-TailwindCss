<template>
    <div
      class="py-3 px-5 flex items-center justify-between bg-white border-t border-light-white-blue dark:border-light-white-blue-8 dark:bg-transparent rounded-b-[14px]"
    >
      <div class="flex items-center cursor-pointer">
        <img
          src="../../assets/svgs/prev.svg"
          class="dark:hidden block"
          alt="Pagination"
        />
        <img
          src="../../assets/svgs/prev-white.svg"
          class="dark:block hidden"
          alt="Pagination"
        />
        <p
          class="text-secondary-70 dark:text-white lg:text-[15px] text-[14px]  font-normal leading-[100%] ml-[9px]"
        >
          Previous
        </p>
      </div>

      <ul class="flex">
        <li class="mx-1">
          <Button
            class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[100%] tracking-[-0.15px] rounded-md bg-light-white dark:bg-[#f5f7f80a] h-[31px] w-[26px]"
            >1</Button
          >
        </li>
        <li class="mx-1">
          <Button
            class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[100%] tracking-[-0.15px] rounded-md h-[31px] w-[26px]"
            >2</Button
          >
        </li>
        <li class="mx-1">
          <Button
            class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[100%] tracking-[-0.15px] rounded-md h-[31px] w-[26px]"
            >3</Button
          >
        </li>
      </ul>

      <div class="flex items-center cursor-pointer">
        <p
          class="text-secondary-70 dark:text-white lg:text-[15px] text-[14px]  font-normal leading-[100%] mr-[9px]"
        >
          Next
        </p>
        <img
          src="../../assets/svgs/prev.svg"
          class="dark:hidden block rotate-180"
          alt="Pagination"
        />
        <img
          src="../../assets/svgs/prev-white.svg"
          class="dark:block hidden rotate-180"
          alt="Pagination"
        />
      </div>
    </div>
</template>