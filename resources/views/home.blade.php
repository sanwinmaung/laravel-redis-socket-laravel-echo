@extends('layouts.app')

@section('content')
    <example-component :id="{{ Auth::user()->id }}"></example-component>
@endsection
