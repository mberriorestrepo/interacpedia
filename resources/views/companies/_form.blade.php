{!! csrf_field() !!}
<div class="form-group">
    <label for="name">@lang('Name')</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $company->name) }}">
    {!! $errors->first('name', '<span class="error" role="alert" >:message</span>') !!}
</div>

<div class="form-group">
    <label for="email">@lang('E-Mail Address')</label>
    <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $company->email) }}">
    {!! $errors->first('email', '<span class="error" role="alert" >:message</span>') !!}
</div>

<div class="form-group">
    <label for="logo" >@lang('Logo')</label>
    <input class="form-control" type="file" name="logo" id="logo" aria-describedby="fileHelp" value="{{ old('logo', $company->logo) }}">
    {!! $errors->first('logo', '<span class="error" role="alert" >:message</span>') !!}
</div>

<div class="form-group">
    <label for="website" >@lang('Website')</label>
    <input class="form-control" type="text" name="website" id="website" value="{{ old('website', $company->website) }}">
    {!! $errors->first('website', '<span class="error" role="alert" >:message</span>') !!}
</div>
<button class="btn btn-success" >{{ __($btnText) }}</button>
<a class="btn btn-secondary text-default" href="{{ route('companies.index', app()->getLocale()) }}" >@lang('Cancel')</a>