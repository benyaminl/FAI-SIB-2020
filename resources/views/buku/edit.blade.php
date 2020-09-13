@extends("master/index")

@section('title', 'Edit Buku')

@section("content")
    <h1>Edit Buku</h1>
    <form method='post'>
        @method("PATCH")
        @csrf
        <label>Nama Buku<label>
        <input type="hidden" name="id" value="{{ $data->id }}">
        <input name='nama_buku' value="{{ $data->nama }}" required><br/>
        <button type='submit'>Edit</button>
    </form>
@stop