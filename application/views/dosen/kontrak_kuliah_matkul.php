<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>

    <div class="row mt-1">
    <div class="col-md-9">
    <a style="font-size: 20px !important" href="<?= base_url();?>admin/kontrak_kuliah"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Raw Data</a>
    </div>
    </div>
    <div class="row mt-3">
            <div class="col-md-12">
    <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Tipe Mata Kuliah</th>
                <th>Kontrak File Name</th>
                <th>uploader</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
            $no = 1;
            foreach ($kontrak as $ktk) {?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ktk["id_matkul"]?></td>
                    <td><?= $ktk["nama_mata_kuliah"]?></td>
                    <td><?= $ktk["tipe_mata_kuliah"]?></td>
                    <td><a href="<?= base_url(); ?>admin/kontrak_kuliah/downloadKontrak/<?= $ktk['file']?> "onclick="return confirm('Are you sure want to download this Kontrak File?')"><?= $ktk["file"]; ?></a></td>
                    <td><?= $ktk["uploader"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
            </div>
            </div>
    </div>
</div>
