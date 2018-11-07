<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in breadcrumbparam" :key="item.id" v-bind:class="defineClass">
                <a v-if="item.url" v-bind:href="item.url">{{item.titleText}}</a>
                <span v-if="!item.url" class="breadcrumb-item active" aria-current="page">{{item.titleText}}</span>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        props: ['breadcrumbparam'],
        computed: {
            defineClass: function () {
                if (this.url) {
                    return "breadcrumb-item active";
                }else{
                    return "breadcrumb-item";
                }
            }
        }
    }
</script>

<style scoped>

</style>