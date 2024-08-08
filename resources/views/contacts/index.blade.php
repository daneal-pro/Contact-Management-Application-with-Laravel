@extends('contacts.app')

@section('content')
<h1 class="text-center">All Contacts</h1>
<div class="container py-2">
        <div class="row">
            <div class="col-sm-6 mx-auto justify-content-center">
                <form method="GET" action="{{ url('/contacts') }}">
                    <div class="input-group rounded">
                        <input type="text" name="search" class="form-control rounded" placeholder="Search by name or email" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container text-center py-1">
        <a href="{{ url('/contacts/create') }}">
        <button type="button" class="btn btn-secondary"><span><i class="fa-solid fa-square-plus"></i></span> Create New Contact</button>
        </a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">phone</th>
                <th scope="col">Address</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
              <tr>
                <th scope="row">#</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->created_at }}</td>
                <td><a href="{{ url('/contacts/' . $contact->id) }}"><i class="fa-regular fa-eye"></i></a> | <a href="{{ url('/contacts/' . $contact->id . '/edit') }}"><i class="fa-regular fa-pen-to-square"></i></a> |
                        <form action="{{ url('/contacts/' . $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this contact?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection