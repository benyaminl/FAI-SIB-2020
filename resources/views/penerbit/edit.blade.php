@extends("master/index")

@section('title', 'Edit Penerbit')

@section("content")
<div class="container">
    <h1>Edit Penerbit</h1>
    @include('alert')
    <form method='post' action="{{ url('penerbit/'.$data->id.'/edit') }}" enctype="multipart/form-data">
        @method("PATCH")
        @csrf
        <div class="form-group">
            <label>Nama Penerbit</label>
            <input type="text" class="form-control" name='nama_penerbit' value="{{ $data->nama_penerbit }}" required><br/>
        </div>
        <div class="form-group">
            <label>Alamat Penerbit</label>
            <input type="text" class="form-control" name='alamat_penerbit' value="{{ $data->alamat_penerbit }}" required><br/>
        </div>
        <div class="form-group">
            <label>Email Penerbit</label>
            <input type="text" class="form-control" name='email' value="{{ $data->email }}" required><br/>
        </div>
        <div class="form-group">
            <label>Telepon Penerbit</label>
            <input type="text" class="form-control" name='telepon' value="{{ $data->telepon }}" required><br/>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            {{-- <input type="text" class="form-control" name='gambar' value="{{ $data->gambar }}" required><br/> --}}
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type='submit' class="btn btn-info">Edit</button>
        
    </form>
</div>
@stop