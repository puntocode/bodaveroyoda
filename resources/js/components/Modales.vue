<template>
    <div>
        <!-- Modal Regalo-->
        <div class="modal fade" id="modal-regalo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                    </div> -->
                    <div class="modal-body text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img class="mt-4" src="/images/logo-atlas.svg" alt="logo de banco atlas" height="50">
                        <h3 class="text-success mt-3">Datos Bancarios</h3>
                        <p class="m-0">Cta Cte: 1067534</p>
                        <p class="m-0">Nombre: Verónica Ayala</p>
                        <p class="mb-4">C.I.: 2.940.868</p>
                        <p class="mb-2">O también hacernos un regalo de nuestra </p>
                        <h3 class="text-success d-block">Lista de Boda</h3>
                        <a href="https://www.nuevaamericana.com.py/listaregalos/19212" target="_blank">
                            <img src="/images/logo-na.svg" alt="logo nueva americana" height="35" class="mb-4">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Regalo-->
        <div class="modal fade" id="modal-canciones" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><img src="/images/icons/icon-cancion.svg" alt="icono de canciones" height="40"> Sugerí tus canciones</h3>
                        <button id="cerrar-cancion" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body mb-4">
                        <form @submit.prevent="sugerirCancion" class="text-center">
                            <div class="form-group text-left">
                                <label>Nombre</label>
                                <input v-model="cancion.nombre" class="form-control">
                            </div>

                            <div class="form-group text-left">
                                <label>Agrega tu lista de canciones</label>
                                <textarea v-model="cancion.canciones" class="form-control" rows="8"></textarea>
                            </div>

                            <button class="btn btn-success px-4" :disabled="cancionDisable">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Asistencia -->
        <div class="modal fade" id="modal-asistencia" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Confirmá tu asistencia</h3>
                        <button id="cerrar-asistencia" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body mb-4">
                        <form @submit.prevent="confirmarAsistencia" class="text-center">

                            <div class="form-group text-left">
                                <label>Código de Invitado</label>
                                <input class="form-control text-uppercase" v-model="asistencia.codigo">
                                <small class="text-danger" v-if="error">Por favor ingresa un codigo válido</small>
                                <small class="text-danger" v-if="utilizado">Este código ya ha sido utilizado.</small>
                            </div>


                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group text-left">
                                        <label>Invitado/a</label>
                                        <input class="form-control" v-model="asistencia.invitado" disabled>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group text-left">
                                        <label class="d-block">Cantidad</label>
                                        <input class="form-control" v-model="asistencia.cantidad" disabled>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group text-left" v-if="asistencia.asistencia !== 'CANCELADA'">
                                <label class="d-block" v-text="utilizado ? 'Queres cancelar tu invitación?' : 'Asistiré'"></label>

                                <label class="switchBtn" v-if="asistencia.asistencia === 'SIN RESPONDER'">
                                    <input v-model="asistencia.confirmar" type="checkbox" :disabled="disableAsistencia">
                                    <div class="slide round">{{ scopeText }}</div>
                                </label>

                                <label class="switchBtn" v-else>
                                    <input v-model="asistencia.cancelar" type="checkbox" :disabled="disableAsistencia">
                                    <div class="slide round">{{ textCancelar }}</div>
                                </label>
                            </div>



                            <div class="form-group text-left" v-if="asistencia.asistencia !== 'CANCELADA'">
                                <label v-text="utilizado ? 'Por qué deseas cancelar la invitación?' : 'Algún mensaje para los Novios?'"></label>
                                <textarea v-model="asistencia.mensaje" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="form-group" v-if="asistencia.asistencia == 'CANCELADA'">
                                <label class="text-danger">Tu asistencia ha sido cancelada. Comunicate con Vero para poder cambiar!</label>
                            </div>

                            <button class="btn btn-success px-4" :disabled="this.asistencia.id === 0">Confirmar</button>
                        </form>
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
            error: false,
            asistencia: {id: 0, codigo: '', cantidad: '', asistencia: 'SIN RESPONDER', mensaje: '', invitado: '', confirmar: 'NO' },
            cancion: {nombre: '', canciones: ''}
        }
    },

    computed: {
        scopeText() {
            return this.asistencia.confirmar ? 'SI' : 'NO'
        },

        textCancelar() {
            return this.asistencia.cancelar ? 'SI' : 'NO'
        },

        cancionDisable(){
            return this.cancion.canciones.trim() === '' || this.cancion.nombre.trim() === '';
        },

        disableAsistencia(){
            return this.asistencia.invitado.trim() === '';
        },

        utilizado(){
            return this.asistencia.asistencia !== 'SIN RESPONDER';
        }
    },


    methods: {
        errorAsistencia(){
            this.asistencia.id = 0;
            this.asistencia.invitado = '';
            this.asistencia.cantidad = '';
            this.asistencia.mensaje = '';
            this.asistencia.asistencia = 'SIN RESPONDER';
            this.error = true;
        },

        sugerirCancion() {
            axios.post('api/canciones', this.cancion)
                .then(response => {
                    if(response.status === 200) {
                        this.alertSuccess('Muchas Gracias!', 'Agregaremos estás canciones a nuestro playlist :)', 'cerrar-cancion');
                        this.cancion.canciones = '';
                        this.cancion.nombre = '';
                    }
                });
        },

        confirmarAsistencia(){
            let options = {
                title: 'Confirmar Asistencia',
                // text: 'Estas seguro que respondiste correctamente?. Si surge un imprevisto y deseas cancelar tu asistencia, lo puedes hacer utilizando el mismo Código',
                text: 'Estas seguro que respondiste correctamente?.',
                icon: 'info',
                confirmButtonColor: "#5A7A62",
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
            }

            this.$swal(options)
                .then(result => {
                    if (result.isConfirmed) this.enviarAsistencia();
                })
        },

        enviarAsistencia(){
            axios.post('api/confirmar-asistencia', this.asistencia)
                .then(response => {
                    if(response.status === 200) {
                        this.alertSuccess('Muchas Gracias!', 'Su asistencia ha sido confirmada', 'cerrar-asistencia');
                        this.errorAsistencia();
                        this.asistencia.codigo = '';
                        this.error = false;
                    }
                });
        },

        alertSuccess(titulo, texto, idModal){
            let options = {
                title: titulo,
                text: texto,
                icon: "success",
                confirmButtonColor: "#5A7A62",
            };

            this.$swal(options)
                .then(response => document.getElementById(idModal).click());

        }
    },

    watch: {
            'asistencia.codigo': function(){
                axios.post('api/buscar-invitado',this.asistencia)
                    .then(response =>{
                        if(response.status === 200){
                            this.asistencia = response.data;
                            this.error = false;
                        }
                        else this.errorAsistencia();
                    })
                    .catch(error => this.errorAsistencia());
            },
        }
};
</script>

<style>
.switchBtn {
    position: relative;
    display: inline-block;
    width: 65px;
    height: 34px;
}
.switchBtn input {display:none;}
.slide {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    padding: 8px;
    color: #fff;
}
.slide:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 34px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}
input:checked + .slide {
    background-color: #8CE196;
    padding-left: 40px;
}
input:focus + .slide {
    box-shadow: 0 0 1px #01aeed;
}
input:checked + .slide:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    left: -20px;
}
.slide.round {
    border-radius: 34px;
}
.slide.round:before {
    border-radius: 50%;
}

</style>



