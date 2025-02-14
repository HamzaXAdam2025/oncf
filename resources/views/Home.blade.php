@extends('Master_page')
@section('title','Home')
@section('content')

<div class="text-center">
    <h1>Travel with us</h1>
    <p style="font-size: 24px;">Parcourons l'avenir ensemble : votre trajet, notre engagement.</p>
</div>
<div class="image-container">
    <img src="{{ asset('trainPic.jpg') }}" alt="train" class="centered-image" style="width: 100%; height: auto; object-fit: cover;">
</div>

@endsection
