<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostLoginRequest;
use App\Http\Requests\PostRegistrationRequest;
use App\Models\Hobby;
use App\Models\State;
use App\Models\UserFile;
use App\Traits\CommonFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    use CommonFunctions;

    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        $states = State::active()->get()->toArray();
        $hobbies = Hobby::active()->get()->toArray();
        $roles = Role::get()->toArray();
        return view('auth.registration', ['states' => $states, 'hobbies' => $hobbies, 'roles' => $roles]);
    }

    public function postLogin(PostLoginRequest $request)
    {
        $data = $request->all();
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['code' => 200, 'message' => 'Login successfully.', 'result' => [
                'token' => $token,
            ]]);
        } else {
            return response()->json(['code' => 201, 'message' => 'Opps! You have entered invalid credentials.']);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(PostRegistrationRequest $request)
    {
        $data = $request->all();
        $remember = $request->boolean('remember');
//        dd($data);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'mobile' => $data['mobile'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'gender' => $data['gender'],
            'postal_code' => $data['postal_code'],
//            'hobby_ids' => implode(',', $data['hobby_ids']),
            'hobby_ids' => $data['hobby_ids'],
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile_picture_array = $request->profile_picture;
            foreach ($profile_picture_array as $i => $file) {
                $file_name = $this->generateName($file, 'profile_pic');
                $this->saveFileByPath($file, $file_name, 'uploads/profile_picture/');
                UserFile::create(['user_id' => $user->id, 'name' => $file_name]);
            }
        }

//        $user->assignRole($data['role_ids']);
        $user->assignRole(explode(',', $data['role_ids']));

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['code' => 200, 'message' => 'User created successfully.', 'result' => [
                'token' => $token,
            ]]);
        } else {
            return response()->json(['code' => 201, 'message' => 'Opps! You have entered invalid credentials.']);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
//        return Redirect('login');
        return response()->json(['code' => 200, 'message' => 'Logout successfully.']);
    }
}
