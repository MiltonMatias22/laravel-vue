<template>
    <!-- Modal bootstrap 4-->
    <div class="modal fade" v-bind:id="modalidparam" tabindex="-1" role="dialog"
        v-bind:aria-labelledby="modalidparam" aria-hidden="true">
        <div v-bind:class="'modal-dialog '+ verifyModalType" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="header"></slot>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot name="body"></slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer"></slot>                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['modalidparam','modaltypeparam','centeredparam'],
        data: function () {
            return {
                a: this.modaltypeparam.toLowerCase(),
                b: this.centeredparam.toLowerCase(),
            }
        },
        computed: {
            verifyModalType: function () {        
                if (this.a == "modal-sm" || this.a == "modal-lg") {
                    if (this.b == "true") {
                        this.b = " modal-dialog-centered";
                    }
                    return this.a + this.b;
                }else{
                    return "";
                }
            },
        },
    }
</script>

<style scoped>

</style>