<script setup>
import { RouterView } from 'vue-router';
import { useStore } from './store';
import { onMounted } from 'vue';

const store = useStore();

onMounted(() => {
    store.fetchForms();
    store.fetchFormRows();
    store.fetchQuestions();
});
</script>

<template>
    <header class="w-full bg-[#FDFDFC] h-[84px] text-sm mb-6 p-2 pb-0 flex items-center justify-between border-b-[2px] border-[#000000]">
        <div class="flex items-center justify-center transition-opacity opacity-100 duration-750 starting:opacity-0">
            <h1 class="text-2xl font-bold">Form Builder</h1>
        </div>
        <nav class="flex items-center self-end">
            <a href="/questionmaker/forms" class="navItem">Forms</a>
            <a href="/questionmaker/form-rows" class="navItem">Form Rows</a>
            <a href="/questionmaker/questions" class="navItem">Questions</a>
        </nav>
        <div class="flex items-center justify-end gap-4">
            <h2>CARD Solutions</h2>
        </div>
    </header>
    <router-view></router-view>
</template>
<style>
.navItem{
    padding: 10px 10px 0px 10px;
    vertical-align: bottom;
    font-weight: 400;
    color: #414141;
    font-size: 25px;
    text-align: center;
    border: 1px solid #000;
    border-bottom: 1px solid #000;
    border-radius: 20px 20px 0 0;
    -webkit-box-sizing: content-box,;
    box-sizing: content-box,;
    text-decoration: none;
    margin-bottom: -1px;
}
</style>
