<template>
    <div class="bg-modal">
        <div class="modal-content">
            
            <!--Image par <a href="https://pixabay.com/fr/users/maklay62-182851/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1432947">S K</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1432947">Pixabay</a>
            Image par <a href="https://pixabay.com/fr/users/mahimzq-17744299/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=5465779">Mahim Rahman</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=5465779">Pixabay</a>-->
            <div> <img src= "media/gameOver.png" alt="Image game over" width="30%"> </div>
            <p> La partie est terminée </p>
            
            <div class="resultatPartie">
                <p> <b> {{  }} </b> vous avez gagné </p>
                <p> <b> {{  }} </b> vous avez perdu </p>
            </div>
                
            <div class='form'>

                <form>                    
                    <div class="form-group">
                        <button class="btn btn-primary"> Valider </button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>

</template>

<script setup>
import { computed, ref } from "vue";

const score = ref(0);
// const props = defineProps({
//   data: {
//     type: [],
//   }
// })
const display = computed(( )=> score.value > 9 ? 'flex' : 'none');

</script>
    
<style scoped>
.bg-modal {
    display: v-bind(display);
    width: 100%;
    height: 100%;
    background-color: rgb(0, 0, 0, 0.7);
    position: absolute;
    top: 0;
    justify-content: center;
    align-items: center;
}

.modal-content {
    display: flex;
    width: 500px;
    height: 350px;
    background-color: white;
    border-radius: 5px;
    justify-content: right;
    text-align: center;
    padding: 10px;
}

.resultatPartie {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 10px;
}

.formRow {
    display: flex;
    flex-direction: row;
    justify-content: center;
    justify-items: center;
    margin: 15px;
}

</style>