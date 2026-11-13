@php
    $user = "Yahoo Baba";
    $fruits = ["Apple", "Mango", "Cherry"]
@endphp
{{-- oper waly php variable ko js may use karny ka tarika --}}
<script>
    // var data = @json($user);
    // console.log(data);
    // var value = @json($fruits);
    // value.forEach(function (e) {
    //     console.log(e);

    // });
    // console.log(value);

    // another way to use in jsfile 

    var data ={{ Js::from($fruits) }};  //new alter way of @json()
</script>


{{-- if i want to use specical js in a specific file not all
files we use @stack('script') in masterlayout file and for access this file in home page and other --}}

@push('script')
    <script src="/emample.js"></script>
@endpush