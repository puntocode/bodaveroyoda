<template>
    <div>
        <Navbar />

        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                     <h2 class="font-bold mb-4">Cargar Fotos</h2>
                </div>

                <div class="col-12">
                    <vue-dropzone
                        ref="myVueDropzone"
                        id="dropzone"
                        v-on:vdropzone-success="uploadSuccess"
                        :options="dropzoneOptions">
                    </vue-dropzone>

                    <h3 class="mt-5"> Fotos Cargadas</h3>
                    <hr>

                    <div class="pin_container">
                        <figure v-for="foto in fotos" :key="foto.id">
                            <img :src="foto.imagen" alt="A windmill" />
                            <figcaption>
                                <img class="icono" src="/images/icons/icon-trash.svg" alt="icono del" @click="delFoto(foto.id)">
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-3 card-columns">
                    <div class="card" v-for="foto in fotos" :key="foto.id">
                        <img class="card-img-top" :src="foto.imagen" alt="Card image cap">
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</template>

<script>
    import Navbar from '../components/Navbar'
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: { Navbar, vueDropzone: vue2Dropzone },
        data() {
            return {
                fotos: [],
                dropzoneOptions: {
                    url: '/api/cargar-fotos',
                    dictDefaultMessage: 'Click o arrastra los documentos para subirlos',
                    thumbnailWidth: 150,
                    maxFilesize: 20,
                    headers: { }
                }
            }
        },

        created () {
            this.fetch();
        },

        methods: {
            async fetch() {
                let res = await axios.get('api/get-fotos');
                this.fotos = await res.data;
            },

            uploadSuccess(file, response){
                console.log(response);
                this.fotos.push(response);
            },

            delFoto(id) {
                 this.$swal.fire({
                    title: 'Eliminar',
                    text: 'Desea eliminar esta foto?',
                    icon: 'error',
                    confirmButtonText: 'Si',
                    confirmButtonColor: '#FF3F5B',
                    cancelButtonText: 'Cancelar',
                    showCancelButton: true,
                })
                .then( result => {
                    if(result.isConfirmed){

                        axios.delete(`/api/del-fotos/${id}`)
                            .then(response => {
                                if(response.status === 200) {
                                    this.$swal.fire('Eliminado', 'Eliminado correctamente', 'success');
                                    const index = this.fotos.findIndex( foto => foto.id === id);
                                    this.fotos.splice(index, 1);
                                }
                            }).catch( error => this.$swal.fire('Error', 'Error no se pudo eliminar!', 'error'));
                    }
                });
            },


        },
    }
</script>

<style lang="scss" scoped>
    #dropzone{border-style:dashed;border-color:#009BDD;}

    .pin_container {column-count: 4; column-gap: 10px;
        figure {
            margin: 0;
            display: grid;
            grid-template-rows: 1fr auto;
            margin-bottom: 10px;
            break-inside: avoid;
            img {
                max-width: 100%;
                display: block;
            }
            figcaption {
                grid-row: 2;
                grid-column: 1;
                background-color: rgba(255,255,255,.5);
                padding: .2em .5em;
                justify-self: start;
                .icono{cursor: pointer; height: 18px;}
            }
        }

        figure > img {
            grid-row: 1 / -1;
            grid-column: 1;
        }
        // figure a {
        //     color: black;
        //     text-decoration: none;
        // }
    }


</style>
