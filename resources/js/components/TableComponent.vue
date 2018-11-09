<template>
    <div>
        <nav class="navbar navbar-light justify-content-between">
            <a v-if="urlcreateparam" v-bind:href="urlcreateparam" class="btn btn-success">
                New <span class="ion ion-plus"></span>
            </a>
            <!-- btn modal -->
            <modallink-component
                datatargetparam="modaladd"
                titleparam="New"
                typeparam="button"
                classparam="btn btn-success"
                iconparam="ion ion-plus">
            </modallink-component>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" v-model="searchparam"
                    placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="cursor: pointer;" @click="orderColumns(index)" v-for="(item, index) in tableheaderparam" :key="item.id">{{item}}</th>
                    <th v-if="urldateilsparam || urleditparam || urlremoveparam">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(items, index) in listItems" :key="items.id">
                    <td v-for="item in items" :key="item.id">{{item}}</td>
                    <td v-if="urldateilsparam || urleditparam || urlremoveparam">
                        <form v-bind:id="index" v-if="tokenparam" v-bind:action="urlremoveparam" method="post" class="form-inline">
                                <a v-if="urldateilsparam && !modalactiveparam" v-bind:href="urldateilsparam"
                                    class="btn btn-info btn-sm">Details <span class="ion ion-eye"></span></a>
                                <modallink-component
                                    v-if="modalactiveparam && urleditparam"
                                    datatargetparam="modalDetails"
                                    titleparam="Details"
                                    typeparam="button"
                                    classparam="btn btn-info btn-sm"
                                    iconparam="ion ion-eye">
                                </modallink-component> |                                
                                <a v-if="urleditparam && !modalactiveparam" v-bind:href="urleditparam"
                                    class="btn btn-warning btn-sm">Edit <span class="ion ion-edit"></span></a>
                                <modallink-component
                                    v-if="modalactiveparam && urleditparam"
                                    datatargetparam="modalEdit"
                                    titleparam="Edit"
                                    typeparam="button"
                                    classparam="btn btn-warning btn-sm"
                                    iconparam="ion ion-edit">
                                </modallink-component> |                            
                            <a v-if="urlremoveparam" v-bind:href="urlremoveparam" @click="removeItem(index)" class="btn btn-danger btn-sm">Remove <span class="ion ion-trash-a"></span></a>
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
            'ordercolmn',
            'modalactiveparam'           
        ],
        data: function (){
            return {
                searchparam: '',
                orderItems: this.orderitems.toLowerCase() || "asc",
                orderColmn: parseInt(this.ordercolmn) || 0,
            }            
        },
        methods: {
            removeItem: function(index) {
                document.getElementById(index).submit();
            },
            orderColumns: function (columnIndex) {
                this.orderColmn = columnIndex;
                if (this.orderItems == "asc") {
                    this.orderItems = "desc";
                }else{
                    this.orderItems = "asc";
                }
            },
        },
        computed: {
            listItems: function () {
                let order = this.orderItems;
                let orderColmn = this.orderColmn;
                if (order == "asc") {
                    //order asc
                    this.tbodyitensparam.sort(
                        function (a,b) {
                            if(Object.values(a)[orderColmn] > Object.values(b)[orderColmn]){return 1}
                            if(Object.values(a)[orderColmn] < b[orderColmn]){return -1}
                            return 0;
                        }
                    );
                }else{
                    //order desc
                    this.tbodyitensparam.sort(
                        function (a,b) {
                            if(Object.values(a)[orderColmn] < b[orderColmn]){return 1}
                            if(Object.values(a)[orderColmn] > b[orderColmn]){return -1}
                            return 0;
                        }
                    );
                }
                if (this.searchparam) {
                    return this.tbodyitensparam.filter(res => {
                        for (let index = 0; index < res.length; index++) {
                            if ((res[index] +"").toLowerCase().indexOf(this.searchparam.toLowerCase()) >= 0) {
                                return true;
                            }
                        }
                        return false;
                    });
                }
                
                return this.tbodyitensparam;
            }
        },
    }
</script>

<style scoped>

</style>