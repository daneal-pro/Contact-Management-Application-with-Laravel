<!DOCTYPE html>
<html lang="en">
<head>
@extends('contacts.header')
</head>
<body>
    <div class="container py-3">
    @include('contacts.flash-messages')
    @yield('content')
    </div>
    <!-- Include jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Include your custom JS script -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
</body>
</html>