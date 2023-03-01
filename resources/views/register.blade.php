<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/image/title.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/css/register.css') }}">
</head>

<body>
    <div class="container">
        <div class="form">
            <h1>Register Form</h1>
            @error('terms')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="username input-box">
                    <label for="username">User Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class=" @error('name') input-error @enderror" id="username" placeholder="Ender Your Name"
                        autocomplete="name" autofocus>
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="email input-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="Ender Your Email">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="phone input-box">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone" id="phone" value="{{ old('phone') }}"
                        placeholder="Ender Your Phone Number">
                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="address input-box">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10" placeholder="Ender Your Address">{{ old('address') }}</textarea>
                    @error('address')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="gender input-box">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="password input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Ender Your Password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="confirmPassword input-box">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Ender Your Password Again">
                    @error('password_confirmation')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button class="button" type="submit">Register</button>

            </form>
            <a href="{{ route('auth#loginPage') }}" class="swift-form">Sign In Here</a>
        </div>

    </div>
</body>

</html>
