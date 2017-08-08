@extends('layouts.app')

@section('content')
<thread :data="{{ $thread }}"></thread>


    <thread-view  :initial-replies-count="{{ $thread->replies()->count() }}" inline-template>
<div class="container">

        <replies :data="{{$thread->replies}}" @removed="repliesCount--" @added="repliesCount++" ></replies>

        <div class="col-lg-3 bublina">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>User Report</h3></div>
                <div class="panel-body">Počet komentárov: <strong style="font-size: 200%"v-text="repliesCount"></strong>

                    <div class="form-group">
                        <label for="5">Display Title</label>
                        <input @click="offTitle" id="5" type="checkbox" v-model="displayTitle">
                        <br>
                        <label for="displayComments">Display Comments</label>
                        <input id="displayComments" type="checkbox" v-model="displayComments">
                    </div>


                </div>
            </div>
        </div>


</div>

    </thread-view>

@endsection
