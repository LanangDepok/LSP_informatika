@extends('template')

@section('content')
    <video class="w-full" autoplay controls>
        <source src="{{ asset('storage/vid_contoh.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@endsection
