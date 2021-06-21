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
                            <label hidden for="kode_mk">Kode Mata Kuliah</label>
                            <input hidden type="text" name="kode_mk" class="form-control" id="kode_mk" placeholder="KODE Mata Kuliah" value="<?= $rpssap["kode_mk"]?>">
                        </div>
                        <div class="form-group">
                            <label for="RPS" style="font-size: 20px !important">RPS</label> <br>
                            <input type="file" style="font-size: 20px !important" name="RPS"/>
                            <input type="hidden" style="font-size: 20px !important" name="old_RPS" value="<?=$rpssap["RPS"]?>"/>
                        </div>
                        <div class="form-group">
                            <label hidden for="SAP" style="font-size: 20px !important">SAP</label>
                            <input hidden type="file" style="font-size: 20px !important" name="SAP"/>
                            <input hidden type="hidden" style="font-size: 20px !important" name="old_SAP" value="<?=$rpssap["SAP"]?>"/>
                        </div>
                        <br>
                        <button style="font-size: 20px !important" value="simpan" type="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>user/rps_sap_user" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>