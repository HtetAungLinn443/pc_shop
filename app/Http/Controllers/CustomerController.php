<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // List Page
    public function listPage()
    {
        $users = User::paginate('5');

        return view('admin.customer.customerList', compact('users'));
    }

    // Filter User List Page
    public function userList()
    {
        $users = User::where('role', 'user')->paginate('5');

        return view('admin.customer.userList', compact('users'));
    }

    // Filter Admin List Page
    public function adminList()
    {
        $users = User::where('role', 'admin')->paginate('5');
        return view('admin.customer.adminList', compact('users'));
    }
    // Delete User
    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return back();
    }

    // User Edit Page
    public function userEditPage($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.customer.userEditPage', compact('user'));
    }
    //  Role Change with ajax
    public function userRoleChange(Request $request)
    {

        $updateData = ['role' => $request->role];
        User::where('id', $request->userId)->update($updateData);

    }

}