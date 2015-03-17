@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/company') }}">
				<div class="panel panel-default">
					<div class="panel-heading">Company Information</div>
					<div class="panel-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-4 control-label">Company Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Description</label>
								<div class="col-md-6">
									<textarea class="form-control" name="company_description" value="{{ old('company_description') }}"></textarea>
								</div>
							</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Login Credentials</div>
					<div class="panel-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-4 control-label">Display Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Username</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="username" value="{{ old('username') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Confirm Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Register
									</button>
								</div>
							</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
