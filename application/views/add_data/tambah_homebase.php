<div class="container">
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="card bg-info text-white">
                <div class="card-header" style="font-size: 20px !important">
                    <?= $title ?>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="id_homebase" style="font-size: 20px !important">ID Homebase</label>
                            <input type="number" name="id_homebase" class="form-control" id="id_homebase" placeholder="ID Homebase">
                        </div>
                        <div class="form-group">
                            <label for="nama_homebase">Homebase Name</label>
                            <input type="text" name="nama_homebase" class="form-control" id="nama_homebase" placeholder="Homebase Name"> 
                            <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/homebase" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
