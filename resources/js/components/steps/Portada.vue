<template>
    <div class="row p-4 mt-4">
        <div class="col-12 text-center">
            <form @submit.prevent="submit">
                <h5 class="mb-4">Ingrese su Nombre y Apellido <br>(o Alias)</h5>
                <input class="form-control form-control-lg" v-model="nombre" required>
                <button type="submit" class="btn btn-success btn-block mt-4" :disabled="nombre == '' || nombre.length < 4">JUGAR</button>
            </form>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                nombre: ''
            }
        },

        methods: {
            submit() {
                if(this.nombre == '') return;
                this.$emit('update:name', this.nombre);
                this.$emit('update:step', 'PREGUNTAS');
            }
        },
    }
</script>

<style lang="scss" scoped>
    .btn{border-radius: 5px;}
</style>
