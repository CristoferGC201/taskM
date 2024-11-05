<?php include __DIR__ . '/../paartials/header.php'; ?>

<h1 class="text-center mb-4">Editar Tarea</h1>

<?php if ($task): ?>
    <form action="index.php?action=update&id=<?php echo $task['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
    </form>
<?php else: ?>
    <div class="alert alert-danger">Tarea no encontrada.</div>
<?php endif; ?>

<?php include __DIR__ . '/../paartials/footer.php'; ?>
