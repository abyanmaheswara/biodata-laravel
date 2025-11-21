<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Keren - <?php echo e($profile->name ?? 'User'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            /* Background Animasi Bergerak */
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Kartu Kaca (Glassmorphism) */
        .card-custom {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            overflow: hidden;
            color: white;
        }

        /* Foto Profil Unik */
        .profile-box {
            position: relative;
            display: inline-block;
        }
        
        .profile-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.5);
            transition: transform 0.5s;
        }

        .profile-box:hover .profile-img {
            transform: scale(1.05) rotate(3deg);
            border-color: #fff;
        }

        /* Tombol Sosmed */
        .social-link {
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.2);
            color: white;
            border-radius: 12px;
            margin: 0 5px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 1.2rem;
        }

        .social-link:hover {
            background: white;
            color: #e73c7e;
            transform: translateY(-5px);
        }

        /* Skill Badge */
        .badge-skill {
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 8px 15px;
            border-radius: 20px;
            margin-bottom: 5px;
            display: inline-block;
            font-weight: normal;
            transition: 0.3s;
        }
        .badge-skill:hover {
            background: white;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-custom p-4 p-lg-5" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="row align-items-center">
                        
                        <div class="col-md-5 text-center border-end border-white border-opacity-25">
                            <div class="profile-box mb-4" data-aos="fade-down" data-aos-delay="300">
                                <?php if(isset($profile->photo) && $profile->photo && file_exists(public_path('storage/' . $profile->photo))): ?>
                                    <img src="<?php echo e(asset('storage/' . $profile->photo)); ?>" alt="Foto Profil" class="profile-img shadow">
                                <?php else: ?>
                                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($profile->name ?? 'User')); ?>&background=random&size=180&bold=true" alt="Default" class="profile-img shadow">
                                <?php endif; ?>
                            </div>

                            <h2 class="fw-bold mb-1"><?php echo e($profile->name ?? 'Nama Belum Diisi'); ?></h2>
                            <p class="text-white-50 mb-4"><?php echo e($profile->role ?? 'Web Developer'); ?></p>

                            <div class="d-flex justify-content-center mb-4">
                                <?php if(!empty($profile->instagram)): ?> 
                                    <a href="<?php echo e($profile->instagram); ?>" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if(!empty($profile->linkedin)): ?> 
                                    <a href="<?php echo e($profile->linkedin); ?>" target="_blank" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                                <?php endif; ?>
                                <?php if(!empty($profile->github)): ?> 
                                    <a href="<?php echo e($profile->github); ?>" target="_blank" class="social-link"><i class="fab fa-github"></i></a>
                                <?php endif; ?>
                            </div>
                            
                            <button class="btn btn-light w-75 rounded-pill fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fas fa-edit me-2"></i> Edit Biodata
                            </button>
                        </div>

                        <div class="col-md-7 ps-md-5 mt-4 mt-md-0">
                            <div data-aos="fade-left" data-aos-delay="500">
                                <h4 class="fw-bold border-bottom border-white border-opacity-25 pb-2 mb-3">
                                    <i class="fas fa-user-astronaut me-2"></i> Tentang Saya
                                </h4>
                                <p class="opacity-75" style="line-height: 1.8;">
                                    <?php echo e($profile->about ?? 'Deskripsi diri belum ditambahkan. Klik tombol Edit untuk mengisi biodata Anda.'); ?>

                                </p>
                            </div>

                            <div class="mt-5" data-aos="fade-up" data-aos-delay="700">
                                <h4 class="fw-bold border-bottom border-white border-opacity-25 pb-2 mb-3">
                                    <i class="fas fa-code me-2"></i> Skills
                                </h4>
                                <div>
                                    <?php if(!empty($profile->skills)): ?>
                                        <?php $__currentLoopData = explode(',', $profile->skills); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge-skill"><?php echo e(trim($skill)); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <span class="text-white-50 small">Belum ada skill.</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content text-dark border-0 rounded-4 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold"><i class="fas fa-cogs me-2"></i> Update Biodata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control rounded-3" value="<?php echo e($profile->name ?? ''); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold form-label">Role / Pekerjaan</label>
                                <input type="text" name="role" class="form-control rounded-3" value="<?php echo e($profile->role ?? ''); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold form-label">Tentang Saya</label>
                            <textarea name="about" class="form-control rounded-3" rows="3"><?php echo e($profile->about ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold form-label">Skills (Pisahkan koma)</label>
                            <input type="text" name="skills" class="form-control rounded-3" value="<?php echo e($profile->skills ?? ''); ?>" placeholder="Contoh: PHP, Laravel, Design">
                        </div>

                        <div class="row bg-light p-3 rounded-3 mb-3 mx-1">
                            <p class="fw-bold mb-2 small text-uppercase text-muted">Social Media</p>
                            <div class="col-md-4 mb-2">
                                <input type="text" name="instagram" class="form-control form-control-sm" placeholder="Link Instagram" value="<?php echo e($profile->instagram ?? ''); ?>">
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="text" name="linkedin" class="form-control form-control-sm" placeholder="Link LinkedIn" value="<?php echo e($profile->linkedin ?? ''); ?>">
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="text" name="github" class="form-control form-control-sm" placeholder="Link GitHub" value="<?php echo e($profile->github ?? ''); ?>">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold form-label">Update Foto</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init(); // Nyalakan animasi
    </script>
</body>
</html><?php /**PATH D:\Politeknik Manufaktur Bandung\SEMESTER 3\P. PEMROGRAMAN WEB\biodata\resources\views/biodata.blade.php ENDPATH**/ ?>