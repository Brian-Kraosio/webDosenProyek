<div class="container" style="font-size: 20px !important">
<div class="row mt-1">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>
</div>
    <div class="row mt-1">
    <div class="col-md-9">
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Data Dosen</a>
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen/statusDosen"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Dosen Status</a>
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen/mengajarDosen"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Dosen Mengajar</a>
        </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
            <thead>
                <tr>
                    <th>#</th>
                    <th>KODE</th>
                    <th>Nama</th>
                    <th>Nama Homebase</th>
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
                        <td><?= $dsn["nama_homebase"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
            
