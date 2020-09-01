@extends('layouts.app')

@section('content')
<div class="container">
    <home />
</div>
@endsection

<script>
    window.clothes = @json($clothes);
    window.clothesValues = @json($clothesValues);
    window.weather = @json($weather);
    window.sportsNews = @json($sportsNews);
    window.todos = @json(Auth::user()->todos->take(3));
    window.photos= @json(Auth::user()->photos);
</script>