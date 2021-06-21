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
                            <label hidden for="id_jadwal_per_kelas" style="font-size: 20px !important">ID Menjabat</label>
                            <input hidden type="number" name="id_jadwal_per_kelas" class="form-control" id="id_jadwal_per_kelas" >
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode Dosen</label>
                            <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Dosen">
                            <button style="font-size: 17px !important" type="button" class="btn btn-info" data-toggle="modal" data-target="#KodeDosen"><span class="fa fa-table"></span> See Data Dosen</button>
                        </div>
                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <option selected>------</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option style="font-size: 20px !important" value="<?php echo $kls['id_kelas']; ?>"><?php echo $kls['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_matkul">Course</label>
                            <input type="id_matkul" name="id_matkul" class="form-control" id="id_matkul" placeholder="Course">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Matkul">
                                <span class="fa fa-book"></span> See Course Data
                            </button>
                        </div>
                        <div class="form-group">
                            <label for="tahun_jadwal">Schedule Year</label>
                            <input type="text" name="tahun_jadwal" class="form-control" id="tahun_jadwal" placeholder="Exp : 2019">
                        </div>
                        <div class="form-group">
                            <label for="semester_jadwal" >Schedule Semester</label>
                            <input type="text" name="semester_jadwal" class="form-control" id="semester_jadwal" placeholder="Odd / Even">
                        </div>
                        <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/jadwal_per_kelas" class="btn btn-danger">Go back</a>
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
                                <td><a href="#" class="kode" data-kode="<?= $dsn["KODE"] ?>"><?= $dsn["KODE"]; ?></a></td>
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

<div class="modal fade bd-example-modal-xl" id="Matkul" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Course Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_kelas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Course</th>
                            <th>Course Name</th>
                            <th>Course Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matkul as $mtk) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><a href="#" class="kodemk" data-kode_mk="<?= $mtk["kode_mk"] ?>"><?= $mtk["kode_mk"]; ?></a></td>
                                <td><?= $mtk["nama_mata_kuliah"]; ?></td>
                                <td><?= $mtk["tipe_mata_kuliah"]; ?></td>
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

$(document).on("click", ".kodemk", function () {
    var kode_mk = $(this).data('kode_mk');
    $(".form-group #id_matkul").val( kode_mk );
    $('#Matkul').modal('hide');
});
    </script>