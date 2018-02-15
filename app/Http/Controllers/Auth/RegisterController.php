<?php

namespace App\Http\Controllers\Auth;
use DB;
use DateTime;
use App\User;
use App\Member;
use App\Http\Controllers\Controller;
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
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //Generate New Coupons using the stored procedure
        DB::unprepared('call ecopoints10()');


         $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);

        $member = new Member;

        // Increase next member ID to 1
        $id = DB::table('members')->max('id') + 1;

        $member->fill([

            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email_address' => $data['email'],

        ]);

        $member->save([$user]);

        // Add 10 ecopoints to new members
        $coupons = ['denomination' => '10', 'serial_number' => 0, 'merchant_id' => 1, 'coupon_design_id' => '3', 'transaction_id' => 1, 'member_id' => $id, 'created_at' => new DateTime ];

        DB::table('coupons')->insert($coupons);
        // End of adding free 10 ecopoints

        return $user;

        
    }
}
