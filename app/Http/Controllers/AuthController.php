<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm(Request $request){
        $role = $request->query('role');
        return view('components.login', compact('role'));
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user(); 

          // Check if the account is inactive
        //   if ($user->status === 'inactive') {
        //     Auth::logout();
        //     return redirect()->back()->withErrors(['email' => 'Your account is inactive. Please contact the admin.']);
        // }
        // dd($user);
        // $user->login_at = now();
        $user->save();

        if ($user->role === 'admin') {
            return redirect()->route('admin.general.dashboard');
        } elseif ($user->role === 'teacher') {
            return redirect()->route('instructor.dashboard');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }
    }

    return redirect()->back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    public function regForm(){
        return view('components.register');
    }
    

    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'firstname' => 'required|string|max:255',
            'secondname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|confirmed|min:8',
            'gender'=>'required|in:male,female',
            'role' => 'required|in:instructor,student',
        ]);


        User::create([
            'firstname' =>$request->firstname,
            'secondname' =>$request->secondname,
            'lastname' =>$request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender'=>$request->gender,
            'role' => $request->role,
            // 'status' => 'inactive' 
        ]);

        return redirect()->route('loginForm')->with('success', 'Registration successful.');
    
    }

    public function logout(Request $request){
        $user = Auth::user();
        $user->save();
        
        Auth::logout();
        return redirect('/');
    }


        // status
        public function updateStatus(Request $request, User $user)
        {
            $request->validate([
                'status' => 'required|in:active,inactive',
            ]);

            $user->status = $request->status;
            $user->save();

            return redirect()->back()->with('status', 'User status updated successfully.');
        }

        // user change password
        public function teacherChangePasswordForm()
        {
            return view('teacher.change_password'); // Ensure this view exists
        }
        public function showChangePasswordForm()
        {
            return view('components.change_password'); // Ensure this view exists
        }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('student.dashboard')->with('success', 'Password changed successfully.');
    }

    
    public function teacherChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('teacher.dashboard')->with('success', 'Password changed successfully.');
    }

    public function admin(){
        return view('admin.general.dashboard');
    }
}
