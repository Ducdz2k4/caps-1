<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login'; 

    public function construct()
    {
        $this->middleware('guest');
    }

    
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'    => ['required', 'string'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
        ]);
    }

   
    protected function create(array $data)
    {
 
        $newUser = User::create([
            'fullname' => $data['fullname'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
            'url_avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($data['fullname']),
            'status'   => 'Active', 
        ]);

       
        Mail::to($newUser->email)->send(new WelcomeMail($newUser));

        
        return $newUser;
    }
}