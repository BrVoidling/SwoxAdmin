<script setup>
import { ref, onMounted, computed } from 'vue';
import draggable from 'vuedraggable';
import { useStore } from '../store';

defineProps({
    func: Function,
    type: String
});

const store = useStore();


</script>

<template>
    <div>
        <h3 class="text-2xl font-bold">Questions</h3>
        <ul class="flex flex-col mb-4 lg:mb-6">
            <draggable v-model="store.questionList" :group="{ name: 'questions', pull: 'clone', put: false }"  item-key="id" class="flex flex-col gap-1">
                <template #item="{ element }">
                    <li class="bg-white p-2 rounded shadow cursor-move">
                        {{ element.name }}
                    </li>
                </template>
            </draggable>

        </ul>
    </div>
</template>
