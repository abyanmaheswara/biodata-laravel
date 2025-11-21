<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - {{ $personalData['name'] }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Data Pribadi</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="{{ route('personal-data.update') }}" method="POST">
                            @csrf 
                            @method('PUT') 
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="{{ $personalData['name'] }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Job Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $personalData['title'] }}">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $personalData['email'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $personalData['phone'] }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Summary</label>
                                <textarea class="form-control" rows="4" name="summary">{{ $personalData['summary'] }}</textarea>
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