<?php

namespace SaveLife\Http\Controllers\Auth;

use SaveLife\User;
use SaveLife\Donor;
use SaveLife\Bank;
use Illuminate\Support\Facades\DB;
use SaveLife\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|digits:10|unique:users',
            'category' => 'required|in:donor,bank',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($data['category'] == 'bank') {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|digits:10|numeric|unique:users',
                'category' => 'required|in:donor,bank',                
                'address' => 'required',
                'district' => 'required',
                'state' => 'required',
                'pincode' => 'required|numeric|digits:6',
                'password' => 'required|string|min:6|confirmed',
            ]); 
        }
        return $validator;      
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \SaveLife\User
     */
    protected function create(array $data)
    {
        if($data['category'] == 'donor') {
            $category_id = DB::table('categories')->where('name','LIKE','Donor')->first();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'category_id' => $category_id->id,
                'password' => bcrypt($data['password']),
            ]);
            $user_id = $user->id;
            Donor::create([
                'user_id' => $user_id,
                'blood_group' => $data['bloodgroup'],
            ]);
            return $user;
        }
        else {
            $category_id = DB::table('categories')->where('name','LIKE','Blood Bank')->first();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'category_id' => $category_id->id,
                'password' => bcrypt($data['password']),
            ]);
            $user_id = $user->id;
            Bank::create([
                'user_id' => $user_id,
                'address' => $data['address'],
                'district' => $data['district'],
                'state' => $data['state'],
                'pincode' => $data['pincode'],
            ]);
            return $user;
        }        
    }
}
