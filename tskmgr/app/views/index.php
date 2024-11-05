<?php 
$base_url = '/tskmgr/app/views/';
?>

<?php include 'C:/xampp/htdocs/tskmgr/app/views/paartials/header.php'; ?>

<h1 class="text-center mb-4">Lista de Tareas</h1>

<div class="text-center mb-3">
    <a href="<?php echo $base_url; ?>create.php" class="btn btn-primary">Crear Nueva Tarea</a>
</div>

<?php if (isset($tasks) && is_array($tasks) && count($tasks) > 0): ?>
    <ul class="list-group">
        <?php foreach ($tasks as $task): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?>
                <span>
                    <a href="edit.php?id=<?php echo intval($task['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <div class="alert alert-info text-center">
        No hay tareas disponibles. Puedes crear una nueva tarea.
    </div>
<?php endif; ?>

<!-- Formulario para agregar nueva tarea -->
<h2 class="mt-4">Agregar Nueva Tarea</h2>
<form action="<?php echo $base_url; ?>create.php" method="POST"> <!-- Cambiado aquí -->
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Tarea</button>
</form>

<?php include 'C:/xampp/htdocs/tskmgr/app/views/paartials/footer.php'; ?>
