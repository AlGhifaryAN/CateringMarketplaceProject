<!-- resources/views/merchant/menus/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="container">
    <h2>Edit Menu</h2>

    <form action="{{ route('merchant.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Menu Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $menu->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $menu->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $menu->price }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
