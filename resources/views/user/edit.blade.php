@extends("master/index")

@section('title', 'Edit Genre')

@section("content")
    <h1>Edit Genre</h1>
    <form method='post' action="{{ url('genre/'.$data['id'].'/edit') }}">
        @method("PATCH")
        @csrf
        <div class="form-group">
        <label>Nama Genre<label>
        <input name='nama_genre' value="{{ $data['nama'] }}" class="form-control" required>
        </div>
        <button type='submit' class="btn btn-info">Edit</button>
    </form>
@stop