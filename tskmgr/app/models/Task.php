<?php
// app/models/Task.php

/**
 * Clase Task
 * 
 * Esta clase maneja todas las operaciones de la base de datos relacionadas con las tareas.
 */
class Task {
    private $db;

    /**
     * Constructor de Task.
     * 
     * @param object $db - Instancia de la conexión a la base de datos.
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Obtener todas las tareas.
     * 
     * @return array - Lista de todas las tareas.
     */
    public function getAllTasks() {
        $sql = "SELECT * FROM tasks"; // Corregido: Se especifican todas las columnas
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener una tarea por ID.
     * 
     * @param int $id - ID de la tarea.
     * @return array - Datos de la tarea.
     */
    public function getTaskById($id) {
        $sql = "SELECT * FROM tasks WHERE id = :id"; // Corregido: Se especifican todas las columnas
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crear una nueva tarea.
     * 
     * @param string $title - Título de la tarea.
     * @param string $description - Descripción de la tarea.
     */
    public function createTask($title, $description) {
        $sql = "INSERT INTO tasks (title, description) VALUES (:title, :description)";
        $stmt = $this->db->prepare($sql); // Corregido: Preparación de la consulta
        $stmt->execute(['title' => $title, 'description' => $description]);
    }

    /**
     * Actualizar una tarea existente.
     * 
     * @param int $id - ID de la tarea.
     * @param string $title - Nuevo título de la tarea.
     * @param string $description - Nueva descripción de la tarea.
     */
    public function updateTask($id, $title, $description) {
        $sql = "UPDATE tasks SET title = :title, description = :description WHERE id = :id"; // Corregido: Completar la consulta UPDATE
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id, 'title' => $title, 'description' => $description]);
    }

    /**
     * Eliminar una tarea.
     * 
     * @param int $id - ID de la tarea.
     */
    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($sql); // Corregido: Declaración del parámetro $id
        $stmt->execute(['id' => $id]);
    }
}
?>
