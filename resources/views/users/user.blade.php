@extends('users.layouts.app')

@section('content')

<h1>Selamat datang {{ Auth::user()->name }}</h1>{{ Auth::user()->role }}



@endsection
