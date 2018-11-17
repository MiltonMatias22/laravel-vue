@extends('layouts.app')

@section('content')
    <page-component collengthparam="12">
        <div class="row">
            @foreach ($articles as $item)
                <card-article-component
                titleparam="{{$item->title}}"
                imgparam="https://imgplaceholder.com/640x360"
                altparam="Card image cap"
                authorparam="{{$item->user_id}}"
                dateparam="{{date('Y/m/d H:i', strtotime($item->date))}}"
                colsm="6"
                colmd="4">
                    <p slot="card-text" class="card-text">
                        {{$item->description}}
                    <a href="{{route('article', [$item->id, str_slug($item->title)])}}">More...</a>
                    </p>
                </card-article-component>
            @endforeach
        </div>        
        <!--* to pagination -->
        {{$articles}}
    </page-component>
@endsection
