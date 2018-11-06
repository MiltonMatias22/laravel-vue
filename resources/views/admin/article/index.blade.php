@extends('layouts.app')

@section('content')
<page-component collengthparam="12">
    <panel-component textheader="Articles">
        <div slot="panel-content">            
            <table-component></table-component>
        </div>
    </panel-component>
</page-component>
@endsection