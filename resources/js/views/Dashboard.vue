<template>
    <div>
        <Navbar />

        <div class="container my-5">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                   <div class="card d-flex flex-row p-3 align-items-center mt-3">
                       <img src="/images/icons/icon-card-invitado.svg" height="80" alt="icon-invitados">
                        <div class="card-body pl-0 text-right">
                            <h2 class="card-title font-bold mb-0">{{ totales.total }}</h2>
                            <p class="card-text">Invitados</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card d-flex flex-row p-3 align-items-center mt-3">
                       <img src="/images/icons/icon-card-confirmados.svg" height="80" alt="icon-confirmado">
                        <div class="card-body pl-0 text-right">
                            <h2 class="card-title mb-0 font-bold">{{ totales.confirmados }}</h2>
                            <p class="card-text">Confirmados</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card d-flex flex-row p-3 align-items-center mt-3">
                       <img src="/images/icons/icon-card-cancelados.svg" height="80" alt="icon-cancelado">
                        <div class="card-body pl-0 text-right">
                            <h2 class="card-title mb-0 font-bold">{{ totales.cancelados }}</h2>
                            <p class="card-text">Cancelados</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card d-flex flex-row p-3 align-items-center mt-3">
                       <img src="/images/icons/icon-card-no-respondido.svg" height="80" alt="icon-no-respondido">
                        <div class="card-body pl-0 text-right">
                            <h2 class="card-title mb-0 font-bold">{{ totales.sinResponder }}</h2>
                            <p class="card-text">Sin responder</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <h2 class="font-bold">Lista de Invitados</h2>
                        <!-- <button class="btn btn-success border-5">Invitar a todos</button> -->
                    </div>


                    <table class="table table-bordered table-sm mt-4">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th>Invitado/a</th>
                            <th>Cantidad</th>
                            <th class="text-center">Asistencia</th>
                            <th>Mensaje</th>
                            <th>Invitar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(invitado, index) in invitados" :key="index">
                                <th scope="row">{{ index+1 }}</th>
                                <td class="text-capitalize">{{ invitado.invitado }}</td>
                                <td>{{ invitado.cantidad }}</td>
                                <td class="text-center">
                                    <span class="badge badge-pill p-2" :class="`badge-${color(invitado.asistencia)}`">{{ invitado.asistencia }}</span>
                                </td>
                                <td>{{ invitado.mensaje }}</td>
                                <td>
                                    <span @click="invitar(invitado.numero, invitado.codigo)" class="pointer text-success">Invitar</span>
                                </td>
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
                invitados: [],
                totales: { total: 0, confirmados: 0, cancelados: 0, sinResponder: 0 }
            }
        },

        created () {
            this.fetch();
        },

        methods: {
            async fetch() {
                let res = await axios.get('api/invitados');
                this.invitados = await res.data;

                this.totales.total = this.contar(this.invitados);

                let confirmados = this.filtrar('CONFIRMADA');
                this.totales.confirmados = this.contar(confirmados);

                let cancelados = this.filtrar('CANCELADA');
                this.totales.cancelados = this.contar(cancelados);

                let sinResponder = this.filtrar('SIN RESPONDER');
                this.totales.sinResponder = this.contar(sinResponder);
            },

            invitar(numero, codigo){
                let invitacion = `https://api.whatsapp.com/send?phone=${numero}&text=Estas%20invitado%2Fa%20la%20*BODA%20DE%20VERO%20%26%20OSVAL*%0APor%20favor%20confirma%20la%20asistencia%20con%20el%20siguiente%20codigo%3A%20*${codigo}*%0Alink%3A%20bodaveroyoda.com`;
                console.log(invitacion)

                window.open(invitacion, '_blank');
            },

            filtrar(filtro){
                return this.invitados.filter(invitado => invitado.asistencia === filtro);
            },

            contar(array){
                return array.reduce((total, invitado) => {
                    return total + invitado.cantidad
                }, 0);
            },

            color(asistencia){
                const COLOR_DEFAULT = 'info';
                const COLOR = {
                    'CONFIRMADA': 'success',
                    'CANCELADA': 'danger',
                    'SIN RESPONDER': 'primary',
                }

                return COLOR[asistencia] || COLOR_DEFAULT;
            }
        },


    }
</script>

<style lang="scss" scoped>
    .border-5{
        border-radius: 5px;
    }

    .pointer{
        cursor: pointer;
    }
</style>
