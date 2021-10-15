<template>
    <div>
        <header id="cabecera">
            <img src="/images/portada.svg" alt="Vero y Osval">
        </header>

        <section class="bg-success">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h3>Faltan</h3>
                        <Contador :year="2022" :month="2" :day="14" :hour="19" :minute="30" />
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-5">
                <div class="row text-center py-5">
                    <div class="col-12">
                        <img src="/images/icons/icon-anillos.svg" alt="icono de iglesia" width="100">
                        <h2>Ceremonia y Fiesta</h2>
                        <p>La ceremonia se realizará el 15 de Enero a las 19:00 horas en Dir: xxxxxx N° 00 (San Bernardino), continuando con la fiesta.</p>
                        <a href="" class="btn btn-success px-4">LLEGAR A LA CEREMONIA</a>
                        <small class="d-block mt-3 text-secondary">Tocá el botón de abajo para recibir las indicaciones para llegar.</small>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center my-4">
                        <h2 class="text-success">CONFIRMAR ASISTENCIA</h2>
                        <p>Esperamos que sas parte de esta gran celebración. ¡Confirmanos tu asistencia!</p>
                        <a href="" class="btn btn-success px-4">CONFIRMAR ASISTENCIA</a>
                        <h4 class="mt-4 text-success">Dress Code: <span>Elegante</span></h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-success">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/images/icons/icon-regalo.svg" alt="icono de regalo" width="60">
                        <p class="text-white mt-4">Si deseas hacernos un regalo..</p>
                        <a href="" class="btn btn-white text-success px-4 font-weight-bold">VER MÁS</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="fiesta">
            <div class="container py-5">
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <h2 class="text-success">¿QUÉ CANCIONES NO PUEDEN FALTAR?</h2>
                        <p>Ayudanos sugiriendo que canciones no pueden faltar en la fiesta.</p>
                        <a href="" class="btn btn-success">Sugerir Canción</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/images/icons/icon-instagram.svg" alt="icono de regalo" width="58">
                        <h2 class="mt-4">#BODAVEROYODA</h2>
                        <p class="m-0">¡Preparate para nuestro gran día!</p>
                        <p>Ya podés etiquetarnos en Instagram con nuestro hashtag en tus fotos o videos.</p>
                        <a href="" class="text-success">Ver fotos en instagram</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-success">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="text-white">¡Gracias por acompañarnos en este momento tan importante!</h5>
                    </div>
                </div>
            </div>
        </section>


    </div>
</template>

<script>
    import Contador from '../components/Contador';

    export default {
        components: { Contador },
    }
</script>

<style lang="scss" scoped>

</style>
