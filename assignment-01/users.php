<?php 

require_once 'db.php';

$users = DB::getInstance()->fetchAll('SELECT * FROM users');
// print_r($users);


include 'include/header.php';

?>

    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="card-title">Registered Users</h1>
                    <a href="index.php" class="btn btn-primary">+</a>
                </div>

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registred at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>

                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo date_format(date_create($user['created_at']), 'd M, Y H:i a'); ?></td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include 'include/footer.php'; ?>