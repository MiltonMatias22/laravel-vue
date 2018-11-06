<template>
    <div>
        <a href="" class="btn btn-success">New <span class="ion ion-plus"></span></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th v-for="item in tableheaderparam" :key="item.id">{{item}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="items in tbodyitensparam" :key="items.id">
                    <td v-for="item in items" :key="item.id">{{item}}</td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">Details</a> |
                        <a href="#" class="btn btn-warning btn-sm">Edit</a> |
                        <a href="#" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['tableheaderparam','tbodyitensparam'],
    }
</script>

<style scoped>

</style>