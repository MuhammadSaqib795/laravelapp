{{-- //is file may who code a ay ga jo har file may chaheay
basic syantex --}}


{{--
just jo part change karna ho har page may is ki jaga--}}

@yield('content', "<h2>No value found</h2>"); //second parameter is a difault value pr ya html bhi sath print kar dyta
hy
is ko prevent karny kay liay
@hasSection('content')
@else
    <h2>NO Data Found</h2>

@endif

{{-- har page kay alag title kay liay --}}
@yield('title')


{{-- aor jis jis file may use karna hy is may likhayn gay --}}

@extends('layouts.masterlayout')

{{-- aor dynamic data kay liay --}}
@section('content')
    <h2>this is dynamic data</h2>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde ipsum eveniet ducimus. Sunt nemo deleniti doloremque,
        illum doloribus expedita at quod sint ipsum tempora facilis eum eligendi possimus est placeat?</p>
@endsection





{{-- title use kar ny kay liay --}}

@section('title')
    Home {{-- for home --}}
    about {{-- for about --}}
@endsection



@stack('scripts') //in another file

{{-- for use in home page we use push directory insteade of section because push can use multiple times in a same file
and work --}}

@push('scripts')
    <script src="/example.js"></script>
    <script src="/bootstrap.js"></script>
@endpush


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @stack('style')
</head>

<body>
    @stack('script')
</body>

</html>