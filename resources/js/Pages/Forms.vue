<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute } from 'vue-router';
import { useStore } from '../store';
import FormList from '../Components/Forms/FormList.vue';
import Layout from '../Components/Layout.vue';

const store = useStore();

const newForm = {
    id: null,
    name: 'Nieuw formulier',
    internal_name: 'Nieuw formulier',
    description: '',
    is_object: false,
    hoofdform_id: null
}
const selectedFormId = ref(null);

const selectedForm = ref(newForm);

function selectForm(formId) {
    selectedFormId.value = formId;

    if (formId == null) {
        selectedForm.value = newForm;
    } else {
        selectedForm.value = store.forms[formId];
    }
}

async function submit() {
    console.log(selectedForm.value);
    var res = await submitForm(selectedForm.value);
    console.log(res);
    if (res.status != 200) {
        alert('niet opgeslagen');
        return;
    }
    if (selectedFormId.value == null) {

        store.addForm(selectedForm.value);
    }
}

async function submitForm(form) {
    const response = await axios.post('/formmaker/form', form);
    return response;
}

</script>

<template>
    <Layout>

        <h3 class="text-2xl font-bold">Form</h3>
        <form @submit.prevent="submit" class="flex flex-col gap-4">
            <label for="name">Naam</label>
            <input type="text" id="name" v-model="selectedForm.name" class="border p-2">
            <label for="internal_name">Interne naam</label>
            <input type="text" id="internal_name" v-model="selectedForm.internal_name" class="border p-2">
            <label for="description">Omschrijving</label>
            <input type="text" id="description" v-model="selectedForm.description" class="border p-2">
            <div class="flex items-center">
                <input type="checkbox" id="is_object" v-model="selectedForm.is_object" class="mr-2">
                <label for="is_object">Is object</label>
            </div>
            <label for="hoofdform_id">Hoofdformulier</label>
            <select id="hoofdform_id" v-model="selectedForm.hoofdform_id" class="border p-2">
                <option value="null">Geen hoofdformulier</option>
                <option v-for="form in store.objectForms(selectedFormId)" :key="form.id" :value="form.id">{{ form.name }}</option>
            </select>
            <button type="submit" class="bg-blue-500 p-2 rounded">Opslaan</button>
        </form>
        <a v-if="selectedFormId != null" :href="`/formmaker/form-rows/${selectedFormId}`" class="bg-blue-500 p-2 rounded">Form Builder</a>
        {{ selectedForm }}
        <template #sidebar>
            <FormList :list="store.forms" :func="selectForm" type="Formulier"></FormList>
        </template>
    </Layout>
</template>
