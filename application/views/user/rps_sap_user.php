<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
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
    <div class="container">
        <div class="col-mt-3">
            <h4></h4>
            <h4>RPS</h4> <hr>
        </div>
<div class="row mt-4">
            <?php foreach($rpssap as $rps): ?>
                <?php
                // In this code is used for limit the spec description to 75 Char only
    if (strlen($rps['RPS']) > 20) {
        $rps['RPS']= substr($rps['RPS'], 0, 20) . "...";
      }
    ?>
            <div class="col-md-4">
                    <div class="card bg-light mt-3  md-3" style="width: 18rem;">
                    <!-- In image we call the image name from database and then call the image from the folder -->
                    <img class="card-img-top" src="<?php echo base_url().'assets/images/word.png'?>" style="width: 150px !important;  display: block !important; margin: 0 auto !important;"  alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $rps['nama_mata_kuliah']; ?></h5>
                    <p class="card-text"><?=$rps['RPS']; ?></p>
                    <?php if ($rps['RPS'] != null && $rps['SAP'] != null ) { ?>
                    <a href="<?= base_url(); ?>user/rps_sap_user/downloadRPS/<?= $rps['RPS']; ?>" class="btn btn-info">Download</a></td>
                    <a href="<?= base_url(); ?>user/rps_sap_user/editRPS/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td> <br>
                    <?php } elseif ($rps['RPS'] == null && $rps['SAP'] != null){?>
                        <a href="<?= base_url(); ?>user/rps_sap_user/editRPS/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td>
                    <?php } elseif ($rps['RPS'] != null && $rps['SAP'] == null){?>
                        <a href="<?= base_url(); ?>user/rps_sap_user/downloadRPS/<?= $rps['RPS']; ?>" class="btn btn-info">Download</a></td>
                        <a href="<?= base_url(); ?>user/rps_sap_user/editRPS/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td>
                    <?php }elseif ($rps['RPS'] == null && $rps['SAP'] == null){?>
                        <a href="<?= base_url(); ?>user/rps_sap_user/tambahRPS/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td>
                    <?php }?>
                    <div class="card-footer text-muted" style="font-size: 15px;">
                    Code MK = <?=$rps['kode_mk']?>
                </div>
                </div>
            </div>
    </div>
    <!-- End of card content -->
    <?php endforeach; ?>
    </div>
    <div class="container">
        <div class="col-mt-3">
            <h4></h4><hr>
            <h4>SAP</h4> <hr>
        </div>
<div class="row mt-4">
            <?php foreach($rpssap as $rps): ?>
                <?php
                // In this code is used for limit the spec description to 75 Char only
    if (strlen($rps['SAP']) > 20) {
        $rps['SAP']= substr($rps['SAP'], 0, 20) . "...";
      }
    ?>
            <div class="col-md-4">
                    <div class="card bg-light mt-3 md-3 " style="width: 18rem;">
                    <!-- In image we call the image name from database and then call the image from the folder -->
                    <img class="card-img-top" src="<?php echo base_url().'assets/images/word.png'?>" style="width: 150px !important;  display: block !important; margin: 0 auto !important;"  alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $rps['nama_mata_kuliah']; ?></h5>
                    <p class="card-text"><?=$rps['SAP']; ?></p>
                    <?php if ($rps['RPS'] != null && $rps['SAP'] != null ) { ?>
                    <a href="<?= base_url(); ?>user/rps_sap_user/downloadRPS/<?= $rps['SAP']; ?>" class="btn btn-info">Download</a></td>
                    <a href="<?= base_url(); ?>user/rps_sap_user/editSAP/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td> <br>
                    <?php } elseif ($rps['RPS'] != null && $rps['SAP'] == null){?>
                        <a href="<?= base_url(); ?>user/rps_sap_user/editSAP/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td>
                    <?php } elseif ($rps['RPS'] == null && $rps['SAP'] != null){?>
                        <a href="<?= base_url(); ?>user/rps_sap_user/downloadRPS/<?= $rps['SAP']; ?>" class="btn btn-info">Download</a></td>
                        <a href="<?= base_url(); ?>user/rps_sap_user/editSAP/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td>
                    <?php }elseif ($rps['RPS'] == null && $rps['SAP'] == null){?>
                        <a href="<?= base_url(); ?>user/rps_sap_user/tambahSAP/<?= $rps['kode_mk']; ?>" class="btn btn-warning">Upload</a></td>
                    <?php }?>
                    <div class="card-footer text-muted" style="font-size: 15px;">
                    Code MK = <?=$rps['kode_mk']?>
                </div>
                </div>
            </div>
    </div>
    <!-- End of card content -->
    <?php endforeach; ?>
    </div>
</div>
