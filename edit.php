<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    } else {
        $_SESSION['message'] = 'Tarea a editar no existe';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $_SESSION['message'] = 'Tarea editada con exito';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}

include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-4 mx-auto">

            <div class="card card-body">
                <form action="edit.php?id=<?= $_GET['id']; ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Update Task" autofocus value="<?= $title; ?>">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" placeholder="Update Description" class="form-control"><?= $description; ?></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success" name="update" value="Edit">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php');
