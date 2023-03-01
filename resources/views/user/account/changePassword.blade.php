@extends('user.layouts.index')

@section('title', 'Account')

@section('content')
    <section class="changePassword">

        <div class="changePasswordContainer">
            <h2 class=" text-center">Change Password</h2>
            @if (session('notMatch'))
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('notMatch') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <form action="{{ route('user#changePasswordData') }}" method="post">
                @csrf
                <div class="my-2">
                    <label for="oldPassword" class=" form-label">Old Password</label>
                    <div class="passwordContainer">
                        <input type="password" name="oldPassword" id="oldPassword"
                            class="form-control @error('oldPassword') is-invalid @enderror" placeholder="Ender Old Password"
                            autofocus>
                        <i class="fa fa-eye-slash old-toggle-icon"></i>
                    </div>
                    @error('oldPassword')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="newPassword" class=" form-label">New Password</label>
                    <div class="passwordContainer">
                        <input type="password" name="newPassword" id="newPassword"
                            class="form-control @error('newPassword') is-invalid @enderror"
                            placeholder="Ender New Password">
                        <i class="fa fa-eye-slash new-toggle-icon"></i>
                    </div>
                    @error('newPassword')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="confirmPassword" class=" form-label">Confirm Password</label>
                    <div class="passwordContainer">
                        <input type="password" name="confirmPassword" id="confirmPassword"
                            class="form-control @error('confirmPassword') is-invalid @enderror"
                            placeholder="Ender Confirm Password">
                        <i class="fa fa-eye-slash confirm-toggle-icon"></i>
                    </div>
                    @error('confirmPassword')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <button class="updateBtn">Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.old-toggle-icon').click(function() {
                var passwordField = $('#oldPassword');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });

            $('.new-toggle-icon').click(function() {
                var passwordField = $('#newPassword');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });

            $('.confirm-toggle-icon').click(function() {
                var passwordField = $('#confirmPassword');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
@endsection
