@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card welcome-card bg-primary text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="welcome-icon me-4">
                        <i class="fas fa-hospital-user fa-3x"></i>
                    </div>
                    <div>
                        <h4 class="mb-1">Welcome back, {{ Auth::user()->name }}!</h4>
                        <p class="mb-0">Here's what's happening in your clinic today.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-primary text-white me-3">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Total Doctors</h6>
                            <h3 class="mb-0">{{ $totalDoctors }}</h3>
                        </div>
                    </div>
                    <a href="{{ route('doctors.index') }}" class="btn btn-light btn-sm w-100">View All Doctors</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-success text-white me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Total Patients</h6>
                            <h3 class="mb-0">{{ $totalPatients }}</h3>
                        </div>
                    </div>
                    <a href="{{ route('patients.index') }}" class="btn btn-light btn-sm w-100">View All Patients</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-info text-white me-3">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Active Doctors</h6>
                            <h3 class="mb-0">{{ $activeDoctors }}</h3>
                        </div>
                    </div>
                    <p class="text-muted small mb-0">Doctors currently available</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-warning text-white me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">New Patients</h6>
                            <h3 class="mb-0">{{ $newPatients }}</h3>
                        </div>
                    </div>
                    <p class="text-muted small mb-0">New patients this month</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-md me-2 text-primary"></i>
                        Recent Doctors
                    </h5>
                </div>
                <div class="card-body">
                    @if($recentDoctors->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentDoctors as $doctor)
                                <div class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $doctor->image ?? 'https://ui-avatars.com/api/?name='.urlencode($doctor->name).'&background=random' }}" 
                                             class="rounded-circle me-3" 
                                             width="40" height="40"
                                             alt="{{ $doctor->name }}">
                                        <div>
                                            <h6 class="mb-0">{{ $doctor->name }}</h6>
                                            <small class="text-muted">{{ $doctor->specialization }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">No doctors found.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-users me-2 text-success"></i>
                        Recent Patients
                    </h5>
                </div>
                <div class="card-body">
                    @if($recentPatients->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentPatients as $patient)
                                <div class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $patient->image ?? 'https://ui-avatars.com/api/?name='.urlencode($patient->name).'&background=random' }}" 
                                             class="rounded-circle me-3" 
                                             width="40" height="40"
                                             alt="{{ $patient->name }}">
                                        <div>
                                            <h6 class="mb-0">{{ $patient->name }}</h6>
                                            <small class="text-muted">{{ $patient->date_of_birth->format('d/m/Y') }} • {{ ucfirst($patient->gender) }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">No patients found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.welcome-card {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    border: none;
    border-radius: 1rem;
}

.stat-card {
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.list-group-item {
    border-left: none;
    border-right: none;
    border-radius: 0 !important;
}

.list-group-item:first-child {
    border-top: none;
}

.list-group-item:last-child {
    border-bottom: none;
}

.card-header {
    border-bottom: 1px solid rgba(0,0,0,.05);
}
</style>
@endsection
