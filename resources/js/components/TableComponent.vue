<template>
    <div>
        <a href="" class="btn btn-success">New <span class="ion ion-plus"></span></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th v-for="item in tableheadparam" :key="item.id">{{item}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>my article</td>
                    <td>My great article</td>
                    <td>Author name</td>
                    <td>00/00/0000</td>
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
        props: ['tableheaderparam'],
    }
</script>

<style scoped>

</style>