<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personalData ? 'Edit Data - ' . $personalData->name : 'Tambah Data Pribadi' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $personalData ? 'Edit Data Pribadi' : 'Tambah Data Pribadi' }}</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="{{ route('personal-data.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT') 
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Foto Profil</label>
                                @if($personalData && $personalData->profile_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $personalData->profile_photo) }}" alt="Profile Photo" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" name="profile_photo">
                                <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $personalData->name ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Jabatan</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $personalData->title ?? '') }}">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $personalData->email ?? '') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $personalData->phone ?? '') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $personalData && $personalData->date_of_birth ? \Carbon\Carbon::parse($personalData->date_of_birth)->format('Y-m-d') : '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address', $personalData->address ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Kewarganegaraan</label>
                                <input type="text" class="form-control" name="nationality" value="{{ old('nationality', $personalData->nationality ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">LinkedIn URL</label>
                                <input type="url" class="form-control" name="linkedin" value="{{ old('linkedin', $personalData->linkedin ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">GitHub URL</label>
                                <input type="url" class="form-control" name="github" value="{{ old('github', $personalData->github ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Ringkasan</label>
                                <textarea class="form-control" rows="4" name="summary">{{ old('summary', $personalData->summary ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Keahlian & Keahlian (pisahkan dengan koma)</label>
                                <textarea class="form-control" rows="3" name="skills_and_expertise">{{ old('skills_and_expertise', is_array($personalData->skills_and_expertise ?? null) ? implode(', ', $personalData->skills_and_expertise) : ($personalData->skills_and_expertise ?? '')) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Pengalaman Kerja (pisahkan dengan 2 baris kosong)</label>
                                <textarea class="form-control" rows="5" name="work_experience">{{ old('work_experience', is_array($personalData->work_experience ?? null) ? implode('\n\n', $personalData->work_experience) : ($personalData->work_experience ?? '')) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Pendidikan (pisahkan dengan 2 baris kosong)</label>
                                <textarea class="form-control" rows="5" name="education">{{ old('education', is_array($personalData->education ?? null) ? implode('\n\n', $personalData->education) : ($personalData->education ?? '')) }}</textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('personal-data.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>