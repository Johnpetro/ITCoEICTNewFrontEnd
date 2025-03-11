<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

       // Store user messages
       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'email' => 'required|email',
               'subject' => 'required',
               'message' => 'required',
           ]);
   
           Message::create($request->all());
   
           return redirect()->back()->with('success', 'Your message has been sent.');
       }
   
       // Show messages in the admin dashboard
       public function index()
       {
        $messages = Message::latest()->paginate(4);
           return view('admin.messages.index', compact('messages'));
       }


       public function destroy($id)
        {
            $message = Message::findOrFail($id);
            $message->delete();

            return redirect()->back()->with('success', 'Message deleted successfully.');
        }


       
}
