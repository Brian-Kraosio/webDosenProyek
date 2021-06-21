<div class="container" style="font-size: 20px !important">
    <div class="row mt-1">
        <div class="col-md-12">
            <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
        </div>
    </div>
    <div class="row mt-1">
    <div class="col-md-9">
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/dpa"class="btn btn-info"><span class="fa fa-info mr-2"></span>Show Raw Data </a>
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
                    <th>Nama Kelas</th>
                    <th>DPA Tahun</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dpa as $dpa) {?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $dpa["KODE"]; ?></td>
                        <td><?= $dpa["Nama"]; ?></td>
                        <td><?= $dpa["nama_kelas"]; ?></td>
                        <td><?= $dpa["dpa_tahun"]; ?></td>
                        <td><?= $dpa["semester"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
