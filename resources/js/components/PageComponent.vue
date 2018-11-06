<template>
    <div class="container">
        <div class="row">
            <div v-bind:class="defineColLength">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['collengthparam'],
        computed:{
            defineColLength: function(){
                if (this.collengthparam >= 12) {
                    return "col-md-12"
                }
                if (this.collengthparam <= 2) {
                    return "col-md-2 offset-md-5"
                }
                if ((this.collengthparam % 2) == 0) {
                    return "col-md-"+this.collengthparam+
                            " offset-md-"+((12 - this.collengthparam)/2);
                }
                else{
                    return "col-md-"+(parseInt(this.collengthparam) + 1)+
                            " offset-md-"+((12 - (parseInt(this.collengthparam) + 1))/2);
                }
                return "col-md-12 offset-md-2"
            }
        },
    }
</script>

<style scoped>

</style>