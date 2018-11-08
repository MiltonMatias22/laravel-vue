<template>
    <div>
        <!-- Button trigger modal -->
        <button v-if="typeparam == 'button'" type="button" v-bind:class="classparam || 'btn btn-primary'"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam">
            {{titleparam}} <span v-bind:class="iconparam"></span>
        </button>
        <a v-else-if="typeparam == 'link'" class="btn-link" data-toggle="modal" v-bind:data-target="'#'+datatargetparam" href="#">
        {{titleparam}}
        </a>
        <button v-else type="button" class="btn btn-secondary"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam">
            {{titleparam}} <span v-bind:class="iconparam"></span>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['datatargetparam','titleparam','typeparam','classparam','iconparam']
    }
</script>
