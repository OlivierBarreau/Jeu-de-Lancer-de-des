<template>
    <div class="body-content">
        <h2> Dice game </h2>
        <p> Lancer les deux dés à tour de rôle. C'est à vous de jouer : <b> {{ tour }} </b> </p>
    
        <div class="gameInterface">
            <Left/>
            <Board/>
            <Right/>
            <Formulaire/>
        </div>
    </div>
</template>

<script setup>
    import {ref} from 'vue';
    import axios from 'axios';
    import { onMounted } from 'vue';
    import Left from '../components/Left.vue'
    import Board from '../components/Board.vue'
    import Right from '../components/Right.vue'
    import Formulaire from '../components/Formulaire.vue';

    const count = ref(0);
    const tour = ref('Nassem');
    const info = ref([]);
    
    // onMounted(async () => {
    // await axios
    //     .get('/game/lancerJoueur1')
    //     .then(response => {
    //         this.info = response.data;
    //     })
    // });

    function increment() {
        count.value++;
    }
</script>

<style scoped>
    .body-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        color: black;
    }
    .gameInterface {
        display: flex;
        flex-direction: row;
    }
</style>

