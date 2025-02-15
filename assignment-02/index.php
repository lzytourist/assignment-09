<?php

require_once 'init.php';

include 'inc/header.php';

$car_obj = new Car();

$cars = $car_obj->all();
?>

<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCar">+</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($cars) > 0): ?>
                        <?php foreach ($cars as $car): ?>
                            <tr>
                                <td><?php echo $car->id; ?></td>
                                <td><?php echo $car->brand; ?></td>
                                <td><?php echo $car->model; ?></td>
                                <td><?php echo $car->year; ?></td>
                                <td><?php echo $car->price; ?></td>
                                <td class="text-center btn-group d-block">
                                    <button 
                                        id="editCarBtn"
                                        data-id="<?php echo $car->id; ?>" 
                                        data-brand="<?php echo $car->brand; ?>" 
                                        data-model="<?php echo $car->model; ?>" 
                                        data-year="<?php echo $car->year; ?>" 
                                        data-price="<?php echo $car->price; ?>" 
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="action.php" method="post" class="d-inline">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $car->id; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No cars listed yet!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addCar">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="action.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add a car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <input type="hidden" name="action" value="add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" name="model" id="model" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" name="year" id="year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editCar">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="action.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Edit car details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" name="model" id="model" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" name="year" id="year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

include 'inc/footer.php';

