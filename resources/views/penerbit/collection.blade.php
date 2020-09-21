@extends('master.index')
@section('title', "Collection Penerbit")

@section('content')
<form method="POST">
    @csrf
    <div class="form-group">
        <label>Nama String</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <button>Add</button>
</form>
<h1>List Collection</h1>
@foreach ($data as $item)
{{ $item }}    
@endforeach
@endsection