<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        $_SESSION['message'] = 'Fallo al eliminar';
        $_SESSION['message_type'] = 'Warning';
        die('Fallo consulat');
    }

    $_SESSION['message'] = 'Tarea Eliminada con exito';
    $_SESSION['message_type'] = 'danger';
    header('Location: index.php');
}
