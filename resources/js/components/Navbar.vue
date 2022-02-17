<template>
    <nav class="navbar navbar-light bg-success d-flex justify-content-between">
        <router-link to="/dashboard" class="navbar-brand">
            <img class="invert" src="/images/logo.svg" height="45" alt="">
        </router-link>

        <div>
            <router-link to="/canciones" class="btn btn-light mr-2">Canciones</router-link>
            <router-link to="/resultados" class="btn btn-light">Resultados</router-link>
        </div>
    </nav>
</template>

