<template>
    <div v-bind:class="'col-sm-'+(colsm || '6')+' col-md-'+(colmd || '4')">
        <div class="card mb-3 text-secondary">
            <img class="card-img-top" v-bind:src="imgparam" v-bind:alt="altparam">
            <div class="card-body">
                <h5 class="card-title">{{titleparam}}</h5>
                <slot name="card-text"></slot>
                <div class="d-flex justify-content-between">
                    <p class="card-text"><small class="text-muted">{{dateparam}}</small></p>
                    <p class="card-text text-right"><small class="text-muted">Author: {{authorparam}}</small></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titleparam','imgparam','altparam','authorparam','dateparam','colsm','colmd'],
    }
</script>

<style scoped>

</style>