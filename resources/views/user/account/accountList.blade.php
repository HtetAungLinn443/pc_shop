@extends('user.layouts.index')

@section('content')
    <section class="accountList">
        <h2>My Account List</h2>
        <div class="accountContainer">
            <a href="{{ route('user#profile') }}">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-user"></i></div>
                    <div class="">Profile</div>
                </div>
            </a>
            <a href="{{ route('user#changePassword') }}">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-lock"></i></div>
                    <div class="">Change Password</div>
                </div>
            </a>
            <a href="{{ route('user#contactMessagePage') }}">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-headset"></i></div>
                    <div class="">Contact Message</div>
                </div>
            </a>
        </div>
    </section>
@endsection
