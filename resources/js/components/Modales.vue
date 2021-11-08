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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body mb-4">
                        <form action="" class="text-center">
                            <div class="form-group text-left">
                                <label for="">Agrega tu lista de canciones</label>
                                <textarea name="" class="form-control" rows="10"></textarea>
                            </div>

                            <button class="btn btn-success px-4">Enviar</button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body mb-4">
                        <form action="" class="text-center">
                            <div class="form-group text-left">
                                <label for="">Código de Invitado</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group text-left">
                                <label class="d-block">Asistiré</label>
                                <label class="switchBtn">
                                    <input v-model="asistencia.asistencia" type="checkbox">
                                    <div class="slide round">{{ scopeText }}</div>
                                </label>
                            </div>

                            <div class="form-group text-left">
                                <label for="">Algún mensaje para los Novios?</label>
                                <textarea name="" class="form-control" rows="4"></textarea>
                            </div>

                            <button class="btn btn-success px-4">Confirmar</button>
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
            asistencia: {codigo: '', asistencia: 'NO', mensaje: ''}
        }
    },

    computed: {
        scopeText() {
            return this.asistencia.asistencia ? 'SI' : 'NO'
        },
    },
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



