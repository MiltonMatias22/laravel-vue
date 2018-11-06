@extends('layouts.app')

@section('content')
<page-component collengthparam="12">
    <panel-component textheader="Articles">
        <div slot="panel-content">            
            <table-component
                v-bind:tableheaderparam="[
                    'Id',
                    'Title',
                    'Description',
                    'Author',
                    'Date',
                ]"
                v-bind:tbodyitensparam="[
                    [1,'PHP course','My PHP article','Article Author 1','0000/00/00'],
                    [2,'VUE course','My VUE article','Article Author 2','0000/00/00'],
                    [3,'HTML course','My HTML article','Article Author 3','0000/00/00']
                ]"
                urlcreateparam="#new"
                urldateilsparam="#dateils"
                urleditparam="#edit"
                urlremoveparam="#delete"
                tokenparam="788095004"
                orderitems="asc"
                ordercolumn="1"
                >
            </table-component>
        </div>
    </panel-component>
</page-component>
@endsection