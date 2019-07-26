@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="jumbotron">
			<div class="page-header">
				<h1>{{ $company->name }}</h1>
			</div>
			<table class="table">
				<tr>
					<th>@lang('E-Mail Address')</th>
					<td>{{ $company->email }}</td>
				</tr>
				<tr>
					<th>@lang('Website')</th>
					<td>{{ $company->website }}</td>
				</tr>
				<tr>
					<th>@lang('Logo'):</th>
					<td><img width="200px" src="{{ Storage::url($company->logo) }}" alt="" ></td>
				</tr>
			</table>
			<a class="btn btn-info" href="{{ route('companies.edit', ['locale' => app()->getLocale(), 'company' => $company]) }}" >Editar</a>
		</div>
	</div>
</div>

@stop
