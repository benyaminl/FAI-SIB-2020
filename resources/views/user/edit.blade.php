@extends("master/index")

@section('title', 'Edit Users')

@section("content")
<div class="container">
    <h1>Edit Users</h1>
    @include('alert')
    <form method='post' action="{{ url('users/'.$data->id.'/edit') }}">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name='name' value="{{ $data->name }}" required><br/>
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="text" class="form-control" name='email' value="{{ $data->email }}" required><br/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name='password'><br/>
        </div>
        <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control">
                <option value=0 {{ ($data->level_akses == 0) ? 'selected': '' }}>Admin</option>
                <option value=1 {{ ($data->level_akses == 1) ? 'selected': '' }}>User</option>
            </select>
        </div>
        <button type='submit'>Edit Users</button>
    </form>
</div>
@stop