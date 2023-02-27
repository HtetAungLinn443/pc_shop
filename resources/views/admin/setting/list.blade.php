@extends('admin.layout.index')

@section('title', 'Settings')

@section('content')
    <main class="setting">
        <div class="setting-container">
            <div class="box">
                <p class="icon"><i class="fa-solid fa-user"></i></p>
                <h2>Profile</h2>
                <a href="{{ route('setting#profile') }}"><i class="fa-solid fa-check"></i></a>
            </div>
            <div class="box">
                <p class="icon"><i class="fa-solid fa-lock"></i></p>
                <h2>Change Password</h2>
                <a href="{{ route('setting#changePwPage') }}"><i class="fa-solid fa-check"></i></a>
            </div>
        </div>
    </main>
@endsection
