<template>
    <div>
        <header class="text-center">
            <img src="/images/portada.svg" height="150" alt="Vero y Osval">
        </header>

        <section class="bg-success">
            <div class="row p-4">
                <div class="col text-center">
                    <h1 class="text-white">GALERÍA DE FOTOS</h1>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <div class="row">
                <div class="gal">
	                <img
                        data-toggle="modal"
                        data-target="#modalImg"
                        loading="lazy"
                        v-for="foto in fotos"
                        :key="foto.id"
                        :src="foto.imagen"
                        :alt="`foto-${foto.id}`"
                        @click="verFoto(foto.imagen, foto.id)"
                    >
	            </div>
            </div>
        </section>

        <div class="modal fade" id="modalImg" tabindex="-1" aria-labelledby="modalImg" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img :src="fotoModal" class="img-fluid">
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <a  target="_blank"
                            :download="`foto-${fotoId}.jpg`"
                            :href="fotoModal"
                            class="btn btn-outline-success">
                            <img src="/images/icons/icon-download.svg" alt="icono download" height="15">
                            Descargar
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                fotos: [],
                fotoModal: '',
                fotoId: 0
            }
        },

        created () {
            this.fetch();
        },

        methods: {
            async fetch() {
                try{
                    let res = await axios.get('api/get-fotos');
                    this.fotos = await res.data;
                }catch(err){
                    console.error(err);
                }
            },

            verFoto(url, id){
                this.fotoModal = url;
                this.fotoId = id;
            }
        },
    }
</script>

<style lang="scss" scoped>
    header{
        height: 13rem;
        padding: 25px 0;
        background-image: url("../../images/portada.webp");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #fff;
    }

    .gal {
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 3;
	}
	.gal img{ width: 100%; padding: 7px 0; cursor: pointer; }

@media (max-width: 500px) {
	.gal {
	    -webkit-column-count: 1; /* Chrome, Safari, Opera */
        -moz-column-count: 1; /* Firefox */
        column-count: 1;
	}
    h1{font-size: 25px;}

}
</style>
