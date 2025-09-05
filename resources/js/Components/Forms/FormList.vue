<script setup>

defineProps({
    forms: Object,
});
</script>

<template>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">ID</th>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Created at</th>
                                <th scope="col" class="px-6 py-4">Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="form in forms" :key="form.id" class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ form.id }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ form.name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ form.created_at }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ form.updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
