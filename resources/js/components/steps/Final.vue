<template>
    <div class="row p-4 mt-4">
        <div class="col-12 text-center pregunta bg-white shadow h-60">
           <Confetti />
           <h3 class="mt-5">Gracias por participar</h3>
           <span class="h3 mt-3 text-uppercase">{{nombre}}!!</span>

           <SuccessAnimation />

           <h5 class="text-success">
               {{total}} Respuestas Correctas
                <span v-if="total > 5">🥳</span>
                <span v-else>😐</span>
           </h5>
        </div>

        <div class="col-12 mt-4 hidden">
            <span>*Haz un screen y comparte en tus redes sociales con el hashtag #BODAVEROYOSVAL</span>
        </div>
    </div>
</template>

<script>
import Confetti from '../Confetti'
import SuccessAnimation from '../SuccessAnimation'

    export default {
        components: { Confetti, SuccessAnimation },
        props: ['nombre', 'total'],
    }
</script>

<style lang="scss" scoped>
    .h-60{height: 370px;}
    .hidden{animation:fadeOut 1s; animation-delay:5s; animation-fill-mode:forwards;}

    @keyframes fadeOut {
        from { opacity:1;}
        to {opacity:0;}
    }

</style>
