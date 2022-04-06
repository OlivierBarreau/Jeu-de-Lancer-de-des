<template>
    <div class="gameInterface-b">
        <div>
            <p> Premier dé : <b id="resultDe1"> {{  }} </b> </p>
            <p> Deuxième dé : <b id="resultDe2"> {{  }} </b> </p>
        </div>

        <div id="animation">
            <div>
                <div id ="Gde1"><img src = "media/diceOne.png"  width="100" height="100"></div>
                <div id ="Gde2"><img src = "media/diceTwo.png"  width="100" height="100"></div>
                <div id ="Gde3"><img src = "media/diceThree.png" width="100" height="100"></div>
                <div id ="Gde4"><img src = "media/diceFour.png" width="100" height="100"></div>
                <div id ="Gde5"><img src = "media/diceFive.png" width="100" height="100"></div>
                <div id ="Gde6"><img src = "media/diceSix.png" width="100" height="100"></div>
            </div>

            <div>
                <div id ="Dde1"><img src = "media/diceOne.png" width="100" height="100"></div>
                <div id ="Dde2"><img src = "media/diceTwo.png"  width="100" height="100"></div>
                <div id ="Dde3"><img src = "media/diceThree.png" width="100" height="100"></div>
                <div id ="Dde4"><img src = "media/diceFour.png" width="100" height="100"></div>
                <div id ="Dde5"><img src = "media/diceFive.png" width="100" height="100"></div>
                <div id ="Dde6"><img src = "media/diceSix.png" width="100" height="100"></div>
            </div>
        </div>

    </div>
</template>
<script setup>

</script>

<style scoped>
.gameInterface-b {
    display: flex;
    flex-direction: column;
    flex: 2;
    background-color: rgb(105, 105, 105, 0.5);
    padding: 5px;
    justify-content: space-evenly;
}
.gameInterface-b> :first-of-type {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

#animation {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 70%;
    background-color: white;
    justify-content: space-around;
    align-items: center;
}

#animation div div {
    display: none;
}
</style>