<div class="container" style="font-size: 20px !important">
<div class="row mt-1">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>
</div>
    <div class="row mt-1">
    <div class="col-md-9">
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Data Dosen</a>
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen/homebaseDosen"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Dosen Homebase</a>
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen/statusDosen"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Dosen Status</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tipe Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dosen as $dsn) {?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $dsn["KODE"]; ?></td>
                        <td><?= $dsn["Nama"]; ?></td>
                        <td><?= $dsn["tipe_pelajaran"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
            
