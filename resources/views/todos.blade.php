@extends('layouts.app')

@section('content')
<div class="container">
<todos />
</div>
@endsection

<script>
   window.todos = @json(Auth::user()->todos);
</script>