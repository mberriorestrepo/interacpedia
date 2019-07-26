@extends('layouts.app')

@section('content')
	<h1>{{ $question->name }}</h1>
	<table class="table">
		<tr>
			<th>@lang('Question number')</th>
			<td>{{ $question->question_number }}</td>
		</tr>
		<tr>
			<th>@lang('Question')</th>
			<td>{{ $question->question }}</td>
		</tr>
		<tr>
			<th>@lang('Answers'):</th>
			<td>
				<ul>
					@forelse($question->answer as $ans)
						<li class="{{ $ans->correct == '1' ? 'text-success' : 'text-danger' }}" >
							{{ $ans->answer }}
						</li>
					@empty
						No hay respuestas para esta pregunta
					@endforelse
				</ul>
			</td>
		</tr>
	</table>
	{{-- @can('edit', $question) --}}
	<a class="btn btn-info" href="{{ route('questions.edit', $question->id) }}" >Editar</a>
	{{-- @endcan --}}
	{{-- @can('destroy', $question)
		<form style="display:inline" 
            method="POST" 
            action="{{ route('usuarios.destroy', $question->id) }}">
            {!! csrf_field()!!}
            {!! method_field('DELETE') !!}
            <button class="btn btn-danger" tipe="submit" >eliminar</button>
        </form>
	@endcan --}}
@stop

