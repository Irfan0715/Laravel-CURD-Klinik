@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Doctor Details</span>
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ $doctor->image ?? 'https://ui-avatars.com/api/?name='.urlencode($doctor->name).'&background=random' }}" 
                             alt="{{ $doctor->name }}" 
                             class="rounded-circle mb-3"
                             style="width: 150px; height: 150px; object-fit: cover;">
                        <h3>{{ $doctor->name }}</h3>
                        <p class="text-muted">{{ $doctor->specialization }}</p>
                    </div>

                    <div class="doctor-info bg-light p-4 rounded">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Phone</div>
                            <div class="col-md-8">{{ $doctor->phone }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Email</div>
                            <div class="col-md-8">{{ $doctor->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 fw-bold">Address</div>
                            <div class="col-md-8">{{ $doctor->address }}</div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Doctor
                        </a>
                        <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete Doctor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.doctor-info {
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
</style>
@endsection 