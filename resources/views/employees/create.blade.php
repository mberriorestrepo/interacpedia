@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>{{ __("Create new employee") }}</h1>
			<form action="{{ route('employees.store', [app()->getLocale()]) }}" Method="POST">
			@include('employees._form', ['btnText' => 'Create', 'employee' => new App\Employee])
		</form>
	</div>
</div>	
@stop