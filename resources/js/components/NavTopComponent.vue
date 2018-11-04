<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" v-bind:href="url">{{titulo}}</a>
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mr-5">
            <slot name="menu-nav-content"></slot>
        </ul>
    </div>
</nav>

    
</template>

<script>
export default {
  props: ["titulo", "url"]
};
</script>

