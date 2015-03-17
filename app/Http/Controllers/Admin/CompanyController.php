<?php namespace App\Http\Controllers\Admin;

use App\Company;
use App\User;
use App\Http\Requests;
use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CompanyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$companies = Company::all();
		return view('admin.company.index',compact('companies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.company.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CompanyRequest $request)
	{
		$user 				= new User;
		$user->role_id 		= 2;
		$user->name 		= $request->get('display_name');
		$user->username 	= $request->get('username');
		$user->password 	= bcrypt($request->get('password'));
		
		if($user->save()){
			
			$company  = new Company([
							'name' 			=> $request->get('company_name'),
							'description' 	=> $request->get('description')
						]);

			$user->company()->save($company);
			return redirect('admin/company');

		}else{
			return redirect('admin/company/create')->withErrors(['company_name'=>'Faile to create a new user']);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($company)
	{
		return view('admin.company.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($company)
	{
		return view('admin.company.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($company)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($company)
	{
		//
	}

}
