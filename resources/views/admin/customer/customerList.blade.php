@extends('admin.layout.index')

@section('title', 'Customer List')

@section('content')
    <main>
        <div class="filter-member">
            <a href="{{ route('customer#listPage') }}" class="{{ Request::is('customer/listPage') ? 'active' : '' }}">
                <span>All</span>
            </a>
            <a href="{{ route('customer#userList') }}" class="{{ Request::is('customer/userList') ? 'active' : '' }}">
                <span>Members</span>
            </a>
            <a href="{{ route('customer#adminList') }}" class="{{ Request::is('customer/adminList') ? 'active' : '' }}">
                <span>Admins</span>
            </a>
        </div>
        <div class="customer__title">
            <h3 class="member">All</h3>

            <div class="customer__total-user">
                Total members: <span>{{ $users->total() }}</span>
            </div>
        </div>
        @if ($users->total() != 0)
            <table class="customer__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <div class="table__img">
                                    @if ($user->image == null)
                                        <img src="{{ asset('admin/image/default_user.webp') }}" alt="{{ $user->name }}">
                                    @else
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}">
                                    @endif
                                </div>

                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td class=" text-capitalize">{{ $user->role }}</td>
                            <td class="">
                                <div class="btn-group">
                                    @if ($user->id == Auth::user()->id)
                                    @else
                                        <a href="{{ route('customer#userEditPage', $user->id) }}" class="edit">
                                            <span class="material-symbols-sharp">
                                                edit
                                            </span>
                                        </a>
                                        <a href="{{ route('customer#deleteUser', $user->id) }}" class="delete">
                                            <span class="material-symbols-sharp">
                                                delete
                                            </span>
                                        </a>
                                    @endif


                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @else
            <h1>There is no User</h1>
        @endif
        <div class="mt-3">{{ $users->links() }}</div>
    </main>


@endsection
