@extends('user.layouts.index')

@section('title', 'Contact')

@section('content')
    <section class="contactPage">
        <h1>Contact Us</h1>
        <div class="contactTitle">
            <h3>Leave us a Message</h3>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                <i class="fa-solid fa-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="contactBox">
            <p>Feel free to leave us a message. our support team will get in touch with you as soon as possible.</p>
            <form action="{{ route('user#contactData') }}" method="post">
                @csrf
                <div class="contactForm row">
                    <div class="contactInput col-12 py-3">
                        <label for="" class=" form-label">Email</label>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" class=" form-control"
                            placeholder="Ender Your Email">
                    </div>
                    <div class="contactInput col-12 py-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea name="message" class=" form-control" id="message" cols="30" rows="10" placeholder="Ender Message"
                            autofocus></textarea>
                    </div>
                    <div class="contactBtn col-12">
                        <button class="sendBtn">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
