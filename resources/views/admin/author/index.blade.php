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
    <panel-component textheader="Authors">
        <div slot="panel-content">
        <breadcrumb-component v-bind:breadcrumbparam="{{$breadcrumbParams}}"></breadcrumb-component>
            <table-component
                v-bind:tableheaderparam="[
                    'Id',
                    'Name',
                    'E-mail',
                ]"
                v-bind:tbodyitensparam="{{json_encode($modelList)}}"
                urlcreateparam=""
                urldateilsparam="/admin/authors/"
                urleditparam="/admin/authors/"
                urlremoveparam="/admin/authors/"
                tokenparam="{{csrf_token()}}"
                orderitems="asc"
                ordercolumn="1"
                modalactiveparam="true"
                >
            </table-component>
            <!--* to pagination -->
            {{$modelList}}
        </div>
    </panel-component>
</page-component>

<!--Modal type option: modal-sm, modal-lg. centeredparam: true-->
<modal-component modalidparam="modaladd" modaltypeparam="" centeredparam="true">
    <h3 slot="header" class="modal-title"><span class="ion ion-plus-round"></span></h3>
    <div slot="body">
        <form-component
            classparam=""
            actionparam="{{ route('authors.store') }}"
            methodparam="post"
            enctypeparam=""
            token="{{ csrf_token() }}"
            id="submit">
            <div slot="fields">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Name" aria-describedby="helpId" value="{{old('name')}}">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" class="form-control"
                        placeholder="E-mail" aria-describedby="helpId" value="{{old('email')}}">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Password" value="{{old('password')}}">
                </div>
                <div class="form-group">
                    <label for="author">Author ?</label>
                    <select class="form-control" id="author" name="author">
                        <option selected>Choose...</option>
                        <option {{(old('author') && old('author') == 'T' ? 'selected' : '')}}
                            {{!old('author') ? 'selected' : ''}} value="T">YES</option>
                        <option {{(old('author') && old('author') == 'F' ? 'selected' : '')}} value="F">NO</option>
                    </select>
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
    <h3 slot="header" class="modal-title">@{{$store.state.item.name}}</h3>
    <div slot="body">
        <ul class="list-unstyled">
            <li><strong>E-mail: </strong>@{{$store.state.item.email}}</li>
        </ul>
        <h6>Others Details</h6>
    </div>
    <div slot="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>    
</modal-component>
<modal-component modalidparam="modalEdit" modaltypeparam="" centeredparam="true">
    <h3 slot="header" class="modal-title"><span class="ion ion-edit"></span></h3>
    <div slot="body">
        <form-component
            classparam=""
            :actionparam="'/admin/authors/'+$store.state.item.id"
            methodparam="put"
            enctypeparam=""
            token="{{ csrf_token() }}"
            id="update">
            <div slot="fields">
                <div class="form-group">
                    <label for="edit-name">Name:</label>
                    <input type="text" name="name" id="edit-name" class="form-control"
                        placeholder="Name" v-model="$store.state.item.name" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="edit-email">E-mail:</label>
                    <input type="email" name="email" id="edit-email" class="form-control"
                        placeholder="my@email.com" v-model="$store.state.item.email" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="edit-password">Password:</label>
                    <input type="password" class="form-control" id="edit-password" name="password">
                </div>                    
                <div class="form-group">
                    <label for="edit-author">Author ?</label>
                    <select class="form-control" id="edit-author"
                        name="author" v-model="$store.state.item.author">
                        <option selected>Choose...</option>
                        <option value="T">YES</option>
                        <option value="F">NO</option>
                    </select>
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
