@extends('master.index')

@section('title', "List Genre")

@section('content')
<div class="container">
    <h1>List User</h1>
    <a href="{{ url("user/add") }}" class="btn btn-info float-right">Add Genre</a>
    <br/><br/><br/>
    @include('alert')
    <table id="table" border="1px" class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nama</th><th>Action</th></tr>
        </thead>
        <tbody>
        @foreach($data as $d) 
            <tr>
                <td>{{ $d["id"] }}</td>
                {{-- <td>{{ $d["id"] }}</td> --}}
                <td>{{ $d["nama"] }}</td>
                <td>
                    <a class="btn btn-info" href="{{ url('genre/'.$d['id'].'/edit') }}">Edit</a>

                    <form method="POST" action="{{ url('genre/'.$d['id']) }}" class="d-inline">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

{{-- @see https://laravel.com/docs/7.x/blade#stacks --}}
@push('js')
<script>
$("#table").dataTable();
</script>
@endpush