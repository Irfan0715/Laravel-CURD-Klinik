@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Patient Details</span>
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ $patient->image ?? 'https://ui-avatars.com/api/?name='.urlencode($patient->name).'&background=random' }}" 
                             alt="{{ $patient->name }}" 
                             class="rounded-circle mb-3"
                             style="width: 150px; height: 150px; object-fit: cover;">
                        <h3>{{ $patient->name }}</h3>
                        <p class="text-muted">Patient ID: {{ $patient->id }}</p>
                    </div>

                    <div class="patient-info bg-light p-4 rounded">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Date of Birth</div>
                            <div class="col-md-8">{{ $patient->date_of_birth->format('d/m/Y') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Gender</div>
                            <div class="col-md-8">{{ ucfirst($patient->gender) }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Phone</div>
                            <div class="col-md-8">{{ $patient->phone }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Email</div>
                            <div class="col-md-8">{{ $patient->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Address</div>
                            <div class="col-md-8">{{ $patient->address }}</div>
                        </div>
                    </div>

                    @if($patient->medical_history)
                    <div class="medical-history mt-4">
                        <h4 class="mb-3">Medical History</h4>
                        <div class="bg-light p-4 rounded">
                            {{ $patient->medical_history }}
                        </div>
                    </div>
                    @endif

                    <div class="mt-4 text-center">
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Patient
                        </a>
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete Patient
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.patient-info, .medical-history {
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
</style>
@endsection 