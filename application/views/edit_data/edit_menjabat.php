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
                            <label hidden for="id_menjabat" style="font-size: 20px !important">ID Menjabat</label>
                            <input hidden type="number" name="id_menjabat" class="form-control" id="id_menjabat" placeholder="ID Menjabatan"  style="font-size: 20px !important" value="<?= $menjabat['id_menjabat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Kode" style="font-size: 20px !important">KODE</label>
                            <input type="text" name="kode" class="form-control" id="kode" placeholder="KODE DOSEN" value="<?= $menjabat['Kode'] ?>"> 
                            <button style="font-size: 17px !important" type="button" class="btn btn-info" data-toggle="modal" data-target="#KodeDosen"><span class="fa fa-table"></span> See Data Dosen</button>
                        </div>
                        <div class="form-group">
                            <label for="id_jabatan" style="font-size: 20px !important">Jabatan</label>
                            <select name="id_jabatan" id="id_jabatan" class="form-control">
                                <?php foreach ($jabatan as $jbt) : ?>
                                    <?php if($menjabat['id_jabatan'] != null) : ?>
                                        <option value="<?= $menjabat['id_jabatan'] ?>" selected><?=$jbt['nama_jabatan']?></option>
                                    <?php else : ?>
                                    <option style="font-size: 20px !important" value="<?php echo $jbt['id_jabatan']; ?>"><?php echo $jbt['nama_jabatan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_menjabat" style="font-size: 20px !important">Position Year</label>
                            <input type="number" name="tahun_menjabat" class="form-control" id="tahun_menjabat" placeholder="exp : 2019" value="<?= $menjabat['tahun_menjabat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Semester_menjabat" style="font-size: 20px !important">Semester lecturer positioned</label>
                            <input type="text" name="semester_menjabat" class="form-control" id="semester_menjabat" placeholder="Odd / Even " value="<?= $menjabat['semester_menjabat'] ?>">
                        </div>
                        <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/dosen_menjabat" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="KodeDosen" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>KODE</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dosen as $dsn) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $dsn["KODE"]; ?></td>
                                        <td><?= $dsn["Nama"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on("click", ".kode", function () {
    var kode = $(this).data('kode');
    $(".form-group #kode").val( kode );
    $('#KodeDosen').modal('hide');
});
    </script>