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
                    'Action'
                ]">
            </table-component>
        </div>
    </panel-component>
</page-component>
@endsection