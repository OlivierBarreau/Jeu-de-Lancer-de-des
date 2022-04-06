<template>
    <div class="gameInterface-a">
        <div>
            <p> Joueur : {{  }} </p>
            <p> Nombre de lancer : {{  }} </p>
            <p> Score : <b id = "scoreJ1" > {{  }} </b> </p>

        </div>

        <div> <img src ='media/diceRed.png' width="200" height="200"> </div>

        <button class="btn btn-dark" @click="lancerJoueur1"> Lancer  </button>
    </div>
</template>

<script setup>

function lancerJoueur1(){
    console.log('Lancer joueur 1');
}

</script>

<style scoped>
.gameInterface-a {
    flex: 1;
    justify-content: center;
    background-color: rgb(105, 105, 105, 0.5);
    border-radius: 40px;
    margin: 10px;
    padding: 5px;
}
</style>