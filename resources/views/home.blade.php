@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <panel-component textheader="Dashboard">
                <div slot="panel-content">
                    <div class="row">
                        <div class="col-md-4">
                            <panel-component textheader="Card 1" classparam="text-white bg-primary mt-2">
                                <div slot="panel-content">
                                    <p>My card 1</p>
                                </div>
                            </panel-component>
                        </div>
                        <div class="col-md-4">
                            <panel-component textheader="Card 2" classParam="text-white bg-success mt-2">
                                <div slot="panel-content">
                                    <p>My card 2</p>
                                </div>
                            </panel-component>
                        </div>
                        <div class="col-md-4">
                            <panel-component textheader="Card 3" classParam="text-white bg-secondary mt-2">
                                <div slot="panel-content">
                                    <p>My card 3</p>
                                </div>
                            </panel-component>
                        </div>
                    </div>
                </div>
            </panel-component>
        </div>
    </div>
</div>
@endsection
