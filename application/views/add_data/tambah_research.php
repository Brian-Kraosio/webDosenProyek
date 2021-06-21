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
                            <label for="id_research" style="font-size: 20px !important">ID Research</label>
                            <input type="number" name="id_research" class="form-control" id="id_research" placeholder="ID Research">
                        </div>
                        <div class="form-group">
                            <label for="nama_research">Research Name</label>
                            <input type="text" name="nama_research" class="form-control" id="nama_research" placeholder="Research Name"> 
                            <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/research" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
