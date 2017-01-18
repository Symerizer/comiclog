@extends('layouts.master')

@section('content')
    <h1>Welcome to ComicLog!</h1>
    {{ dump(env('MARVEL_PUBLIC_KEY')) }}
@endsection