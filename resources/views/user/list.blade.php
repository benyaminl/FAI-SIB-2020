@extends('master.index')

@section('title', "List User")

@section('content')
<div class="container">
    <h1>List User</h1>
    <a href="{{ url("users/add") }}" class="btn btn-info float-right">Add User</a>
    <br/><br/><br/>
    @include('alert')
    <table id="table" border="1px" class="table table-bordered">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $d) 
            <tr>
                <td>{{ $d->email }}</td>
                {{-- <td>{{ $d["id"] }}</td> --}}
                <td>{{ $d->name }}</td>
                <td>{{ ($d->level_akses == 0) ? 'Admin' : 'User' }}</td>
                <td>
                    <a class="btn btn-info" href="{{ url('users/'.$d->id.'/edit') }}">Edit</a>

                    <form method="POST" action="{{ url('users/'.$d->id) }}" class="d-inline">
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