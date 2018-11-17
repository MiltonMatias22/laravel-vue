@extends('layouts.app')

@section('content')
    <page-component collengthparam="8">
        <card-article-component
        titleparam="{{$article->title}}"
        imgparam="https://imgplaceholder.com/640x360"
        altparam="Card image cap"
        authorparam="{{$article->user_id}}"
        dateparam="{{date('Y/m/d H:m', strtotime($article->date))}}"
        colsm="12"
        colmd="12">
            <div slot="card-text">
                <p class="card-text">{{$article->description}}</p>
                <p class="card-text">{{$article->content}}</p>
            </p>
        </card-article-component>
    </page-component>
@endsection