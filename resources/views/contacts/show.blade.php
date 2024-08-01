@extends('layout')

@section('content')
    <h1>View Contact</h1>

    <div>
        <strong>Name:</strong> {{ $contact->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $contact->email }}
    </div>
    <div>
        <strong>Phone:</strong> {{ $contact->phone }}
    </div>
    <div>
        <strong>Address:</strong> {{ $contact->address }}
    </div>

    <div>
        <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>

        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
