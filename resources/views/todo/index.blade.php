@extends('layouts.index')

@section('title')
    Todolist
@endsection

@section('content')
<h1>Profil Saya</h1>

<ul>
    <li>Nama : {{ $name }}</li>
    <li>Univ : {{ $univ }}</li>
    <li>Hobi :
        @foreach($hobi as $h)
            {{ $h }},
        @endforeach
    </li>
</ul>
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            alert('Hello World');
        });
    </script>
@endpush