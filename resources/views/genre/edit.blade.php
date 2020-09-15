@extends("master/index")

@section('title', 'Edit Genre')

@section("content")
<div class="container">
    <h1>Edit Genre</h1>
    <form method='post' action="{{ url('genre/'.$data->id.'/edit') }}">
        @method("PATCH")
        @csrf
        <div class="form-group">
        <label>Nama Genre</label>
        <input type="text" name='nama_genre' id="nama" value="{{ $data->nama_genre }}" class="form-control" required>
        </div>
        <button type='submit' class="btn btn-info">Edit</button>
        
    </form>
</div>
@stop