@extends("master/index")

@section('title', 'Halaman List Buku')

@section('content')
<div class="container">
    <h1>Master Buku</h1>
    <br/>
    <a href="{{ url("buku/add-form") }}" class="btn btn-info float-right">Add Buku</a>
    <br/><br/><br/>
    @include('alert')
    <table id="table" border="1px" class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nama</th><th>Action</th></tr>
        </thead>
        <tbody>
        @foreach($data as $d) 
            <tr>
                <td>{{ $d->id }}</td>
                {{-- <td>{{ $d["id"] }}</td> --}}
                <td>{{ $d->judul_buku }}</td>
                <td>
                    <a href="{{ url("buku/".$d->id) }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url("buku/".$d->id."/edit") }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ url("buku/".$d->id."/delete") }}" class="d-inline">
                        @method("DELETE")
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Ini Die Dump! --}}
    {{-- {{ dd($data) }} --}}
</div>
@stop

{{-- @see https://laravel.com/docs/7.x/blade#stacks --}}
@push('js')
<script>
$("#table").dataTable();
</script>
@endpush