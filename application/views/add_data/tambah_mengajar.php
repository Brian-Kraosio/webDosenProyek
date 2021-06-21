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
                            <label for="id_mengajar" style="font-size: 20px !important">ID Mengajar</label>
                            <input type="number" name="id_mengajar" class="form-control" id="id_mengajar" placeholder="ID Mengajar">
                        </div>
                        <div class="form-group">
                            <label for="tipe_pelajaran">Tipe Pelajaran</label>
                            <input type="text" name="tipe_pelajaran" class="form-control" id="tipe_pelajaran" placeholder="Tipe Pelajaran"> 
                        </div>
                            <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/mengajar" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
