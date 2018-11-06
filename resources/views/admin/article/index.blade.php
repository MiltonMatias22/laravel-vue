@extends('layouts.app')

@section('content')
<page-component collengthparam="12">
    <panel-component textheader="Articles">
        <div slot="panel-content">
            My articles...
        </div>
    </panel-component>
</page-component>
@endsection