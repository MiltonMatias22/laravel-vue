@extends('layouts.app')

@section('content')
<page-component collengthparam="12">
    @if ($errors->all())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <p>Please, fill the fields <strong>correctly</strong>!</p>
            <ul>
                @foreach ($errors->all() as $key => $value)
                    <li>{{$value}}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <panel-component textheader="Articles">
        <div slot="panel-content">
        <breadcrumb-component v-bind:breadcrumbparam="{{$breadcrumbParams}}"></breadcrumb-component>
            <table-component
                v-bind:tableheaderparam="[
                    'Id',
                    'Title',
                    'Description',
                    'Date',
                ]"
                v-bind:tbodyitensparam="{{json_encode($articles)}}"
                urlcreateparam=""
                urldateilsparam="/admin/articles/"
                urleditparam="/admin/articles/"
                urlremoveparam="/admin/articles/"
                tokenparam="{{csrf_token()}}"
                orderitems="asc"
                ordercolumn="1"
                modalactiveparam="true"
                >
            </table-component>
            <!--* to pagination -->
            {{$articles}}
        </div>
    </panel-component>
</page-component>

<!--Modal type option: modal-sm, modal-lg. centeredparam: true-->
<modal-component modalidparam="modaladd" modaltypeparam="modal-lg" centeredparam="true">
    <h3 slot="header" class="modal-title"><span class="ion ion-plus-round"></span></h3>
    <div slot="body">
        <form-component
            classparam=""
            actionparam="{{ route('articles.store') }}"
            methodparam="post"
            enctypeparam=""
            token="{{ csrf_token() }}"
            id="submit">
            <div slot="fields">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control"
                        placeholder="Title" aria-describedby="helpId" value="{{old('title')}}">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control"
                        placeholder="Description" aria-describedby="helpId" value="{{old('description')}}">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="author">Author:</label>
                        <select id="author" class="form-control">
                            <option selected>Choose Author...</option>
                            <option>Author name 1</option>
                            <option>Author name 2</option>
                            <option>Author name 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">Date:</label>
                        <input type="datetime-local" class="form-control" name="date" id="date" value="{{old('date')}}">
                    </div>
                </div>
                <div class="form-group">
                  <label for="content">Content:</label>
                  <textarea class="form-control" name="content" id="content" rows="3">{{old('content')}}</textarea>
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
            <li><strong>Description: </strong>@{{$store.state.item.description}}</li>
            <li><strong>Date: </strong>@{{$store.state.item.date}}</li>
            <li><strong>Content: </strong>@{{$store.state.item.content}}</li>
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
            :actionparam="'/admin/articles/'+$store.state.item.id"
            methodparam="put"
            enctypeparam=""
            token="{{ csrf_token() }}"
            id="update">
            <div slot="fields">
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
                    <div class="form-group col-md-8">
                        <label for="author">Author:</label>
                        <select id="author" class="form-control">
                            <option selected>Choose Author...</option>
                            <option>Author name 1</option>
                            <option>Author name 2</option>
                            <option>Author name 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">Date:</label>
                        <input type="datetime-local" class="form-control" id="date" name="date"
                            v-model="$store.state.item.date">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" name="content" id="content" rows="3"
                        v-model="$store.state.item.content">
                    </textarea>
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
