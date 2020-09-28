@extends("master/index")

@section('title', 'Add Genre')

@section("content")
<div class="container">
    <h1>Add Genre</h1>
    <form method='post'>
        @csrf
        <div class="form-group">
            <label>Nama Genre</label>
            <input type="text" class="form-control" name='nama_genre' required><br/>
        </div>
        <button type='submit'>Tambah</button>
    </form>
</div>
@stop