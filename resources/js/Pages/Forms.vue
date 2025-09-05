<script setup>
import { ref, onMounted } from 'vue';
import { useStore } from '../store';
import FormList from '../Components/Forms/FormList.vue';

const store = useStore();
defineProps({
    forms: Object,
});

onMounted(() => {
    store.fetchForms();
});


</script>

<template>

<h1>Forms</h1>
    <FormList :forms="store.forms" />
</template>
