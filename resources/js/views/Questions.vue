<template>
    <div class="fondo">
        <nav class="navbar navbar-light bg-success d-flex justify-content-center">
            <img class="invert navbar-brand" src="/images/logo.svg" height="50" alt="">
        </nav>

        <div class="container-fluid">
            <Portada
                :name.sync="nombre"
                :step.sync="step"
                v-if="step === 'PORTADA'" />

            <Preguntas
                :nombre="nombre"
                :step.sync="step"
                :total.sync="total"
                v-if="step === 'PREGUNTAS'" />

            <Final
                :nombre="nombre"
                :total="total"
                v-if="step === 'FINALIZADO'" />
        </div>
    </div>
</template>

<script>
    import Portada from '../components/steps/Portada';
    import Preguntas from '../components/steps/Preguntas';
    import Final from '../components/steps/Final';


    export default {
        components: { Portada, Preguntas, Final },

        data() {
            return {
                nombre: '',
                total: 0,
                step: 'PORTADA'
            }
        },
    }
</script>



<style lang="scss" scoped>
    .fondo{
        min-height: 100vh;
        width: 100%;
        background-image: url("../../images/portada.webp");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #fff;
        background-attachment: fixed;
	    position: relative;
        &:before{
            content:'';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(255,255,255,0.8);
        }
    }
</style>


//TODO: crear controladores
//TODO: guardar respuestas en la BD
//TODO: mostrar pantalla terminada: cantidad respuestas correctas
