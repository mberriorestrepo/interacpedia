@extends('layouts.admin')

@section('content')
<h1>@lang('Employees')</h1>
<a class="btn btn-primary pull-left" href="{{ route('employees.create', app()->getLocale()) }}" >{{ __('Create new company') }}</a>
<br>
<hr class="line">
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('First name')</th>
                <th>@lang('Last name')</th>
                <th>@lang('E-Mail Address')</th>
                <th>@lang('Phone')</th>
                <th>@lang('Company')</th>
                <th>@lang('Actions')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>
                        <a class="btn btn-default btn-xs" href="{{ route('employees.show', ['locale' => app()->getLocale(), 'employee' => $employee]) }}">@lang('View details')</a>
                        <a class="btn btn-info btn-xs" href="{{ route('employees.edit', ['locale' => app()->getLocale(), 'employee' => $employee]) }}">@lang('Edit')</a>
                        <form style="display:inline" 
                            method="POST" 
                            action="{{ route('employees.destroy', [app()->getLocale(), $employee]) }}">
                            {!! csrf_field()!!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-xs" tipe="submit" >@lang('Destroy')</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h2>{{ __('No data to display') }}</h2>
            @endforelse
            {!! $employees->fragment('hash')->appends(request()->query())->links('pagination::default') !!}
        </tbody>
    </table>
</div>
@stop