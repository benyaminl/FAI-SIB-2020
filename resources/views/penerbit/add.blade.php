@extends("master/index")

@section('title', 'Add Penerbit')

@section("content")
<div class="container">
    <h1>Add Penerbit</h1>
    @include('alert')
    <form method='post'>
        @csrf
        <div class="form-group">
            <label>Nama Penerbit</label>
            <input type="text" class="form-control" name='nama_penerbit' value="{{ old('nama_penerbit') }}" required><br/>
        </div>
        <div class="form-group">
            <label>Alamat Penerbit</label>
            <input type="text" class="form-control" name='alamat_penerbit' value="{{ old('alamat_penerbit') }}" required><br/>
        </div>
        <div class="form-group">
            <label>Email Penerbit</label>
            <input type="text" class="form-control" name='email' value="{{ old('email') }}" required><br/>
        </div>
        <div class="form-group">
            <label>Telepon Penerbit</label>
            <input type="text" class="form-control" name='telepon' value="{{ old('telepon') }}" required><br/>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="text" class="form-control" name='gambar' value="{{ old('gambar') }}" required><br/>
        </div>
        <button class="btn btn-primary" type='submit'>Tambah</button>
    </form>
</div>
@stop