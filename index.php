<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-4">
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
            .card>.card-body
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>