<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($personalData ? 'Edit Data - ' . $personalData->name : 'Tambah Data Pribadi'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><?php echo e($personalData ? 'Edit Data Pribadi' : 'Tambah Data Pribadi'); ?></h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="<?php echo e(route('personal-data.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field('PUT'); ?> 
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Foto Profil</label>
                                <?php if($personalData && $personalData->profile_photo): ?>
                                    <div class="mb-2">
                                        <img src="<?php echo e(asset('storage/' . $personalData->profile_photo)); ?>" alt="Profile Photo" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" name="profile_photo">
                                <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $personalData->name ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Jabatan</label>
                                <input type="text" class="form-control" name="title" value="<?php echo e(old('title', $personalData->title ?? '')); ?>">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email', $personalData->email ?? '')); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone', $personalData->phone ?? '')); ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="date_of_birth" value="<?php echo e(old('date_of_birth', $personalData && $personalData->date_of_birth ? \Carbon\Carbon::parse($personalData->date_of_birth)->format('Y-m-d') : '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" name="address" value="<?php echo e(old('address', $personalData->address ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Kewarganegaraan</label>
                                <input type="text" class="form-control" name="nationality" value="<?php echo e(old('nationality', $personalData->nationality ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">LinkedIn URL</label>
                                <input type="url" class="form-control" name="linkedin" value="<?php echo e(old('linkedin', $personalData->linkedin ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">GitHub URL</label>
                                <input type="url" class="form-control" name="github" value="<?php echo e(old('github', $personalData->github ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Ringkasan</label>
                                <textarea class="form-control" rows="4" name="summary"><?php echo e(old('summary', $personalData->summary ?? '')); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Keahlian & Keahlian (pisahkan dengan koma)</label>
                                <textarea class="form-control" rows="3" name="skills_and_expertise"><?php echo e(old('skills_and_expertise', is_array($personalData->skills_and_expertise ?? null) ? implode(', ', $personalData->skills_and_expertise) : ($personalData->skills_and_expertise ?? ''))); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Pengalaman Kerja (pisahkan dengan 2 baris kosong)</label>
                                <textarea class="form-control" rows="5" name="work_experience"><?php echo e(old('work_experience', is_array($personalData->work_experience ?? null) ? implode('\n\n', $personalData->work_experience) : ($personalData->work_experience ?? ''))); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Pendidikan (pisahkan dengan 2 baris kosong)</label>
                                <textarea class="form-control" rows="5" name="education"><?php echo e(old('education', is_array($personalData->education ?? null) ? implode('\n\n', $personalData->education) : ($personalData->education ?? ''))); ?></textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="<?php echo e(route('personal-data.index')); ?>" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Politeknik Manufaktur Bandung\SEMESTER 3\P. PEMROGRAMAN WEB\biodata\resources\views/personal-data/edit.blade.php ENDPATH**/ ?>