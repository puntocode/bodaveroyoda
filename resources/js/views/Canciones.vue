<template>
    <div>
        <Navbar />

        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                     <h2 class="font-bold mb-4">Canciones sugeridas</h2>
                </div>

                <div class="col-12">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Canciones sugeridas</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="cancion in canciones" :key="cancion.id">
                                <th v-text="cancion.nombre"></th>
                                <th v-text="cancion.canciones"></th>
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
                canciones: []
            }
        },

        created () {
            this.fetch();
        },

        methods: {
            async fetch() {
                let res = await axios.get('api/get-canciones');
                this.canciones = await res.data;
            }
        },
    }
</script>
