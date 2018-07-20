@extends('layout.app')

@section('content')
	

	<router-view></router-view>

	{{-- <prop-component :scientists="{{json_encode($scientists)}}"></prop-component> --}}

@endsection
