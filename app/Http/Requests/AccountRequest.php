<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountRequest extends Request {

/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return (\Auth::user()->is_admin) ? true : false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$company = $this->route('company');

		if($company){
			return [
				'name' 				=> 'required|min:3|max:15|unique:accounts,name,'.$company->id,
				'display_name' 		=> 'required',
				'owner_name' 		=> 'required',
				'username' 			=> 'required|min:3|max:255|unique:users,name,'.$company->user->id,
				'password' 			=> 'required|confirmed|min:6',
			];
		}else{
			return [
				'name' 				=> 'required|min:3|max:15|unique:accounts,name',
				'display_name' 		=> 'required',
				'owner_name' 		=> 'required',
				'username' 			=> 'required|min:3|max:255|unique:users,name',
				'password' 			=> 'required|confirmed|min:6',
			];
		}
	}

}
