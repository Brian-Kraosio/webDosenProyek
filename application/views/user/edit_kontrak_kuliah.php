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
                    <form action="" method="post" id="forminput" enctype="multipart/form-data">
                        <div class="form-group">
                            <label hidden for="id_matkul">Kode Mata Kuliah</label>
                            <input hidden type="text" name="id_matkul" class="form-control" id="id_matkul" placeholder="KODE Mata Kuliah" value="<?= $kontrak['id_matkul'] ?>" >
                        </div>
                        <div class="form-group">
                            <label for="file" style="font-size: 20px !important">Kontrak Kuliah</label> <br>
                            <input type="file" style="font-size: 20px !important" name="file" /><br><br>
                            <input type="hidden" style="font-size: 20px !important" name="old_Kontrak" value="<?= $kontrak['file'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label  for="uploader" style="font-size: 20px !important">uploader</label> <br>
                            <input   type="text" style="font-size: 20px !important" name="uploader" value="<?=$this->session->userdata('user')?>">
                        </div>
                        <button style="font-size: 20px !important" value="simpan" type="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>user/kontrak_kuliah" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
