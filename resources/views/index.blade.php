@extends('layouts.app')

@section('css_files')

@endsection()

@section('content')
    <div class="content">
        <navbar></navbar>
        <div class="flex">
            <sidebar class="h-screen sticky top-0"></sidebar>
            <container class="m-5"></container>
        </div>
    </div>
@endsection()

@section('js_files')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
