<script setup>

defineProps({
    list: Object,
    func: Function,
    type: String
});
</script>

<template>
    <div>
        <h3 class="text-2xl font-bold">{{ type }}</h3>
        <ul class="flex flex-col mb-4 lg:mb-6">
            <li>
                <a @click="func(null)" class="listItem">Nieuw {{ type }}</a>
            </li>
            <li v-for="item in list" :key="item.id">
                <a @click="func(item.id)" class="listItem">{{ item.name }}</a>
            </li>
        </ul>
    </div>
</template>
<style>
.listItem {

}
</style>
