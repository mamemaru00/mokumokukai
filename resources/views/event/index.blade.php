@extends('layouts.app')

@section('content')
<style>
    #mokumoku-lists{
        filter:drop-shadow(2px 4px 6px #000);
    }
    .content-filed {
        width: 60%;
    }
</style>
{{--ナビゲーション--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light container">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('event.index') }}">もくもく会</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mokumoku" aria-controls="mokumoku" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mokumoku">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('event.index') }}">一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">開催する</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- もくもく会開催一覧リスト --}}
    @foreach($events as $event)
        <p>{{ $event->event_id }}</p>
        <p>{{ $event->category_id }}</p>
        <p>{{ $event->title }}</p>
        <p>{{ $event->date }}</p>
        <p>{{ $event->start_time }}</p>
        <p>{{ $event->end_time }}</p>
        <p>{{ $event->content }}</p>
        <p>{{ $event->entry_id }}</p>
    @endforeach
@endsection