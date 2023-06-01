<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-4">
            <?php if (isset($_SESSION['message'])) {  ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            }  ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Task title" autofocus>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" placeholder="Task Description" class="form-control"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success" name="save_task" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>descripcion</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tasks";
                    $result_tasks = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result_tasks) > 0) {
                    while ($row = mysqli_fetch_array($result_tasks)) {
                    ?>
                        <tr>
                            <td ><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                            <a class="btn btn-primary" href="edit.php?id=<?=  $row['id'] ?>" role="button" aria-disabled="true"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-warning" href="delete_task.php?id=<?=  $row['id'] ?>" role="button" aria-disabled="true"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php  }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>