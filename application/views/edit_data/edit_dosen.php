<div class="container">
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="card bg-info text-white">
                <div class="card-header" style="font-size: 20px !important">
                    <?= $title ?>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="NIP" style="font-size: 20px !important">NIP</label>
                            <input type="number" name="NIP" class="form-control" id="" placeholder="NIP" style="font-size: 20px !important" value="<?=$dosen['NIP']?>">
                        </div>
                        <div class="form-group">
                            <label for="NIDN" style="font-size: 20px !important">NIDN</label>
                            <input type="number" name="NIDN" class="form-control" id="NIDN" placeholder="NIDN" style="font-size: 20px !important" value="<?=$dosen['NIDN']?>">
                        </div>
                        <div class="form-group">
                            <label hidden for="KODE" style="font-size: 20px !important">KODE Dosen</label>
                            <input hidden type="text" name="KODE" class="form-control" id="KODE" placeholder="KODE DOSEN" style="font-size: 20px !important" value="<?=$dosen['KODE']?>">
                        </div>
                        <div class="form-group">
                            <label for="Nama" style="font-size: 20px !important">Nama Dosen</label>
                            <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Nama Dosen" style="font-size: 20px !important" value="<?=$dosen['Nama']?>">
                        </div>
                        <div class="form-group">
                            <label for="id_homebase" style="font-size: 20px !important">Homebase</label>
                            <select name="id_homebase" id="id_homebase" class="form-control">
                                <?php foreach($homebase as $hbs):?>
                                    <?php if($dosen['id_homebase'] != null) : ?>
                                        <option value="<?php $dosen['id_homebase'] ?>" selected><?php echo $hbs['nama_homebase']?></option>
                                    <?php else : ?>
                                <option style="font-size: 20px !important" value="<?php echo $hbs['id_homebase'];?>"><?php echo $hbs['nama_homebase'];?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="homebase_akre" style="font-size: 20px !important">Homebase Akreditasi</label>
                            <select name="homebase_akre" id="homebase_akre" class="form-control">
                                <?php foreach($homebase as $hbs):?>
                                    <?php if($dosen['id_homebase'] != null) : ?>
                                        <option value="<?= $dosen['id_homebase'] ?>" selected><?php echo $hbs['nama_homebase']?></option>
                                    <?php else : ?>
                                <option style="font-size: 20px !important" value="<?php echo $hbs['id_homebase'];?>"><?php echo $hbs['nama_homebase'];?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_status" style="font-size: 20px !important">ID Status</label>
                            <select name="id_status" id="id_status" class="form-control">
                                <?php foreach($status as $sts):?>
                                    <?php if($dosen['id_status'] != null) : ?>
                                        <option value="<?= $dosen['id_status'] ?>" selected><?=$sts['status']?></option>
                                    <?php else : ?>
                                <option style="font-size: 20px !important" value="<?php echo $sts['id_status'];?>"><?php echo $sts['status'];?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_mengajar" style="font-size: 20px !important">ID Mengajar</label>
                            <select name="id_mengajar" id="id)_mengajar" class="form-control">
                                <?php foreach($mengajar as $mgj):?>
                                    <?php if($dosen['id_mengajar'] != null) : ?>
                                        <option value="<?= $dosen['id_mengajar'] ?>" selected><?= $mgj['tipe_pelajaran']?></option>
                                    <?php else : ?>
                                <option style="font-size: 20px !important" value="<?php echo $mgj['id_mengajar'];?>"><?php echo $mgj['tipe_pelajaran'];?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/dosen" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>