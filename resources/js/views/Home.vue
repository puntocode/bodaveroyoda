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
                        <Contador :year="2022" :month="2" :day="26" :hour="19" :minute="0" />
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
                        <p>La ceremonia se realizará el <strong>26 de Febrero a las 19:00 hs.</strong> en Fernando de Magallanes (San Bernardino).</p>
                        <a href="https://goo.gl/maps/bsvdvEVNqkQ3Gv6y6" class="btn btn-success px-4" target="_blank">LLEGAR A LA CEREMONIA</a>
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
                        <p>Esperamos que seas parte de esta gran celebración. ¡Confirmanos tu asistencia!</p>
                        <button type="button" class="btn btn-success px-4" data-toggle="modal" data-target="#modal-asistencia">CONFIRMAR ASISTENCIA</button>
                    </div>

                    <div class="col-12 text-center">
                        <h4 class="mt-4 text-success">DRESS CODE</h4>
                        <a
                            href="https://www.google.com/search?q=casual+chic+hombre&tbm=isch&ved=2ahUKEwj63a69jIf1AhUBq5UCHT__CMcQ2-cCegQIABAA&oq=casual+chic+hombre&gs_lcp=CgNpbWcQAzIHCCMQ7wMQJzIGCAAQBxAeMgYIABAHEB4yBggAEAcQHlAAWABg5gJoAHAAeACAAWeIAWeSAQMwLjGYAQCqAQtnd3Mtd2l6LWltZ8ABAQ&sclient=img&ei=0FPLYfq1LIHW1sQPv_6juAw&bih=937&biw=1920&rlz=1C1SQJL_esPY863PY863"
                            class="text-dark"
                            target="_blank">
                            Hombres: Casual Chic
                        </a>
                        <br>
                        <a
                            href="https://www.google.com/search?q=dress+code+cocktail+mujer&tbm=isch&ved=2ahUKEwilhaOsjYf1AhVfu5UCHTmoCR8Q2-cCegQIABAA&oq=dress+code+cocktail+&gs_lcp=CgNpbWcQARgAMgQIABBDMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgQIABAeMgQIABAeMgQIABAeOgcIIxDvAxAnOgYIABAHEB5Q4ARY4ARgyhVoAHAAeACAAXWIAccBkgEDMS4xmAEAoAEBqgELZ3dzLXdpei1pbWfAAQE&sclient=img&ei=uVTLYeXEE9_21sQPudCm-AE&bih=937&biw=1920&rlz=1C1SQJL_esPY863PY863#imgrc=JOGtI4wwefV9BM"
                            class="text-dark"
                            target="_blank">
                            Mujeres: Cocktail
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-success">
            <div class="container py-4">
                <div class="row py-5">
                    <div class="col-12 text-center text-white">
                        <img src="/images/icons/icon-regalo.svg" alt="icono de regalo" width="60">
                        <h2 class="mt-4">Nuestro mejor Regalo?</h2>
                        <h3>Nuestra Luna de miel</h3>
                        <p>Si desean colaborar pueden hacerlo en..</p>
                        <button data-toggle="modal" data-target="#modal-regalo" class="btn btn-white text-success px-4 font-weight-bold">VER MÁS</button>
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
                        <button data-toggle="modal" data-target="#modal-canciones" class="btn btn-success">Sugerir Canción</button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="my-4">Nuestra Historia..</h2>
                    </div>
                </div>

                <NosotrosAlbum />
            </div>
        </section>

        <section class="bg-gray">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/images/icons/icon-instagram.svg" alt="icono de regalo" width="58">
                        <h2 class="mt-4">#BODAVEROYOSVAL</h2>
                        <p class="m-0">¡Preparate para nuestro gran día!</p>
                        <p>Ya podés etiquetarnos en Instagram con nuestro hashtag en tus fotos o videos.</p>
                        <a href="https://www.instagram.com/explore/tags/bodaveroyosval" class="text-success" target="_blank">Ver fotos en instagram</a>
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

        <Modales />

    </div>
</template>

<script>
    import Contador from '../components/Contador';
    import Modales from '../components/Modales';
    import NosotrosAlbum from '../components/NosotrosAlbum';


    export default {
        components: { Contador, Modales, NosotrosAlbum},
    }
</script>

<style lang="scss" scoped>
    .image{height: 200px; width: 200px; margin: 15px;}
</style>
