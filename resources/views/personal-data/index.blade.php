<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Data {{ $personalData ? $personalData->name : 'Biodata' }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .profile-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .skill-badge {
            display: inline-block;
            background-color: #e9ecef;
            color: #495057;
            padding: 0.375rem 0.75rem;
            border-radius: 20px;
            margin: 0.25rem;
            font-size: 0.875rem;
        }
        .section-title {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0.5rem;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            left: 1rem;
            top: 1.5rem;
            width: 2px;
            height: calc(100% - 1rem);
            background: #dee2e6;
        }
        .timeline-item:last-child::after {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

            @if($personalData)
                <div class="card profile-card">
                    <div class="profile-header p-4">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('personal-data.edit') }}" class="btn btn-light btn-sm shadow-sm">
                                <i class="fas fa-edit me-1"></i> Ubah Data
                            </a>
                        </div>
                        
                        <div class="row align-items-center mt-2"> 
                            <div class="col-md-2 text-center mb-3 mb-md-0">
                                @if($personalData->profile_photo)
                                    <img src="{{ asset('storage/' . $personalData->profile_photo) }}" alt="Profile Photo" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                        <span class="display-4 text-primary fw-bold">JD</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <h1 class="mb-1">{{ $personalData->name }}</h1>
                                <h4 class="mb-2 opacity-75">{{ $personalData->title }}</h4>
                                <p class="mb-0">{{ $personalData->summary }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h3 class="section-title">Informasi Kontak</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-envelope me-2"></i><strong>Email:</strong> {{ $personalData->email }}</li>
                                            <li class="mb-2"><i class="fas fa-phone me-2"></i><strong>Telepon:</strong> {{ $personalData->phone }}</li>
                                            <li class="mb-2"><i class="fas fa-birthday-cake me-2"></i><strong>Tanggal Lahir:</strong> {{ $personalData->date_of_birth ? \Carbon\Carbon::parse($personalData->date_of_birth)->format('d F Y') : '-' }}</li>
                                            <li class="mb-2"><i class="fab fa-linkedin me-2"></i><strong>LinkedIn:</strong> <a href="{{ $personalData->linkedin }}" target="_blank">{{ $personalData->linkedin }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i><strong>Alamat:</strong> {{ $personalData->address }}</li>
                                            <li class="mb-2"><i class="fas fa-globe me-2"></i><strong>Kewarganegaraan:</strong> {{ $personalData->nationality }}</li>
                                            <li class="mb-2"><i class="fab fa-github me-2"></i><strong>GitHub:</strong> <a href="{{ $personalData->github }}" target="_blank">{{ $personalData->github }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h3 class="section-title">Keahlian & Keahlian</h3>
                                <div>
                                    {{-- FIX: Mengatasi Type Error jika data masih berupa JSON string --}}
                                    @php
                                        $skills = is_string($personalData->skills_and_expertise) ? json_decode($personalData->skills_and_expertise, true) : $personalData->skills_and_expertise;
                                    @endphp
                                    
                                    @if($skills && is_countable($skills) && count($skills) > 0)
                                        @foreach($skills as $skill)
                                            @if(!empty($skill))
                                                <span class="skill-badge">{{ $skill }}</span>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>Tidak ada keahlian yang tercantum.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h3 class="section-title">Pengalaman Kerja</h3>
                                {{-- FIX: Mengatasi Type Error jika data masih berupa JSON string --}}
                                @php
                                    $works = is_string($personalData->work_experience) ? json_decode($personalData->work_experience, true) : $personalData->work_experience;
                                @endphp

                                @if($works && is_countable($works) && count($works) > 0)
                                    @foreach($works as $exp)
                                        @if(!empty($exp))
                                            <div class="timeline-item">
                                                <div>
                                                    <p class="mb-0">{{ $exp }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p>Tidak ada pengalaman kerja yang tercantum.</p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="section-title">Pendidikan</h3>
                                {{-- FIX: Mengatasi Type Error dan Parse Error (unexpected else) --}}
                                @php 
                                    $eduList = is_string($personalData->education) 
                                                ? json_decode($personalData->education, true) 
                                                : $personalData->education; 
                                @endphp

                                @if($eduList && is_countable($eduList) && count($eduList) > 0)
                                    @foreach($eduList as $edu)
                                        @if(!empty($edu))
                                            <div class="timeline-item">
                                                <div>
                                                    <p class="mb-0">{{ $edu }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p>Tidak ada pendidikan yang tercantum.</p>
                                @endif
                            </div>
                        </div>
                    </div> {{-- Penutup card-body --}}
                </div> {{-- Penutup card profile-card --}}
            @else
                {{-- @else UTAMA --}}
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data Belum Tersedia</h5>
                        <p class="card-text">Silakan tambahkan data pribadi Anda terlebih dahulu.</p>
                        <a href="{{ route('personal-data.edit') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            @endif
            {{-- @endif UTAMA --}}
            </div>
        </div>
    </div>
</body>
</html>