<template>
    <div class="wrapper mt-3">
        <div class="item" v-for="(foto, index) in items" :key="index">
            <a @click="cargarFoto(index)" data-toggle="modal" data-target="#modal-foto"><img :src="foto" :alt="`foto-${index}`" class="album"></a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-foto" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img :src="index" class="img-fluid" alt="foto-modal">
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
                items: [
                    '../images/nosotros/nosotros-1.jpg',
                    '../images/nosotros/nosotros-2.jpg',
                    '../images/nosotros/nosotros-3.jpg',
                    '../images/nosotros/nosotros-4.jpg',
                    '../images/nosotros/nosotros-5.jpg',
                    '../images/nosotros/nosotros-6.jpg',
                    '../images/nosotros/nosotros-7.jpg',
                    '../images/nosotros/nosotros-8.jpg',
                    '../images/nosotros/nosotros-9.jpg',
                    '../images/nosotros/nosotros-10.jpg',
                ],
                index: '../images/nosotros/nosotros-1.jpg'
            }
        },
        methods: {
            cargarFoto(index) {
                this.index = this.items[index];
            }
        },
    }
</script>

<style lang="scss" scoped>
    .wrapper{max-height: 310px; display: flex; overflow-x: auto; overflow-y:hidden;
        .item{min-width: 200px; height: 300px; text-align: center; background-color: #ddd; margin-right: 10px;}
        .album{width: 200px;}
    }

    @media (max-width: 768px) { .wrapper::-webkit-scrollbar{width: 0;} }

</style>
