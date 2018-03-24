@extends('layouts.main')

@section('title', 'Code 4 Diversity')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection

@section('footer')
    @parent
@endsection