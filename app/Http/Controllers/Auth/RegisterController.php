<?php

namespace App\Http\Controllers\Auth;

use App\Classes\BlockIo;
use App\Models\Balance;
use App\Models\Currency;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * @var BlockIo
     */
    protected $btc;
    /**
     * @var BlockIo
     */
    protected $ltc;
    /**
     * @var BlockIo
     */
    protected $doge;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->btc = new BlockIo(setting('btc_api'),setting('blockio_pin'));
        $this->ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
        $this->doge = new BlockIo(setting('doge_api'),setting('blockio_pin'));
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user = User::create([
            'role_id' => Role::where('slug','user')->first()->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 1
        ]);

        $user->escrow()->updateOrCreate([
            'btc' => 0,
        ])->user->kyc()->updateOrCreate([
            'id_status' => 'not_submit',
        ]);

        $btc = $this->btc->get_new_address();
        $ltc = $this->ltc->get_new_address();
        $doge = $this->doge->get_new_address();

        $user->wallet()->create([
           'btc_address' =>  $btc->data->address,
            'ltc_address' => $ltc->data->address,
            'doge_address' => $doge->data->address,
            'usd' => 0,
            'naira' => 0
        ]);

        $currencies = Currency::all();
        foreach ($currencies as $currency) {
            Balance::create([
                'user_id' => $user->id,
                'currency_id' => $currency->id,
                'balance'  => 0,
                'escrow'   => 0
            ]);
        }
        return $user;
    }
}
