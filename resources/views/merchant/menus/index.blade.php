@extends('layouts.app')

@section('title', 'Manage Menus')

@section('content')
<div class="container">
    <h2>Your Menus</h2>
    <a href="{{ route('merchant.menus.create') }}" class="btn btn-primary mb-3">Add New Menu</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>
                        <a href="{{ route('merchant.menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('merchant.menus.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
