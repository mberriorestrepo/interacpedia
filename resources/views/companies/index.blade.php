@extends('layouts.admin')

@section('content')
<h1>@lang('Companies')</h1>
<a class="btn btn-primary pull-left" href="{{ route('companies.create', app()->getLocale()) }}" >{{ __('Create new company') }}</a>
<br>
<hr class="line">
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('Name')</th>
                <th>@lang('Website')</th>
                <th>@lang('E-Mail Address')</th>
                <th>@lang('Logo')</th>
                <th>@lang('Actions')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->email }}</td>
                    <td><img width="100px" class="img-responsive" src="{{ Storage::url($company->logo) }}" ></td>
                    <td>
                        <a class="btn btn-default btn-xs" href="{{ route('companies.show', ['locale' => app()->getLocale(), 'comany' => $company]) }}">@lang('View details')</a>
                        <a class="btn btn-info btn-xs" href="{{ route('companies.edit', ['locale' => app()->getLocale(), 'comany' => $company]) }}">@lang('Edit')</a>
                        <form style="display:inline" 
                            method="POST" 
                            action="{{ route('companies.destroy', [app()->getLocale(), $company]) }}">
                            {!! csrf_field()!!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-xs" tipe="submit" >@lang('Destroy')</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h2>{{ __('No data to display') }}</h2>
            @endforelse
            {!! $companies->fragment('hash')->appends(request()->query())->links('pagination::default') !!}
        </tbody>
    </table>
</div>
@stop