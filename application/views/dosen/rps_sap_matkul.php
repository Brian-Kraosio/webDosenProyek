<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>

    <div class="row mt-1">
    <div class="col-md-9">
    <a style="font-size: 20px !important" href="<?= base_url();?>admin/rps_sap"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Raw Data</a>
    </div>
    </div>
    
<?php if ($this->session->flashdata('flash-data')) : ?>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col md-12">
    <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Tipe Mata Kuliah</th>
                <th>RPS</th>
                <th>SAP</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
            $no = 1;
            foreach ($rpssap as $rps) {?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $rps["kode_mk"]?></td>
                    <td><?= $rps["nama_mata_kuliah"]?></td>
                    <td><?= $rps["tipe_mata_kuliah"]?></td>
                    <td><a href="<?= base_url(); ?>admin/rps_sap/downloadRPS/<?= $rps['RPS']?> "onclick="return confirm('Are you sure want to download this RPS?')"><?= $rps["RPS"]; ?></a></td>
                    <td><a href="<?= base_url(); ?>admin/rps_sap/downloadSAP/<?= $rps['SAP']?> "onclick="return confirm('Are you sure want to download this SAP?')"><?= $rps["SAP"]; ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        </div>
        </div>
</div>
