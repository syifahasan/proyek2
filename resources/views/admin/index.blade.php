@extends('admin.mainadmin')
@section('title', $title)
@section('content')
    Selamat Datang, {{ auth()->user()->name }}
@endsection
