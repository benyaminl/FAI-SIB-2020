@extends("master/index")

@section('title', 'Add Buku')

@section("content")
<div class="container">
    <h1>Add Buku</h1>
    <form method='post'>
        @csrf
        <div class="form-group">
            <label>Nama Buku</label>
            <input type="text" class="form-control" name="nama_buku">
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select name="genre_buku" class="form-control select2" multiple="multiple">
                <option>Chicken Soup</option>
                <option>History</option>
                <option>Biografi</option>
            </select>
        </div>
        <button type='submit'>Tambah</button>
    </form>
</div>
@stop

@push('js')
<script>
$(".select2").select2();
</script>
@endpush