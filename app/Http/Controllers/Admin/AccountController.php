<?php namespace App\Http\Controllers\Admin;

use App\Account;
use App\User;
use App\Http\Requests;
use App\Http\Requests\accountRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AccountController extends Controller {

	public function __construct()
	{
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$accounts = Account::all();
		return view('admin.account.index',compact('accounts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.account.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AccountRequest $request)
	{
		$user 				= new User;
		$user->role_id 		= 2;
		$user->name 		= $request->get('owner_name');
		$user->username 	= $request->get('username');
		$user->password 	= bcrypt($request->get('password'));
		
		if($user->save()){
			
			$account  = new Account([
							'name' 			=> $request->get('name'),
							'display_name' 	=> $request->get('display_name'),
							'description' 	=> $request->get('description')
						]);

			$user->account()->save($account);
			return redirect('admin/account');

		}else{
			return redirect('admin/account/create')->withErrors(['account_name'=>'Faile to create a new user']);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($account)
	{
		return view('admin.account.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($account)
	{
		return view('admin.account.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($account)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($account)
	{
		//
	}

}
