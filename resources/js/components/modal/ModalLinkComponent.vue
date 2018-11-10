<template>
    <div>
        <!-- Button trigger modal -->
        <span v-if="items">
            <button v-if="typeparam == 'button'" v-on:click="formFillUpdate()" type="button"
                v-bind:class="classparam || 'btn btn-primary'"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam">
            {{titleparam}} <span v-bind:class="iconparam"></span>
        </button>
        <a v-else-if="typeparam == 'link'" v-on:click="formFillUpdate()" class="btn-link"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam" href="#">
        {{titleparam}}
        </a>
        <button v-else type="button" class="btn btn-secondary"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam">
            {{titleparam}} <span v-bind:class="iconparam"></span>
        </button>
        </span>
        <span v-if="!items">
            <button v-if="typeparam == 'button'" type="button" v-bind:class="classparam || 'btn btn-primary'"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam">
            {{titleparam}} <span v-bind:class="iconparam"></span>
        </button>
        <a v-else-if="typeparam == 'link'" class="btn-link" data-toggle="modal"
            v-bind:data-target="'#'+datatargetparam" href="#">
        {{titleparam}}
        </a>
        <button v-else type="button" class="btn btn-secondary"
            data-toggle="modal" v-bind:data-target="'#'+datatargetparam">
            {{titleparam}} <span v-bind:class="iconparam"></span>
        </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['datatargetparam','titleparam','typeparam','classparam','iconparam','items'],
        methods: {
            formFillUpdate: function () {
                this.$store.commit("SET_ITEM", this.items);
            },
        },
    }
</script>
