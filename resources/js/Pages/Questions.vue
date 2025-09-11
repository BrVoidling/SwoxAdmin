<script setup>
import { ref } from 'vue';
import { useStore } from '../store';
import Layout from '../Components/Layout.vue';
import FormList from '../Components/Forms/FormList.vue';

const store = useStore();

const newQuestion = {
    id: null,
    name: 'Nieuwe vraag',
    internal_name: 'Nieuwe vraag',
    description: '',
    type: 'openvraag',
    options: null
}
const selectedQuestionId = ref(null);

const selectedQuestion = ref(newQuestion);

function selectQuestion(questionId) {
    selectedQuestionId.value = questionId;

    if (questionId == null) {
        selectedQuestion.value = newQuestion;
    } else {
        selectedQuestion.value = store.questions[questionId];
    }
}

async function submit() {
    var res = await submitQuestion(selectedQuestion.value);
    console.log(res);
    if (res.status != 200) {
        alert('niet opgeslagen');
        return;
    }
    if (selectedQuestionId.value == null) {

        store.addQuestion(selectedQuestion.value);
    }
}

async function submitQuestion(question) {
    const response = await axios.post('/formmaker/question', question);
    return response;
}
</script>

<template>
    <Layout>
        <h3 class="text-2xl font-bold">Vragen</h3>

        <form @submit.prevent="submit" class="flex flex-col gap-4">
            <label for="name">Naam</label>
            <input type="text" id="name" v-model="selectedQuestion.name" class="border p-2">
            <label for="internal_name">Interne naam</label>
            <input type="text" id="internal_name" v-model="selectedQuestion.internal_name" class="border p-2">
            <label for="description">Omschrijving</label>
            <input type="text" id="description" v-model="selectedQuestion.description" class="border p-2">
            <label for="type">Type</label>
            <input type="text" id="type" v-model="selectedQuestion.type" class="border p-2">
            <button type="submit" class="bg-blue-500 p-2 rounded">Opslaan</button>
        </form>
        {{ selectedQuestion }}
        <template #sidebar>
            <FormList :list="store.questions" :func="selectQuestion" type="Vraag"></FormList>
        </template>
    </Layout>
</template>
