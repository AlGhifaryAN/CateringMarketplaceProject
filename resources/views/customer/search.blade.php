@extends('layouts.app')

@section('title', 'Search Catering')

@section('content')
<div class="container">
    <h2>Search Catering</h2>
    <form action="{{ route('customer.search') }}" method="GET" class="form-inline mb-3">
        <input type="text" name="query" class="form-control mr-2" placeholder="Enter keywords" value="{{ request('query') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="list-group">
        @forelse ($merchants as $merchant)
            <div class="list-group-item">
                <h5>{{ $merchant->company_name }}</h5>
                <p>{{ $merchant->description }}</p>
                <a href="{{ route('customer.merchant.show', $merchant->id) }}" class="btn btn-info">View Menu</a>
            </div>
        @empty
            <p>No catering found.</p>
        @endforelse
    </div>
</div>
@endsection
