<script setup>

</script>

<template>
    <div class="grid grid-cols-[5fr_1fr] w-full">
        <div>
            <slot></slot>
        </div>
        <div>
            <slot name="sidebar"></slot>
        </div>
    </div>
</template>
