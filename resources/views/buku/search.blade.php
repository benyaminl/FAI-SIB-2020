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
                {{-- <td>{{ $d->id }}</td> --}}
                {{-- <td>{{ $d["id"] }}</td> --}}
                <td>{{ $d->judul_buku }}</td>
                {{-- <td>
                    <a href="{{ url("buku/".$d->id) }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url("buku/".$d->id."/edit") }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ url("buku/".$d->id."/delete") }}" class="d-inline">
                        @method("DELETE")
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td> --}}
            </tr>
        @endforeach
        @if ($data->count() <= 0)
            <tr>
                <td>Tidak ada buku ditemukan dengan kata kunci {{ $nama ?? '' }}</td>
            </tr>
        @endif
        </tbody>
    </table>
    @else
    <h3>Silahkan ketikan kata kunci di form pencarian!</h3>
    @endif
    {{-- Ini Die Dump! --}}
    {{-- {{ dd($data) }} --}}
</div>
@stop