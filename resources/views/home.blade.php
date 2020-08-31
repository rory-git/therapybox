@extends('layouts.app')

@section('content')
<div class="container">
    <home />
</div>
@endsection

<script>
    window.clothes = @json($clothes);
    window.clothesValues = @json($clothesValues);
</script>