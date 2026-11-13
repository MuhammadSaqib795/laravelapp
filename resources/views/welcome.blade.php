<h2>Hello Laravel</h2>
<a href="{{route('mypost')}}">Post Page</a>
<a href="{{route('myabout')}}">About Page</a>

<h1>this is my first day of practice laravel</h1>
<br><br>
{{5 + 3}}
<br><br>
{{"<h1>Hello World</h1>"}}

{!!"<h1>Hello World</h1>"!!}
{!!"<script>alert('World')</script>"!!}

{{------------------- Blade tamplets=----------------------- --}}
@php
    $user = "yaho baba";
    $data = ["adil", "ali", "asif"];

@endphp
<ul>
    @foreach ($data as $d)
        @if ($loop->even)
            <li style="color: red">{{ $loop->index }}-{{ $d }}</li>
        @elseif ($loop->odd)
            <li style="color: green">{{ $loop->index }}-{{ $d }}</li>
        @endif
        {{-- <li>{{ $loop->index }}-{{ $d }}</li> --}}
    @endforeach


</ul>
{{-- @include('post', ['name' => 'ali']); --}}

{{-- @includeWhen(empty($data), 'view.post', ['some' => '$data']) --}}
{{-- {{$user}} --}}



{{--............................ Tamplete inheretance................................... --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css / style . css') }}">
</head>

<body>

    @stack('scripts')
</body>

</html>


@push('script')
    <script src="./jquery.js"></script>
    <script src="./bootstrap.js"></script>
    <script src="./example.js"></script>

@endpush


{{-- i can use this same push files multiple times in a same file which is not aallow in section
--}}
@push('script')
    <script src="./view.js"></script>
@endpush


@push('style')
    <link rel="stylesheet" href="css/bootstrap">
@endpush



{{-- for in page style in homepage we can use section and prepend --}}

@prepend('style') //is line may who jaga define karni hy jis say pahly ya file add karni hy
    <style>
        #wrapper {
            background: tan;
        }
    </style>
@endprepend 