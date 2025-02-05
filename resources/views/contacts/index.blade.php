@extends('layout')

@section('content')
    <h1>Contacts</h1>
    <form method="GET" action="{{ route('contacts.index') }}">
        <input type="text" name="search" placeholder="Search contacts..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th><a href="?sort=name">Name</a></th>
                <th>Email</th>
                <th><a href="?sort=created_at">Date Created</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->created_at }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
@endsection
