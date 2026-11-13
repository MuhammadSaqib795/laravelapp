<H1>this is a post page</H1>
<a href="{{route('myabout')}}">About Page</a>
@php
    $fruits = ["banana", "apple", "mango"];

    // $namesarray = ['name1' => "Ali", 'name2' => "Saqib"];
    $namesarray = [];
@endphp

{{-- @include('about', ['names' => $fruits, 'arr' => $namesarray]); --}}

@includeIf('about', ['names' => $fruits, 'arr' => $namesarray]);