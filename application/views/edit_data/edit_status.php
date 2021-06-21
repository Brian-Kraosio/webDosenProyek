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
                            <label for="id_status" style="font-size: 20px !important">ID Status</label>
                            <input type="number" name="id_status" class="form-control" id="id_status" placeholder="ID Status" value="<?=$status['id_status'] ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Name</label>
                            <input type="text" name="status" class="form-control" id="status" placeholder="Status Name" value="<?= $status['status'] ?> "> 
                        </div>
                        <div class="form-group">
                            <label for="kode_status">Status Code</label>
                            <input type="text" name="kode_status" class="form-control" id="kode_status" placeholder="Status Code" value="<?= $status['kode_status'] ?> "> 
                        </div>
                            <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/status" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
