@extends('layouts.app')

@section('content')
<div class="container">
<photos :photos="{{Auth::user()->photos}}"/>
</div>
@endsection

<script>
   
</script>