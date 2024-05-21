<!-- resources/views/companies/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td><img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100"></td>
                        <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                        <td>
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection
