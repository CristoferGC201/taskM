<?php
// app/controllers/TaskController.php

/**
 * TaskController
 * 
 * Este controlador maneja todas las operaciones relacionadas con las tareas.
 * Se conecta con el modelo Task para realizar operaciones CRUD.
 */
class TaskController {
    private $taskModel; // Corregido: Añadido el signo de dólar ($)

    /**
     * Constructor de TaskController.
     * 
     * @param object $db - Instancia de la conexión a la base de datos.
     */
    public function __construct($db) {
        $this->taskModel = new Task($db);
    }

    /**
     * Método index.
     * 
     * Obtiene todas las tareas y las muestra en la vista index.php.
     */
    public function index(): void {
        $tasks = $this->taskModel->getAllTasks();
        include 'app/views/index.php';
    }

    /**
     * Método edit.
     * 
     * Carga una tarea específica por su ID y la muestra en la vista edit.php.
     * 
     * @param int $id - ID de la tarea a editar.
     */
    public function edit($id) {
        $task = $this->taskModel->getTaskById($id);
        include 'app/views/edit.php';
    }

    /**
     * Método update.
     * 
     * Actualiza los detalles de una tarea en la base de datos y redirige a la página principal.
     * 
     * @param int $id - ID de la tarea.
     * @param string $title - Nuevo título de la tarea.
     * @param string $description - Nueva descripción de la tarea.
     */
    public function update($id, $title, $description) {
        $this->taskModel->updateTask($id, $title, $description);
        header("Location: /tskmrg/index.php");
        exit();
    }

    /**
     * Método delete.
     * 
     * Elimina una tarea por su ID y redirige a la página principal.
     * 
     * @param int $id - ID de la tarea a eliminar.
     */
    public function delete($id) {
        $this->taskModel->deleteTask($id);
        header("Location: /tskmrg/index.php");
        exit();
    }

    /**
     * Método create.
     * 
     * Crea una nueva tarea y redirige a la página principal.
     * 
     * @param string $title - Título de la nueva tarea.
     * @param string $description - Descripción de la nueva tarea.
     */
    public function create($title, $description) {
        $this->taskModel->createTask($title, $description);
        header("Location: /tskmrg/index.php");
        exit();
    }
}
