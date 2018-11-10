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
                v-bind:tbodyitensparam="{{$articles}}"
                urlcreateparam=""
                urldateilsparam="#details"
                urleditparam="#edit"
                urlremoveparam="#delete"
                tokenparam="788095004"
                orderitems="asc"
                ordercolumn="1"
                modalactiveparam="true"
                >
            </table-component>
        </div>
    </panel-component>
</page-component>

<!--Modal type option: modal-sm, modal-lg. centeredparam: true-->
<modal-component modalidparam="modaladd" modaltypeparam="modal-lg" centeredparam="true">
    <h3 slot="header" class="modal-title"><span class="ion ion-plus-round"></span></h3>
    <div slot="body">
        <form-component
            classparam=""
            actionparam="#"
            methodparam="post"
            enctypeparam=""
            token="12345"
            id="submit">
            <div slot="fields">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control"
                        placeholder="Title" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control"
                        placeholder="Description" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="author">Author:</label>
                        <select id="author" class="form-control">
                            <option selected>Choose Author...</option>
                            <option>Author name 1</option>
                            <option>Author name 2</option>
                            <option>Author name 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                </div>
            </div>
        </form-component>
    </div>
    <div slot="footer">
        <button type="submit" class="btn btn-primary" form="submit">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>    
</modal-component>
<modal-component modalidparam="modalDetails" modaltypeparam="" centeredparam="true">
    <h3 slot="header" class="modal-title">@{{$store.state.item.title}}</h3>
    <div slot="body">
        <ul class="list-unstyled">
            <li><strong>Autor: </strong>@{{$store.state.item.author}}</li>
            <li><strong>Date: </strong>@{{$store.state.item.date}}</li>
            <li><strong>Description: </strong>@{{$store.state.item.description}}</li>
        </ul>
        <h6>Others Details</h6>
    </div>
    <div slot="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>    
</modal-component>
<modal-component modalidparam="modalEdit" modaltypeparam="modal-lg" centeredparam="true">
    <h3 slot="header" class="modal-title"><span class="ion ion-edit"></span></h3>
    <div slot="body">
        <form-component
            classparam=""
            actionparam="#"
            methodparam="put"
            enctypeparam=""
            token="12345"
            id="update">
            <div slot="fields">
                <input type="hidden" name="id" v-model="$store.state.item.id">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control"
                        placeholder="Title" v-model="$store.state.item.title" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control"
                        placeholder="Description" v-model="$store.state.item.description" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="author">Author:</label>
                        <select id="author" class="form-control">
                            <option selected>Choose Author...</option>
                            <option>Author name 1</option>
                            <option>Author name 2</option>
                            <option>Author name 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" v-model="$store.state.item.date">
                    </div>
                </div>
            </div>
        </form-component>
    </div>
    <div slot="footer">
        <button type="submit" class="btn btn-primary" form="update">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>    
</modal-component>
@endsection
