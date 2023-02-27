<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/image/title.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/css/register.css') }}">

</head>

<body>
    <div class="container">
        <div class="form">
            <h1>Login Form</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="email input-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="Ender Your Email">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="password input-box">
                    <label for="Password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Ender Your Password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button class="button" type="submit">Login</button>
            </form>
            <a href="{{ route('auth#registerPage') }}" class="swift-form">Create Account</a>
        </div>
    </div>
</body>

</html>
