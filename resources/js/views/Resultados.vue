<template>
    <div>
        <Navbar />

        <div class="container my-5">
            <div class="row">

                <div class="col-md-4 my-4">
                    <div class="card bg-success">
                        <div class="card-body text-white">
                            <h2>Ganador 🥳</h2>
                            <h3 class="text-capitalize">{{ ganador }}</h3>
                            <p class="h5">con {{ total }} Respuestas Correctas</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                     <h2 class="font-bold mb-4">Tabla de resultados del Juego</h2>
                    <table class="table table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th>Nombre</th>
                                <th>Total Respuestas Correctas</th>
                                <th>Fecha y Hora</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(respuesta, index) in respuestas" :key="index">
                                <th v-text="index+1"></th>
                                <th v-text="respuesta.nombre"></th>
                                <th v-text="respuesta.total"></th>
                                <th v-text="respuesta.created_at"></th>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Navbar from '../components/Navbar'

    export default {
        components: { Navbar },
        data() {
            return {
                respuestas: [],
                ganador: '',
                total: 0
            }
        },

        created () {
            this.fetch();
        },

        methods: {
            async fetch() {
                let res = await axios.get('api/respuestas/resultados');
                this.respuestas = await res.data;

                if(this.respuestas.length){
                    this.ganador = this.respuestas[0].nombre;
                    this.total = this.respuestas[0].total;
                }
            }
        },
    }
</script>
