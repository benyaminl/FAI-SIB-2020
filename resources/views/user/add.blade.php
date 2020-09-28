@extends("master/index")

@section('title', 'Add Users')

@section("content")
<div class="container">
    <h1>Add Users</h1>
    @include('alert')
    <form method='post' action="{{ url('users/add') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name='name' value="{{ old('name') }}" required><br/>
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="text" class="form-control" name='email' value="{{ old('email') }}" required><br/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name='password' value="{{ old('password') }}" required><br/>
        </div>
        <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control">
                <option value=0>Admin</option>
                <option value=1>User</option>
            </select>
        </div>
        <button type='submit'>Tambah Users</button>
    </form>
</div>
@stop