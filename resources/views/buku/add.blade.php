@extends("master/index")

@section('title', 'Add Buku')

@section("content")
<div class="container">
    <h1>Add Buku</h1>
    <form method='post'>
        @csrf
        <div class="form-group">
            <label>Kode Buku</label>
            <input type="text" class="form-control" name="kode_buku">
        </div>
        <div class="form-group">
            <label>Nama Buku</label>
            <input type="text" class="form-control" name="nama_buku">
        </div>
        <div class="form-group">
            <label>Jumlah Buku</label>
            <input type="text" class="form-control" name="jumlah_buku">
        </div>
        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit">
        </div>
        <div class="form-group">
            <label>Jumlah Halaman</label>
            <input type="text" class="form-control" name="jumlah_halaman">
        </div>
        <div class="form-group">
            <label>Penerbit</label>
            <select class="form-control" name="penerbit">
                @foreach ($dataPenerbit as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <input type="text" class="form-control" name="pengarang_buku">
        </div>
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" class="form-control" name="isbn">
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select name="genre_buku[]" class="form-control select2" multiple="yes">
                {{-- <option>Chicken Soup</option>
                <option>History</option>
                <option>Biografi</option> --}}
                @foreach ($dataGenre as $item)
                <option value="{{ $item->id }}">{{ $item->nama_genre }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type='submit'>Tambah</button>
    </form>
</div>
@stop

@push('js')
<script>
$(".select2").select2();
</script>
@endpush