@extends('admin.master')

@section('page-header')
	Planta <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'route' => 'plants.store',
			'files' => true
		])
	!!}

		@include('plants.partials.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>
		
	{!! Form::close() !!}
	
@stop

@section('js')
	@include('plants.partials.js')
@endsection