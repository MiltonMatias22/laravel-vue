@extends('layouts.app')

@section('content')
    <page-component collengthparam="10">
        <panel-component textheader="Dashboard">
            <div slot="panel-content">
                <breadcrumb-component v-bind:breadcrumbparam="{{$breadcrumbParams}}"></breadcrumb-component>
                <div class="row">
                    <div class="col-md-4">
                        <box-component 
                            boxclassparam="bg-info"
                            iconclassparam="ion ion-pie-graph"
                            numtext="200"
                            bodytext="Articles"
                            url="{{route("articles.index")}}">
                        </box-component>
                    </div>
                    <div class="col-md-4">
                        <box-component
                            boxclassparam="bg-success"
                            iconclassparam="ion ion-person-stalker"
                            numtext="53%"
                            bodytext="Users"
                            url="{{route("users.index")}}">
                        </box-component>
                    </div>
                    <div class="col-md-4">
                        <box-component 
                            boxclassparam="bg-dark"
                            iconclassparam="ion ion-person"
                            numtext="50"
                            bodytext="Author"
                            url="{{route("authors.index")}}">
                        </box-component>
                    </div>
                </div>
            </div>
        </panel-component>
    </page-component>
@endsection