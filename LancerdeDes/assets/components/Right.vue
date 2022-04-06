<template>
    <div class="gameInterface-c">
        <p> Joueur : {{  }} </p>
        <p> Nombre de lancer : {{  }} </p>
        <p> Score : <b id = "scoreJ2" > {{  }} </b> </p>
        <div> <img src = "media/diceRed.png" width="200" height="200"> </div>
        <button class="btn btn-dark"> Lancer </button>
    </div>

</template>

<script setup>

</script>

<style scoped>
.gameInterface-c {
    flex: 1;
    background-color: rgb(105, 105, 105, 0.5);
    border-radius: 40px;
    margin: 10px;
    padding: 5px;
}

</style>