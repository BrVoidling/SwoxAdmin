<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute } from 'vue-router';
import { useStore } from '../store';
import Layout from '../Components/Layout.vue';
import QuestionList from '../Components/QuestionList.vue';
import draggable from 'vuedraggable';

const store = useStore();

const questionList = ref([]);
const selectedFormId = useRoute().params.id;

const selectedForm = computed(() => {
    return store.forms[selectedFormId];
});

const formRows = ref({});

onMounted(() => {
    formRows.value = store.formFormRows(selectedFormId);
});

</script>

<template>
    <Layout>
        <h3 class="text-2xl font-bold">Formulier rijen</h3>
        <draggable v-model="questionList" :group="{ name: 'questions', pull: false, put: true }" item-key="id" class="flex flex-col gap-1">
            <template #item="{ element }">
                <li class="bg-white p-2 rounded shadow cursor-move">
                    {{ element.name }}
                </li>
            </template>
        </draggable>
        {{questionList}}
        {{formRows}}
        <template #sidebar>
            <QuestionList></QuestionList>
        </template>
    </Layout>
</template>
