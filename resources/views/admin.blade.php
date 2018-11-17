@extends('layouts.app')

@section('content')
    <page-component collengthparam="10">
        <panel-component textheader="Dashboard">
            <div slot="panel-content">
                <breadcrumb-component v-bind:breadcrumbparam="{{$breadcrumbParams}}"></breadcrumb-component>
                <div class="row">
                    @can('isAuthor', Model::class)                                    
                    <div class="col-md-4">
                        <box-component 
                            boxclassparam="bg-info"
                            iconclassparam="ion ion-pie-graph"
                            numtext="{{$articles}}"
                            bodytext="Articles"
                            url="{{route("articles.index")}}">
                        </box-component>
                    </div>
                    @endcan
                    @can('isAdmin', Model::class)                                    
                    <div class="col-md-4">
                        <box-component
                            boxclassparam="bg-success"
                            iconclassparam="ion ion-person-stalker"
                            numtext="{{$users}}"
                            bodytext="Users"
                            url="{{route("users.index")}}">
                        </box-component>
                    </div>
                    <div class="col-md-4">
                        <box-component 
                            boxclassparam="bg-dark"
                            iconclassparam="ion ion-person"
                            numtext="{{$authors}}"
                            bodytext="Author"
                            url="{{route("authors.index")}}">
                        </box-component>
                    </div>
                    <div class="col-md-4">
                        <box-component 
                            boxclassparam="bg-primary"
                            iconclassparam="ion ion-person"
                            numtext="{{$admins}}"
                            bodytext="Admin"
                            url="{{route("admins.index")}}">
                        </box-component>
                    </div>
                    @endcan
                </div>
            </div>
        </panel-component>
    </page-component>
@endsection
