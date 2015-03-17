<?php namespace App\Http\Controllers;


use App\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller {

	protected $loginPath		   = 'login';
	protected $redirectAfterLogin  = '/';
	protected $redirectAfterLogout = 'login';

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function showLoginForm()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		
		$this->validate($request,['username' => 'required', 'password' => 'required']);

		$credentials = $request->only('username','password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			if(Auth::user()->id == 1)
				return redirect('admin');
			else
				return redirect()->intended($this->redirectAfterLogin);
		}	

		return redirect($this->loginPath)
					->withInput($request->only('username', 'remember'))
					->withErrors([
						'username' => 'Invalid Credentials',
					]);
	}

	public function showRegistrationForm()
	{
		return view('auth.register');
	}

	public function register(UserRequest $request)
	{
		$user 				= new User;
		$user->role_id 		= 3;
		$user->name 		= $request->get('name');
		$user->username 	= $request->get('username');
		$user->password 	= bcrypt($request->get('password'));
		if($user->save()){
			Auth::login($user);
			return redirect('/');
		}else{
			return redirect('/login')->withErrors(['username' => 'Registration failed!']);
		}
	}

	public function logout()
	{
		$this->auth->logout();
		return redirect($this->redirectAfterLogout);
	}

}