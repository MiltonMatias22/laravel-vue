@extends('layouts.app')

@section('content')
    <page-component collengthparam="12">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://imgplaceholder.com/640x360" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <p class="card-text text-right"><small class="text-muted">Author: Author Name</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </page-component>
@endsection
