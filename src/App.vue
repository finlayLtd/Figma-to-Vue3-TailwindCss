<script setup>
import {computed , watch, onMounted} from 'vue'
import { store } from "./stores";
import {RouterView } from "vue-router";

const isDarkTheme = computed(() => store.getters['theme/getTheme'])
const darkTheme = () => {
let body = document.getElementsByTagName('body')[0]

if(isDarkTheme.value)
body.classList.add('dark')
else 
body.classList.remove('dark')
}

onMounted(() => darkTheme())

watch(isDarkTheme , () => darkTheme())
</script>

<template>
  <section>
    <RouterView />
  </section>
</template>
