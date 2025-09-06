<script setup>
import { ref } from 'vue';
import { VueFlow } from '@vue-flow/core';

const props = defineProps({
    scenes: {
        type: Array,
        default: () => []
    }
});
console.log(props.scenes, "scenes")

const nodes = ref(props.scenes.map(scene => ({
    id: `${scene.id}`,
    label: "Name: " + scene.name,
    position: {x: scene.positionX, y: scene.positionY}
})))

const edges = [{
    id: "id1-2", source: "1", target: "2"
}]
</script>

<template>
    <div class="container bg-pink-300" v-for="scene in scenes">
        <div class="card">
            {{ scene.name }}
        </div>
    </div>
    {{  scenes }}
    <VueFlow 
    v-model:nodes="nodes"
    v-model:edges="edges" />
</template>