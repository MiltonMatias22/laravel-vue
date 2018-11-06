<template>
    <div>
        <nav class="navbar navbar-light justify-content-between">
            <a v-if="urlcreateparam" v-bind:href="urlcreateparam" class="btn btn-success">
                New <span class="ion ion-plus"></span>
            </a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" v-model="searchparam"
                    placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th v-for="item in tableheaderparam" :key="item.id">{{item}}</th>
                    <th v-if="urldateilsparam || urleditparam || urlremoveparam">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(items, index) in listItems" :key="items.id">
                    <td v-for="item in items" :key="item.id">{{item}}</td>
                    <td v-if="urldateilsparam || urleditparam || urlremoveparam">
                        <form v-bind:id="index" v-if="tokenparam" v-bind:action="urlremoveparam" method="post" class="form-inline">
                            <a v-if="urldateilsparam" v-bind:href="urldateilsparam" class="btn btn-info btn-sm">Details</a> |
                            <a v-if="urleditparam" v-bind:href="urleditparam" class="btn btn-warning btn-sm">Edit</a> |
                            <a v-if="urlremoveparam" v-bind:href="urlremoveparam" @click="removeItem(index)" class="btn btn-danger btn-sm">Remove</a>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="tokenparam">
                        </form>
                        <div v-else>
                            <a v-if="urldateilsparam" v-bind:href="urldateilsparam" class="btn btn-info btn-sm">Details</a> |
                            <a v-if="urleditparam" v-bind:href="urleditparam" class="btn btn-warning btn-sm">Edit</a> |
                            <a v-if="urlremoveparam" v-bind:href="urlremoveparam" class="btn btn-danger btn-sm">Remove</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: [
            'tableheaderparam',
            'tbodyitensparam',
            'urlcreateparam',
            'urldateilsparam',
            'urleditparam',
            'urlremoveparam',
            'tokenparam',
            'orderitems',
            'ordercolumn'            
        ],
        data: function (){
            return {
                searchparam: '',
            }            
        },
        methods: {
            removeItem: function(index) {
                document.getElementById(index).submit();
            },
        },
        computed: {
            listItems: function () {
                let order = this.orderitems.toLowerCase() || "asc";
                let orderColmn = parseInt(this.orderColmn) || 0;
                if (order == "asc") {
                    //order asc
                    this.tbodyitensparam.sort(
                        function (a,b) {
                            if(a[orderColmn] > b[orderColmn]){return 1}
                            if(a[orderColmn] < b[orderColmn]){return -1}
                            return 0;
                        }
                    );
                }else{
                    //order desc
                    this.tbodyitensparam.sort(
                        function (a,b) {
                            if(a[orderColmn] < b[orderColmn]){return 1}
                            if(a[orderColmn] > b[orderColmn]){return -1}
                            return 0;
                        }
                    );
                }
                return this.tbodyitensparam.filter(res => {
                    for (let index = 0; index < res.length; index++) {
                        if ((res[index] +"").toLowerCase().indexOf(this.searchparam.toLowerCase()) >= 0) {
                            return true;
                        }
                    }
                        return false;
                });
                return this.tbodyitensparam;
            }
        },
    }
</script>

<style scoped>

</style>