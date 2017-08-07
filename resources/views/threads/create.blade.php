@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Nový článok</h2></div>

                <form action="{{ url('threads') }}" method="post"> {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nadpis</label>
                        <input class="form-control" name="title" placeholder="Nadpis článku" required>
                    </div>
                    <div class="form-group">
                        <label for="">Text článku</label>
                        <textarea id="article-ckeditor" placeholder="text článku" rows="7" required name="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Uložiť</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endpush
