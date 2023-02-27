<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Admin
    // Message list
    public function messageList()
    {
        $message = Message::select('messages.*', 'users.name as user_name', 'users.image as user_image')
            ->leftjoin('users', 'users.id', 'messages.user_id')
            ->get();
        return view('admin.message.messageList', compact('message'));
    }

    // message Delete
    public function messageDelete($id)
    {
        Message::where('id', $id)->delete();
        return back();
    }
    // Message Details
    public function messageDetails($id)
    {
        $data = Message::select('messages.*', 'users.name as user_name')
            ->leftjoin('users', 'users.id', 'messages.user_id')
            ->where('messages.id', $id)->first();
        return view('admin.message.messageDetails', compact('data'));
    }

    // Admin Reply
    public function adminReply(Request $request)
    {
        Message::where('user_id', $request->userId)->update(['admin_reply' => $request->adminReply]);
        // return redirect()->route('admin#messageList');
        return back();
    }
    // User
    // Contact Page
    public function contactPage()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        return view('user.contact.contact', compact('cart'));
    }

    // Contact Create Data
    public function contactData(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Message::create($data);
        return back()->with(['success' => 'Success send Your Message!']);
    }
}
