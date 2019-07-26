@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>{{ __("Edit employee") }}</h1>
        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
        <form action="{{ route('employees.update', [app()->getLocale(), $employee]) }}" Method="POST">
            {!! method_field('PUT')!!}
            @include('employees._form', ['btnText' => 'Send'])
        </form>
    </div>
</div>
@stop