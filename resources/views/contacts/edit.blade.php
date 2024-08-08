@extends('contacts.app')

@section('content')
    <h1 class="text-center">Edit Contact</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div id="flash-messages"></div> <!-- Add flash messages container -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="edit-contact-form" method="POST" action="{{ url('/contacts/' . $contact->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $contact->address) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
