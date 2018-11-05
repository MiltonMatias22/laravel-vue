@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <panel-component textheader="Dashboard">
                <div slot="panel-content">
                    <div class="row">
                        <div class="col-md-4">
                            <box-component 
                                boxclassparam="bg-info"
                                iconclassparam="ion ion-bag"
                                numtext="200"
                                bodytext="New orders"
                                url="http://store.com/new-order/info">
                            </box-component>
                        </div>
                        <div class="col-md-4 ">
                            <box-component
                                boxclassparam="bg-success"
                                iconclassparam="ion ion-stats-bars"
                                numtext="53%"
                                bodytext="Bounce rate"
                                url="http://store.com/bounce-rate/info">
                            </box-component>
                        </div>
                        <div class="col-md-4">
                            <box-component 
                                boxclassparam="bg-dark"
                                iconclassparam="ion ion-person-add"
                                numtext="50"
                                bodytext="User registrations"
                                url="http://store.com/user/info">
                            </box-component>
                        </div>
                    </div>
                </div>
            </panel-component>
        </div>
    </div>
</div>
@endsection
