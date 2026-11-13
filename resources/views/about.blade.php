<h1>About Page </h1>
{{-- <a href="{{route('mypost')}}">Post Page</a>
<a href="{{route('mypost')}}">Post Page</a> --}}
@foreach ($names as $n)
    <p>{{$n}}</p>
@endforeach

{{-- @foreach ($arr as $keys => $value)
<p>{{ $keys }}</p>
@endforeach --}}

@forelse ($arr as $keys => $value)
    <p>{{ $keys }}</p>
@empty
    <p>No Data Found in Array</p>
@endforelse




{{-- content kay andar dynamic values ko add karny kay liay --}}

@section('content')
    <h2>About Page</h2>
    @verbatim
        {{ message }}  //answer is {{ message }}
    @endverbatim

@endsection


@push('script')
    var message="Hello World";
@endpush