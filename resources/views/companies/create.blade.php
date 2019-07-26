@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>{{ __("Create new company") }}</h1>
			<form action="{{ route('companies.store', app()->getLocale()) }}" Method="POST" enctype="multipart/form-data">
			@include('companies._form', ['btnText' => 'Create', 'company' => new App\Company])
		</form>
	</div>
</div>	
@stop