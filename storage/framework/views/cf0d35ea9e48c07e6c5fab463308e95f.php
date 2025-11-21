<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - <?php echo e($personalData['name']); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
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
                        
                        <form action="<?php echo e(route('personal-data.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field('PUT'); ?> 
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($personalData['name']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Job Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo e($personalData['title']); ?>">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo e($personalData['email']); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo e($personalData['phone']); ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Summary</label>
                                <textarea class="form-control" rows="4" name="summary"><?php echo e($personalData['summary']); ?></textarea>
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