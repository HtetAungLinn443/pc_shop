@extends('admin.layout.index')

@section('title', 'Message Details')

@section('content')
    <main>
        <div class="message__container">
            <div class="message__header">
                <h3>Message Details</h3>
            </div>
            <div class="message__details">
                <div class="my-2">
                    <a href="{{ route('customer#userEditPage', $data->user_id) }}">Name : <span
                            class="success">{{ $data->user_name }}</span></a>
                </div>
                <div class="my-2">
                    <a href="{{ route('customer#userEditPage', $data->user_id) }}">Email : <span
                            class="success">{{ $data->email }}</span>
                    </a>
                </div>
                <div class="userSMS">
                    {{ $data->message }}
                </div>
                @if ($data->admin_reply != null)
                    <div class="userSMS">
                        {{ $data->admin_reply }}
                    </div>
                @endif
                @if ($data->admin_reply == null)
                    <form action="{{ route('admin#adminReply') }}" method="post">
                        @csrf
                        <input type="hidden" name="userId" value="{{ $data->user_id }}">
                        <div class="my-3">
                            <textarea name="adminReply" class=" form-control" id="" cols="30" rows="5"
                                placeholder="Ender Message"></textarea>
                        </div>
                        <button class="sendBtn">Send</button>
                    </form>
                @endif
            </div>
        </div>
    </main>
@endsection
