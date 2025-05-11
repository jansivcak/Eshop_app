

@extends('others.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/confirmation.css') }}">
@endpush


@section('content')
    <div class="message">Objednávka odoslaná a zaplatená</div>
@endsection


