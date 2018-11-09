<template>
    <form v-bind:class="classparam" v-bind:action="actionparam" v-bind:method="defineMethod" v-bind:enctype="enctypeparam">
        <slot name="fields"></slot>
        <input v-if="a" type="hidden" name="_method"  v-bind:value="a">
        <input v-if="token" type="hidden" name="_token"  v-bind:value="token">
    </form>
</template>

<script>
    export default {
        props:[
            'classparam',
            'actionparam',
            'methodparam',
            'enctypeparam',
            'token',
        ],
        data() {
            return {
                m: this.methodparam.toLowerCase(),
                a: "",
            }
        },
        computed: {
            defineMethod: function () {
                if (this.m == "post" || this.m == "get" ) {
                    return this.m;
                }
                if (this.m == "put") {
                    this.a = "put";
                }
                if (this.m == "delete") {
                    this.a = "delete";
                }
                return "post";
            },
        },
    }
</script>

