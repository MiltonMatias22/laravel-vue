@extends('layouts.app')

@section('content')
<page-component collengthparam="12">
    <panel-component textheader="Articles">
        <div slot="panel-content">
        <breadcrumb-component v-bind:breadcrumbparam="{{$breadcrumbParams}}"></breadcrumb-component>           
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
                urlcreateparam=""
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

<!--Modal type option: modal-sm, modal-lg. centeredparam: true-->
<modal-component modalidparam="modalName" modaltypeparam="modal-lg" centeredparam="true">
    <h3 slot="header" class="modal-title"><span class="ion ion-plus-round"></span></h3>
    <div slot="body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, numquam.</p>
    </div>
    <div slot="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>    
</modal-component>
@endsection