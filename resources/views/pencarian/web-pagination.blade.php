@extends("master/index")

@section('title', 'Cari Buku')

@section('content')
<div class="container">
    <h1>Cari Buku</h1>
    <br/>
    @include('alert')
    <form method="get">
        <div class="form-group">
        <label>Kata kunci</label>
        <input type="text" class="form-control" name="nama" value="{{ $nama ?? '' }}"> 
        <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if (isset($data))
    <table id="table" border="1px" class="table table-bordered">
        <thead>
            <tr><th>Nama</th></tr>
        </thead>
        <tbody>
        @foreach($data as $d) 
            <tr>
                <td>{{ $d->judul_buku }}</td>
            </tr>
        @endforeach
        @if ($data->count() <= 0)
            <tr>
                <td>Tidak ada buku ditemukan dengan kata kunci {{ $nama ?? '' }}</td>
            </tr>
        @endif
        </tbody>
    </table>
    {{-- Ini Nampilan Link Paginasi! --}}
    {{ $data->links() }}
    @else
    <h3>Silahkan ketikan kata kunci di form pencarian!</h3>
    @endif
</div>
@stop