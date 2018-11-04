<template>
    <div  v-bind:class="defineCor">
        <div class="card-header">
            {{ textheader }}
        </div>
        <div class="card-body">
            <slot name="panel-content"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['textheader','classparam'],
        computed: {
            defineCor: function(){
                return "card " + (this.classparam || "bg-light");
            },
        },
    }
</script>
