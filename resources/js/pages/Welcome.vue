<script setup>
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'

const nodes = ref([
  { id: '1', label: 'Scene 1', position: { x: 100, y: 200 } },
  { id: '2', label: 'Scene 2', position: { x: 300, y: 100 } },
])

const edges = ref([
  { id: 'e1-2', source: '1', target: '2' }
])
</script>

<template>
  <VueFlow
    v-model:nodes="nodes"
    v-model:edges="edges"
    :fit-view="true"
    class="h-screen"
  />
</template>
