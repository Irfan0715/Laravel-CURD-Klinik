@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">
                    <i class="fas fa-users text-primary"></i> Patients List
                </h2>
                <a href="{{ route('patients.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Patient
                </a>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('patients.index') }}" method="GET" class="mb-0">
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Search by name, email, phone or medical history..." 
                                   name="search" 
                                   value="{{ $search ?? '' }}"
                                   aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                            @if($search)
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary">
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
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $patient->image ?? 'https://ui-avatars.com/api/?name='.urlencode($patient->name).'&background=random' }}" 
                                                     alt="{{ $patient->name }}"
                                                     class="rounded-circle me-2"
                                                     width="40" height="40">
                                                {{ $patient->name }}
                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $patient->date_of_birth->format('d/m/Y') }}</td>
                                        <td class="align-middle">{{ ucfirst($patient->gender) }}</td>
                                        <td class="align-middle">{{ $patient->phone }}</td>
                                        <td class="align-middle">{{ $patient->email }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('patients.show', $patient) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            @if($search)
                                                <div class="text-muted">
                                                    <i class="fas fa-search fa-2x mb-3"></i>
                                                    <p>No patients found matching your search criteria.</p>
                                                </div>
                                            @else
                                                <div class="text-muted">
                                                    <i class="fas fa-users fa-2x mb-3"></i>
                                                    <p>No patients found.</p>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.table > :not(caption) > * > * {
    padding: 1rem 0.75rem;
}

.btn {
    border-radius: 0.5rem;
}

.card {
    border: none;
    border-radius: 1rem;
    overflow: hidden;
}

.pagination {
    margin-bottom: 0;
}
</style>
@endsection 