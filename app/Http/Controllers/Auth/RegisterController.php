<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Roles;
use App\Constants;
use App\Services\Helper;
use App\Events\NewUserRegistered;


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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $roleName = Constants::USER_ROLE_NAMES[$data['role_name']];

        if ($roleName == 'company') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
                'PHONE' => ['required', 'max:255'],
                'COUNTRY' => ['required', 'string', 'max:255'],
                'CITY' => ['required', 'string', 'max:255'],
                'EMPLOYEE_CNT' => ['required', 'max:255'],
                'WEB_SITE' => ['required', 'string', 'max:255'],
                'DESCRIPTION' => ['required', 'max:2500'],
            ]);

        } elseif ($roleName == 'candidate') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
                'PHONE' => ['required', 'max:255'],
                'COUNTRY' => ['required', 'string', 'max:255'],
                'CITY' => ['required', 'string', 'max:255'],

                'CATEGORY_ID' => ['required'],
                'LEVEL' => ['required'],
                'YEARS_EXPERIENCE' => ['required'],
                'SALARY' => ['required', 'max:20'],
                'EXPERIENCE' => ['required', 'max:2500'],
                'EDUCATION' => ['required', 'max:2500'],
                'SKILLS' => ['required'],
                'LANGUAGES' => ['required'],
                'ABOUT_ME' => ['required', 'max:2500'],
            ]);


        } else {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $roleName = Constants::USER_ROLE_NAMES[$data['role_name']];
        //$roleId = Helper::getRoleIdByName($roleName);
        $roleId = Constants::USER_ROLES_IDS[$roleName];

        $iconNumber = mt_rand(0, 5);

        if ($roleName == 'company') {

            $arrUserFields = [
                'NAME' => $data['name'],
                'ICON' => Constants::DEMO_ICONS[$iconNumber],
                //'IMAGE' => $data['IMAGE'],
                'EMAIL' => $data['email'],
                'PHONE' => $data['PHONE'],
                'COUNTRY' => $data['COUNTRY'],
                'CITY' => $data['CITY'],
                'EMPLOYEE_CNT' => $data['EMPLOYEE_CNT'],
                'WEB_SITE' => $data['WEB_SITE'],
                'DESCRIPTION' => $data['DESCRIPTION'],
                'password' => Hash::make($data['password']),
                'role_id' => $roleId,
            ];

//            $newUser = User::create([
//                'NAME' => $data['name'],
//                'ICON' => Constants::DEMO_ICONS[$iconNumber],
//                //'IMAGE' => $data['IMAGE'],
//                'EMAIL' => $data['email'],
//                'PHONE' => $data['PHONE'],
//                'COUNTRY' => $data['COUNTRY'],
//                'CITY' => $data['CITY'],
//                'EMPLOYEE_CNT' => $data['EMPLOYEE_CNT'],
//                'WEB_SITE' => $data['WEB_SITE'],
//                'DESCRIPTION' => $data['DESCRIPTION'],
//                'password' => Hash::make($data['password']),
//                'role_id' => $roleId,
//            ]);

        } elseif ($roleName == 'candidate') {

            $arrUserFields = [
                'NAME' => 'Pavel',
                'ICON' => Constants::DEMO_ICONS[$iconNumber],
                //'IMAGE' => Constants::DEMO_IMAGES['candidate-pavel'],
                'EMAIL' => $data['email'],
                'PHONE' => $data['PHONE'],
                'COUNTRY' => $data['COUNTRY'],
                'CITY' => $data['CITY'],
                'CATEGORY_ID' => $data['CATEGORY_ID'],
                'LEVEL' => $data['LEVEL'],
                'YEARS_EXPERIENCE' => $data['YEARS_EXPERIENCE'],
                'SALARY' => $data['SALARY'],
                'EXPERIENCE' => $data['EXPERIENCE'],
                'EDUCATION' => $data['EDUCATION'],
                'SKILLS' => Helper::convertTextPointsToJson($data['SKILLS']),
                'LANGUAGES' => Helper::convertTextPointsToJson($data['LANGUAGES']),
                'ABOUT_ME' => $data['ABOUT_ME'],
                'password' => Hash::make($data['password']),
                'role_id' => $roleId,
            ];


//            return User::create([
//                'NAME' => 'Pavel',
//                'ICON' => Constants::DEMO_ICONS[$iconNumber],
//                //'IMAGE' => Constants::DEMO_IMAGES['candidate-pavel'],
//                'EMAIL' => $data['email'],
//                'PHONE' => $data['PHONE'],
//                'COUNTRY' => $data['COUNTRY'],
//                'CITY' => $data['CITY'],
//                'CATEGORY_ID' => $data['CATEGORY_ID'],
//                'LEVEL' => $data['LEVEL'],
//                'YEARS_EXPERIENCE' => $data['YEARS_EXPERIENCE'],
//                'SALARY' => $data['SALARY'],
//                'EXPERIENCE' => $data['EXPERIENCE'],
//                'EDUCATION' => $data['EDUCATION'],
//                'SKILLS' => Helper::convertTextPointsToJson($data['SKILLS']),
//                'LANGUAGES' => Helper::convertTextPointsToJson($data['LANGUAGES']),
//                'ABOUT_ME' => $data['ABOUT_ME'],
//                'password' => Hash::make($data['password']),
//                'role_id' => $roleId,
//            ]);

        } else {
            $arrUserFields = [
                'NAME' => $data['name'],
                'EMAIL' => $data['email'],
                'role_id' => $roleId,
                'password' => Hash::make($data['password']),
            ];

//            $newUser = User::create([
//                'NAME' => $data['name'],
//                'EMAIL' => $data['email'],
//                'role_id' => $roleId,
//                'password' => Hash::make($data['password']),
//            ]);
        }

        $newUser = User::create($arrUserFields);

        //sending notification to candidate email
        $date = (object) [
            'user_id' => $newUser->id,
            'role_id' => $roleId,
        ];

        event(new NewUserRegistered($date));


        return $newUser;

    }

}
