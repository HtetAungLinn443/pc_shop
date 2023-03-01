@extends('admin.layout.index')

@section('title', 'Message List Page')

@section('content')
    <main>
        <div class="message__container">
            <div class="message__header">
                <h3>Message List</h3>
                <p>Total Message : <span>{{ $message->count() }}</span></p>
            </div>
            @if ($message->count() != 0)
                <table class="message__table">
                    <thead>
                        <tr>
                            <th class="message__tb-id">ID</th>
                            <th class="message__userImg">Image</th>
                            <th class="message__tb-username">User Name</th>
                            <th class="message__tb-email">Email</th>

                            <th class="message__tb-btnGroup"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if ($m->user_image == null)
                                            <img src="{{ asset('admin/image/default_user.webp') }}" style="width: 40px">
                                        @else
                                            <img src="{{ asset('storage/' . $m->user_image) }}" style="width: 40px">
                                        @endif
                                    </div>

                                </td>
                                <td>
                                    {{ $m->user_name }}
                                </td>
                                <td>
                                    {{ $m->email }}
                                </td>

                                <td class="message__btn">
                                    <a href="{{ route('admin#messageDetails', $m->id) }}" class="view">
                                        <span class="material-symbols-sharp">
                                            info
                                        </span>
                                    </a>
                                    <a href="{{ route('admin#messageDelete', $m->id) }}" class="delete">
                                        <span class="material-symbols-sharp">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <h1 class="text-center py-4 my-5 bg-warning rounded text-danger shadow">There is Message</h1>
            @endif
        </div>
    </main>
@endsection
