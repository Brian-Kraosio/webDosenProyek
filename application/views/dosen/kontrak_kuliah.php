<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>

    <div class="row mt-1">
    <div class="col-md-9">
    <a style="font-size: 20px !important" href="<?= base_url();?>admin/kontrak_kuliah/kontrak_kuliah_matkul"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Detailed Data</a>
        <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/kontrak_kuliah/tambahKontrak" class="btn btn-warning"><span class="fa fa-plus-square mr-2"></span>Add Kontrak Kuliah Data</a>
    </div>
    </div>
    
<?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?=$title?> <strong> Sucessfully </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
            <div class="col-md-12">
    <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Mata Kuliah</th>
                <th>Kontrak File Name</th>
                <th>uploader</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
            $no = 1;
            foreach ($kontrak as $ktk) {?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ktk["id_matkul"]?></td>
                    <td><a href="<?= base_url(); ?>admin/kontrak_kuliah/downloadKontrak/<?= $ktk['file']?> "onclick="return confirm('Are you sure want to download this Kontrak File?')"><?= $ktk["file"]; ?></a></td>
                    <td><?= $ktk["uploader"]; ?></td>
                    <td> <a href="<?= base_url(); ?>admin/kontrak_kuliah/deleteKontrak/<?= $ktk['id_kontrak']; ?>" onclick="return confirm('Are you sure want to delete this data?')"><span class="fa fa-minus-circle" style="color: red"></span> Delete</a>
                <br><a href="<?= base_url(); ?>admin/kontrak_kuliah/editKontrak/<?= $ktk['id_kontrak'] ?>"><span class="fa fa-pencil-square-o mr-1"></span>Edit</a> </td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
            </div>
            </div>
    <div class="row mt-4">
        <div class="card bg-success text-white col-md-5">
            <div class="card-header">Export <?=$title?> data</div>
            <div class="card-body ">
                <a style="font-size: 20px !important; " href="<?= base_url(); ?>admin/kontrak_kuliah/generateXls" class="btn btn-light"><span class="fa fa-file-excel-o mr-2"></span>Export <?=$title?></a> <br><br>
            </div>
        </div>
    </div>
    </div>
</div>
