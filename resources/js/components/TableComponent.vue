<template>
    <div>
        <a v-if="urlcreateparam" v-bind:href="urlcreateparam" class="btn btn-success">New <span class="ion ion-plus"></span></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th v-for="item in tableheaderparam" :key="item.id">{{item}}</th>
                    <th v-if="urldateilsparam || urleditparam || urlremoveparam">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="items in tbodyitensparam" :key="items.id">
                    <td v-for="item in items" :key="item.id">{{item}}</td>
                    <td v-if="urldateilsparam || urleditparam || urlremoveparam">
                        <form v-if="urlremoveparam && tokenparam" action="" method="post" class="form-inline">
                            <a v-if="urldateilsparam" v-bind:href="urldateilsparam" class="btn btn-info btn-sm">Details</a> |
                            <a v-if="urleditparam" v-bind:href="urleditparam" class="btn btn-warning btn-sm">Edit</a> |
                            <a v-if="urlremoveparam" v-bind:href="urlremoveparam" class="btn btn-danger btn-sm">Remove</a>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="tokenparam">
                        </form>
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
            'tokenparam'
        ],
    }
</script>

<style scoped>

</style>