@extends("master/index")

@section('title', 'Add Buku')

@section("content")
<div class="container">
    <a href="{{ url('buku/'.$buku->id.'/edit')}}" class="btn btn-primary float-right">Edit Data</a>
    <div class="float-none"></div> <br>
    <div class="form-group">
        <label>Kode Buku</label>
        <input type="text" class="form-control" name="kode_buku" value="{{ $buku->kode_buku}}" disabled>
    </div>
    <div class="form-group">
        <label>Nama Buku</label>
        <input type="text" class="form-control" value="{{ $buku->judul_buku }}" disabled>
    </div>
    <div class="form-group">
        <label>Penerbit</label>
        <input type="text" class="form-control" value="{{ $penerbit->nama_penerbit }}" disabled>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Genre</th>
        </tr>
        @foreach ($dataGenre as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_genre }}</td>
        </tr>
        @endforeach
    </table>
</div>
@stop

@push('js')
<script>
$(".select2").select2();
</script>
@endpush