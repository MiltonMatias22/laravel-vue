<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" v-bind:href="url">{{titulo}}</a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <slot name="search"></slot>
        <ul class="navbar-nav mr-5">
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

