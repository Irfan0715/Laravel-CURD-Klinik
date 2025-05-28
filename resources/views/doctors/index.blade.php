@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">
                    <i class="fas fa-user-md text-primary"></i> Doctors List
                </h2>
                <a href="{{ route('doctors.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Doctor
                </a>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('doctors.index') }}" method="GET" class="mb-0">
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Search by name, specialization, email or phone..." 
                                   name="search" 
                                   value="{{ $search ?? '' }}"
                                   aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                            @if($search)
                                <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Clear
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($doctors as $doctor)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{ $doctor->image ?? 'https://ui-avatars.com/api/?name='.urlencode($doctor->name).'&background=random' }}" 
                                 alt="{{ $doctor->name }}" 
                                 class="rounded-circle mb-3"
                                 style="width: 120px; height: 120px; object-fit: cover;">
                            <h5 class="card-title mb-0">{{ $doctor->name }}</h5>
                            <p class="text-muted">{{ $doctor->specialization }}</p>
                        </div>
                        
                        <div class="doctor-info">
                            <p class="mb-2">
                                <i class="fas fa-phone text-primary"></i> 
                                {{ $doctor->phone }}
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-envelope text-primary"></i> 
                                {{ $doctor->email }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    @if($search)
                        <i class="fas fa-info-circle"></i> No doctors found matching your search criteria.
                    @else
                        <i class="fas fa-info-circle"></i> No doctors found.
                    @endif
                </div>
            </div>
        @endforelse
    </div>

    <div class="row">
        <div class="col-12">
            {{ $doctors->links() }}
        </div>
    </div>
</div>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    transition: all 0.3s ease;
}

.doctor-info {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
}

.card {
    border: none;
    border-radius: 1rem;
    overflow: hidden;
}

.btn {
    border-radius: 0.5rem;
}

.pagination {
    justify-content: center;
    margin-top: 2rem;
}
</style>
@endsection 