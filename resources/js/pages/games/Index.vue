<script setup>
defineProps({
    games: []
})

</script>

<template> 
    <main class="h-screen w-screen flex justify-center items-center">
        <div class="container flex justify-evenly rounded-2xl" v-for="game in games">
            <a :href="`/game/${game.id}`">
                <div className="text-center font-bold p-3 tracking-wider rounded-md border-white border-2">
                    <div class="flex flex-col justify-center items-center gap-2">
                        <h1>NAME: {{game.name}}</h1>
                        <small>GENRE:  {{ game.genre }}</small>
                        <small>visibility:  {{ game.genre }}</small>
                    </div>
                </div>
            </a>
        </div>
    </main>
</template>



