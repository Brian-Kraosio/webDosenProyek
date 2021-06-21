<div class="container" style="font-size: 20px !important">

    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-9">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $title ?> <strong> Sucessfully </strong> <?= $this->session->flashdata('flash-data'); ?>
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
            <h4>Kontrak Kuliah</h4>
            <hr>
        </div>
        <div class="row mt-4">
            <?php foreach ($kontrak as $ktk) : ?>
                <?php
                // In this code is used for limit the spec description to 75 Char only
                if (strlen($ktk['file']) > 20) {
                    $ktk['file'] = substr($ktk['file'], 0, 20) . "...";
                }
                ?>
                <div class="col-md-4">
                    <div class="card bg-light mt-3 md-3" style="width: 18rem;">
                        <!-- In image we call the image name from database and then call the image from the folder -->
                        <img class="card-img-top" src="<?php echo base_url() . 'assets/images/excel.png' ?>" style="width: 150px !important;  display: block !important; margin: 0 auto !important;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $ktk['nama_mata_kuliah']; ?></h5>
                            <p class="card-text"><?= $ktk['file']; ?></p>
                            <p class="card-text">upload by: <?= $ktk['uploader']; ?></p>
                            <?php if ($ktk['file'] != null) { ?>
                            <a href="<?= base_url(); ?>user/kontrak_kuliah/downloadKontrak/<?= $ktk['file']; ?>" class="btn btn-info">Download</a></td>
                            <a href="<?= base_url(); ?>user/kontrak_kuliah/editKontrak/<?= $ktk['kode_mk']; ?>" class="btn btn-warning">Upload</a></td> <br>
                            <?php } else{ ?>
                            <a href="<?= base_url(); ?>user/kontrak_kuliah/tambahKontrak/<?= $ktk['kode_mk']; ?>" class="btn btn-warning">Upload</a></td> <br>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <!-- End of card content -->
            <?php endforeach; ?>
        </div>
        </script>
    </div>