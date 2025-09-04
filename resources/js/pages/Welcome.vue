<script setup>
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'

import SpecialEdge from '@/components/my/SpecialEdge.vue';
import SpecialNode from '@/components/my/SpecialNode.vue';
const dark = ref(false);

const nodes = ref([
  { id: '1', label: 'Scene 1', position: { x: 100, y: 200 } },
  { id: '2', label: 'Scene 2', position: { x: 300, y: 100 } },
])

const edges = ref([
  { id: 'e1-2', source: '1', target: '2' }
])
</script>

<template class="bg-white/300">
  <VueFlow
    class="bg-white text-blue-900 border h-screen"
    v-model:nodes="nodes"
    v-model:edges="edges"
    :fit-view="true"
  />
</template>
