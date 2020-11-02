<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    @include('alert')
    <form method="POST">
        @csrf 
        <label>Email</label> <input type="email" name="email" value="{{ old('email') }}"><br/>
        <label>Password</label> <input type="password" name="password" value="{{ old('password') }}"><br/>
        <button>@lang('Log in')</button>
    </form>
</body>
</html>