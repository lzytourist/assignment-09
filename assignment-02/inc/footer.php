    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function () {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('.modal').modal();

            $('#editCarBtn').click(function () {
                $('#editCar').modal('show');

                $('#editCar input[name="id"]').val($(this).data('id'));
                $('#editCar input[name="brand"]').val($(this).data('brand'));
                $('#editCar input[name="model"]').val($(this).data('model'));
                $('#editCar input[name="year"]').val($(this).data('year'));
                $('#editCar input[name="price"]').val($(this).data('price'));
            });

            $('form').validate({
                rules: {
                    brand: {
                        required: true
                    },
                    model: {
                        required: true
                    },
                    price: {
                        required: true
                    }
                },
                errorClass: 'is-invalid text-danger',
            });
        });

        <?php if(isset($_SESSION['success'])): ?>
            toastr.success('<?php echo $_SESSION['success']; ?>');
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            toastr.error('<?php echo $_SESSION['error']; ?>');
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

    </script>
</body>
</html>