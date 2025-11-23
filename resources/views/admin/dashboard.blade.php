@extends("layout.admin-layout")

@section("content")

hallo {{ Auth::user()->name }}

@endsection