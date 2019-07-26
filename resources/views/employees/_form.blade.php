{!! csrf_field() !!}
<div class="form-group">
    <label for="first_name">{{  __('First name') }}</label>
    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $employee->first_name) }}">
    {!! $errors->first('first_name', '<span class=error >:message</span>') !!}
</div>

<div class="form-group">
    <label for="last_name">{{  __('Last name') }}</label>
    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name) }}">
    {!! $errors->first('last_name', '<span class=error >:message</span>') !!}
</div>

<div class="form-group">
    <label for="email">{{ __('E-Mail Address') }}</label>
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $employee->email) }}">
    {!! $errors->first('email', '<span class=error >:message</span>') !!}
</div>


<div class="form-group">
    <label for="phone" >{{ __('Phone') }}</label>
    <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $employee->phone) }}">
    {!! $errors->first('phone', '<span class=error >:message</span>') !!}
</div>

<div class="form-group">
    <label for="company_id" >{{ __('Companies') }}</label>
    <select class="form-control" name="company_id" id="company_id">
        @forelse ($companies as $company)
            <option value="{{ $company->id }}" {{ $company->id == old('company_id', $employee->company['id']) ? 'selected' : '' }}> {{ $company->name }} </option>
        @empty
            <option value="">{{ __('No data to display') }}</option>
        @endforelse
    </select>
    {!! $errors->first('company_id', '<span class=error >:message</span>') !!}
</div>
<button class="btn btn-success" >{{ __($btnText) }}</button>
<a class="btn btn-secondary text-default" href="{{ route('employees.index', app()->getLocale()) }}" >@lang('Cancel')</a>