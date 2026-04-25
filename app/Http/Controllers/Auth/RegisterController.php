<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login'; 

    public function __construct()
    {
        $this->middleware('guest');
    }

   
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'    => ['required', 'numeric', 'digits_between:10,11'], 
            'birthday' => ['required', 'date'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'required' => 'You must fill in the information in this box', 
            'email'    => 'Invalid data: @gmail.com', 
            'numeric'  => 'Please enter the correct phone number format', 
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'fullname'   => $data['fullname'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'birthday'   => $data['birthday'],
            'password'   => Hash::make($data['password']),
            'status'     => 'Pending', // Chờ admin duyệt theo kịch bản Test Case
            'url_avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($data['fullname']),
        ]);
    }

  
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        
        return redirect()->route('login')->with('success', 'Successful registration, Your account will be approved by the administrator !');
    }
}