<template>
    <nav class="navbar navbar-light bg-success d-flex justify-content-between">
        <router-link to="/dashboard" class="navbar-brand">
            <img class="invert" src="/images/logo.svg" height="45" alt="">
        </router-link>

        <div>
            <router-link to="/canciones" class="btn btn-light">Canciones</router-link>
            <router-link to="/resultados" class="btn btn-light mx-2">Resultados</router-link>
            <router-link to="/cargar-fotos" class="btn btn-light">Fotos</router-link>
        </div>
    </nav>
</template>

