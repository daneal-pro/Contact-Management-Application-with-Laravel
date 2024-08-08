@extends('contacts.app')

@section('content')
<dic class="container">
<div class="row">
        <div class="col-md-6 mx-auto">
        <h1 class="text-center">Contact Details:</h1>
            <div class="card mt-5 text-center py-2">
                <p><strong>Name:</strong> {{ $contact->name }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                <p><strong>Address:</strong> {{ $contact->address }}</p>
            </div>
        </div>
</div>
@endsection
