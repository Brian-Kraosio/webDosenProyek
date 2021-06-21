<div class="container" style="font-size: 20px !important">
    <div class="row mt-1">
        <div class="col-md-12">
            <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
        </div>
    </div>
    <div class="row mt-1">
    <div class="col-md-9">
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dosen_menjabat"class="btn btn-info"><span class="fa fa-info mr-2"></span>Show Raw Data </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col md-12">
        <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
            <thead>
                <tr>
                    <th>#</th>
                    <th>KODE</th>
                    <th>Nama</th>
                    <th>Nama Jabatan</th>
                    <th>Tahun Menjabat</th>
                    <th>Semester Menjabat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dosen_menjabat as $djm) {?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $djm["KODE"]; ?></td>
                        <td><?= $djm["Nama"]; ?></td>
                        <td><?= $djm["nama_jabatan"]; ?></td>
                        <td><?= $djm["tahun_menjabat"]; ?></td>
                        <td><?= $djm["semester_menjabat"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
