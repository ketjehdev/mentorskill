<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- favicon --}}
    <link rel="icon" href="{{ asset('img/mentorskil.png') }}">
    {{-- stylesheet API AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- stylesheet API bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- link stylesheet css --}}
    @if ($title == 'Blog Templates')
    <link rel="stylesheet" href="{{ asset('css/blog_template.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @endif

    {{-- link stylesheet css --}}
    @if ($title == 'Login')
    <link rel="stylesheet" href="{{ asset('css/splash.css') }}">
    @endif
    {{-- link stylesheet css --}}
    @if (in_array($title, ['Login', 'Student', 'Mentor']))        
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @endif
    {{-- link responsiver dashboard --}}
    @if (in_array($title, ['dashboard'])) 
    <link rel="stylesheet" href="{{ asset('css/responsiver.dash.css') }}">
    @endif

    @if ($title == 'Home')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endif

    @if ($title != 'Blog Templates')
    <title>{{ $title; }} | MentorSkill</title>
    @else
    <title>{{ $data->judul }} | {{ $data->username }}</title>
    @endif
</head>
<style>
    a {text-decoration: none}
</style>
<body oncontextmenu="false">

@include('templates.navbar')
