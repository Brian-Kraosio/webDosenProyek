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
                            <label hidden for="id_kelas" style="font-size: 20px !important">ID Kelas</label>
                            <input hidden type="number" name="id_kelas" class="form-control" id="id_kelas" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="nama_kelas">Class Name</label>
                            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Exp : TI - / MI -"> 
                            <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/kelas" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
