<?php include 'C:/xampp/htdocs/tskmgr/app/views/paartials/header.php'; ?>

<h1 class="text-center mb-4">Crear Nueva Tarea</h1>

<form action="index.php?action=create" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Crear Tarea</button>
</form>

<?php include 'C:/xampp/htdocs/tskmgr/app/views/paartials/footer.php'; ?>
