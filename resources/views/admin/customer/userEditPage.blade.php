@extends('admin.layout.index')

@section('title', 'Customer List')

@section('content')
    <main>
        <div class="row">
            <div class="col-9 offset-1 " style="margin-top: 6.5rem ">
                <a class=" fs-3 bg-dark text-white px-2 rounded " style="cursor: pointer" onclick='history.back()'>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div class="row mt-3">
                    <div class="col-md-4 col-sm-12 mb-3">
                        <img src="{{ asset('admin/image/default_user.webp') }}" class=" img-thumbnail p-2" alt="">
                    </div>
                    <div class="col-md-8 col-sm-12 ps-5  rounded userDetails_font">
                        <div class=" mt-5 row">
                            <span class="col-2">Name : </span>
                            <span class="col-7">{{ $user->name }}</span>
                        </div>
                        <div class=" mt-2 row">
                            <span class="col-2">Email : </span>
                            <span class="col-7">{{ $user->email }}</span>
                        </div>
                        <div class=" mt-2 row">
                            <span class="col-2">Phone : </span>
                            <span class="col-7">{{ $user->phone }}</span>
                        </div>
                        <div class=" mt-2 row">
                            <span class="col-2">Address : </span>
                            <span class="col-7">{{ $user->address }}</span>
                        </div>
                        <div class=" mt-2 row">
                            <span class="col-2">Gender : </span>
                            <span class="col-7 text-capitalize">{{ $user->gender }}</span>
                        </div>
                        <div class=" mt-3 row">
                            <span class="col-2">Role :</span>
                            <select name="role" class="col-7 form-control w-25" id="role-change">

                                <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                                <option value="user" @if ($user->role == 'user') selected @endif>User</option>
                            </select>
                            <input type="hidden" class="user-id" value="{{ $user->id }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#role-change').change(function() {
                $changeRole = $(this).val();
                $userId = $('.user-id').val();

                $data = {
                    'userId': $userId,
                    'role': $changeRole,
                }
                $.ajax({
                    type: "get",
                    url: '/customer/userChangeRole',
                    data: $data,
                    dataType: 'json'
                })
                location.reload();
            })
        })
    </script>
@endsection
