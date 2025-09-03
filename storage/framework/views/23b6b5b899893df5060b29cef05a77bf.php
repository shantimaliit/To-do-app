<!DOCTYPE html>
<html>
<head>
    <title>Laravel To-Do App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="container mt-5">

    <h1 class="mb-4">📝 My To-Do List</h1>

    <form action="<?php echo e(route('tasks.store')); ?>" method="POST" class="d-flex mb-4">
        <?php echo csrf_field(); ?>
        <input type="text" name="title" class="form-control me-2" placeholder="Add new task">
        <button class="btn btn-primary">Add</button>
    </form>

    <ul class="list-group">
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item d-flex justify-content-between align-items-center 
            <?php echo e($task->is_completed ? 'bg-light' : ''); ?>">
            
            <div class="d-flex align-items-center gap-2">
                <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <button class="btn btn-sm <?php echo e($task->is_completed ? 'btn-success' : 'btn-warning'); ?>">
                        <?php echo e($task->is_completed ? '✔' : '○'); ?>

                    </button>
                </form>

                <span class="<?php echo e($task->is_completed ? 'text-decoration-line-through text-muted' : ''); ?>">
                    <?php echo e($task->title); ?>

                </span>
            </div>

            <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-danger">Remove</button>
            </form>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\todoapp\resources\views/tasks/index.blade.php ENDPATH**/ ?>