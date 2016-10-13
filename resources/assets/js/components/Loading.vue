<template>

    <div class="loading-animation" transition="fade">
        <i class="fa fa-spinner fa-pulse fa-fw"></i>
        <span class="sr-only">Loading...</span>
    </div>

</template>

<style scoped>

    .loading-animation{
        position: absolute;
        right: 50%;
        bottom: 50%;
        font-size: 4.5em;
    }
    .fade-transition {
        transition: all .3s ease;
    }

    .fade-enter, .fade-leave {
        opacity: 0;
    }

</style>