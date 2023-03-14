<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

class SettingController extends Controller
{
    // Admin
    // List Page
    public function ListPage()
    {
        return view('admin.setting.list');
    }

    // profile Page
    public function profilePage()
    {
        return view('admin.setting.profile');
    }

    // edit Profile
    public function editProfile()
    {
        return view('admin.setting.editProfile');
    }

    // Update Profile data
    public function updateProfile(Request $request)
    {
        $this->checkUserData($request);
        $data = $this->updateProfileData($request);
        if ($request->hasFile('image')) {
            $dbImage = Auth::user()->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        }
        User::where('id', Auth::user()->id)->update($data);
        return redirect()->route('setting#profile')->with(['updateSuccess' => 'Account Update Success']);
    }

    // Change Password Page
    public function changePasswordPage()
    {
        return view('admin.setting.changePassword');
    }
    // Change password Data
    public function changePassword(Request $request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword|min:6',
        ])->validate();

        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth::user()->id)->update($data);
            Auth::logout();
            return redirect()->route('auth#loginPage');
        }
        return back()->with(['notMatch' => 'The Old Password not Match. Try Again!']);

    }

    // Check User Data
    private function checkUserData($request)
    {
        Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,webp,jfif,pjpeg,pjp|file',
        ])->validate();

    }
    // Update Profile Data
    private function updateProfileData($request)
    {
        return [
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ];
    }

    // user
    // account
    public function userAccount()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        return view('user.account.accountList', compact('cart'));
    }

    // Profile
    public function userProfile()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        return view('user.account.profile', compact('cart'));
    }

    // Edit Profile
    public function userEditProfile()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        return view('user.account.editProfile', compact('cart'));
    }

    // Edit Profile Data
    public function editProfileData(Request $request)
    {
        // dd($request->toArray());
        $this->profileValidationCheck($request);
        $data = $this->userUpdateProfileData($request);
        if ($request->hasFile('image')) {
            $dbImage = Auth::user()->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        }
        User::where('id', Auth::user()->id)->update($data);

        return redirect()->route('user#profile')->with(['updateSuccess' => 'Profile Update Success']);
    }

    // user Change Password
    public function userChangePassword()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.account.changePassword', compact('cart'));
    }
    // Direct change Password
    public function changePasswordData(Request $request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword|min:6',
        ])->validate();

        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth::user()->id)->update($data);
            Auth::logout();
            return redirect()->route('auth#loginPage');
        }
        return back()->with(['notMatch' => 'The Old Password not Match. Try Again!']);

    }

    // Contact Message Page
    public function contactMessagePage()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        $message = Message::where('user_id', Auth::user()->id)->get();
        return view('user.account.contactMessage', compact('cart', 'message'));
    }

    // Profile Validation Check
    private function profileValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,webp|file',
        ], ['image.mimes' => 'Only can upload image file type'])->validate();
    }

    // user update profile
    private function userUpdateProfileData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ];
    }

}
