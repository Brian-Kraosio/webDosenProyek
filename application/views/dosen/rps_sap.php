<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>

    <div class="row mt-1">
    <div class="col-md-9">
    <a style="font-size: 20px !important" href="<?= base_url();?>admin/rps_sap/rps_sap_matkul"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Detailed Data</a>
        <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/rps_sap/tambahRPS" class="btn btn-warning"><span class="fa fa-plus-square mr-2"></span>Add RPS & SAP Data</a>
    </div>
    </div>
    
<?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-9">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?=$title?> <strong> Sucessfully </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col md-12">
    <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Mata Kuliah</th>
                <th>RPS</th>
                <th>SAP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
            $no = 1;
            foreach ($rpssap as $rps) {?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $rps["kode_mk"]?></td>
                    <td><a href="<?= base_url(); ?>admin/rps_sap/downloadRPS/<?= $rps['RPS']?> "onclick="return confirm('Are you sure want to download this RPS?')"><?= $rps["RPS"]; ?></a></td>
                    <td><a href="<?= base_url(); ?>admin/rps_sap/downloadSAP/<?= $rps['SAP']?> "onclick="return confirm('Are you sure want to download this SAP?')"><?= $rps["SAP"]; ?></a></td>
                    <td> <a href="<?= base_url(); ?>admin/rps_sap/deleteRPS/<?= $rps['id_rps_sap']; ?>" onclick="return confirm('Are you sure want to delete this data?')"><span class="fa fa-minus-circle" style="color: red"></span> Delete</a>
                <br><a href="<?= base_url(); ?>admin/rps_sap/editRPS/<?= $rps['id_rps_sap'] ?>"><span class="fa fa-pencil-square-o mr-1"></span>Edit</a> </td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        </div>
        </div>
    <div class="row mt-3">
            <div class="card bg-success text-white col-md-4">
                <div class="card-header">Export <?=$title?> Data</div>
                <div class="card-body ">
                    <a style="font-size: 20px !important; " href="<?= base_url(); ?>admin/rps_sap/generateXls" class="btn btn-light"><span class="fa fa-file-excel-o mr-2"></span>Export <?=$title?></a> <br><br>
                </div>
            </div>
        </div>
</div>
