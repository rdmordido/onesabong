<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyRequest extends Request {

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
				'company_name' 		=> 'required|max:255|unique:companies,name,'.$company->id,
				'display_name' 		=> 'required',
				'username' 			=> 'required|min:3|max:255|unique:users,name,'.$company->user->id,
				'password' 			=> 'required|confirmed|min:6',
			];
		}else{
			return [
				'company_name' 		=> 'required|max:255|unique:companies,name',
				'display_name' 		=> 'required',
				'username' 			=> 'required|min:3|max:255|unique:users,name',
				'password' 			=> 'required|confirmed|min:6',
			];
		}
	}

}
