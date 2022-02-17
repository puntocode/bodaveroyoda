<template>
    <div class="row p-4 mt-4">
        <div class="col-12 text-center pregunta bg-white shadow pt-3">
            <span class="text-succes">{{ pregunta + 1 }} / {{ preguntas.length }}</span>
            <h3 class="mt-4" v-text="preguntas[pregunta].pregunta"></h3>
        </div>

        <div class="col-12 mt-4">
            <div class="respuesta d-flex">
                <input type="radio" id="vero" value="VERO" v-model="respuesta">
                <label class="mr-2" for="vero">
                    <img src="/images/juego/vero-icon.png" height="60" alt="">
                    <span>Vero</span>
                </label>

                <input type="radio" id="osval" value="OSVAL" v-model="respuesta">
                <label class="ml-2" for="osval">
                    <img src="/images/juego/osval-icon.png" height="60" alt="">
                    <span>Osval</span>
                </label>
            </div>

            <button class="btn btn-success btn-block mt-4" @click="siguiente" :disabled="respuesta == ''">{{textoBtn}}</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['nombre'],
        data() {
            return {
                correctas: [],
                pregunta: 0,
                preguntas: [{pregunta: ''}],
                respuesta: '',
                respuestas: [],
            }
        },


        created () {
            this.fetch();
        },

        methods: {
            async fetch(){
                try{
                    const res = await axios.get('api/preguntas');
                    this.preguntas = await res.data;
                }catch(err){
                    console.error(err);
                }
            },

            siguiente() {
                const indice = this.pregunta;
                this.respuestas.push(this.respuesta);

                if(this.preguntas[indice].correcta === this.respuesta) this.correctas.push(indice+1);

                this.respuesta = '';

                if(this.textoBtn == 'Finalizar') this.submit();
                else this.pregunta++;
            },

            async submit(){
                try{
                    let data = {
                        nombre: this.nombre,
                        respuestas: this.respuestas,
                        correctas: this.correctas,
                        total: this.correctas.length
                    }

                    const res = await axios.post('api/respuestas/store', data);

                    this.$emit('update:step', 'FINALIZADO');
                    this.$emit('update:total', this.correctas.length);
                }catch(err){
                    console.error(err);
                    this.$swal('Error', `El jugador ${this.nombre} ya participó. Prueba con otro nombre`, 'error')
                        .then(ok => location.reload())
                    // location.reload();
                }
            }

        },

        computed: {
            textoBtn() {
                return (this.pregunta + 1) === this.preguntas.length ? 'Finalizar' : 'Siguiente';
            }
        },

    }
</script>


<style lang="scss" scoped>
    .pregunta{height: 200px;}
    .btn{border-radius: 5px;}
    .respuesta{
        input[type="radio"]{-webkit-appearance: none;
            &:checked + label{
                background-color: #5A7A62; box-shadow: 0 10px 45px rgba(24, 249, 141, 0.2);
                span{color: #fff}
            }
        }
        label{ height: 120px; width: 100%; border: 2px solid #5A7A62; position: relative; border-radius: 10px; transition: 0.5s;
            img{position: absolute;  left: 50%; transform: translate(-50%, 30%);}
            span{color: #5A7A62; font-size: 25px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, 50%); font-weight: 500;}
        }
    }
</style>
