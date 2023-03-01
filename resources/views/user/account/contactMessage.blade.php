@extends('user.layouts.index')

@section('title', 'Contact')

@section('content')
    <section class="contactMessage">
        <h2 class="text-center">Contact Us</h2>

        <div class="chatContainer">
            <div class="chatBox">
                <div class="adminSMS">
                    <p>{{ $message->message }}</p>
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('admin/image/default_user.webp') }}" alt="">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                    @endif
                </div>
                @if ($message->admin_reply != null)
                    <div class="userSMS">
                        <img src="{{ asset('admin/image/title.png') }}" alt="">
                        <p>{{ $message->admin_reply }}</p>
                    </div>
                @endif
            </div>

        </div>

    </section>
@endsection

@section('script')
    <script></script>
@endsection
