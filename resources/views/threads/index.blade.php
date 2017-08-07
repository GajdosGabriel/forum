@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @forelse($threads as $thread)
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url($thread->path()) }}"><h3>{{ $thread->title }}</h3>{{ $thread->user->name }}</a><span class="pull-right">Komentárov {{ $thread->replies_count }}</span></div>

                <div class="panel-body">
                    {!! htmlspecialchars_decode ($thread->body) !!}
                    <strong class="pull-right">{{ $thread->created_at->diffForHumans() }}</strong>
                </div>
            </div>
        </div>
            @empty
        @endforelse
    </div>
</div>
@endsection
