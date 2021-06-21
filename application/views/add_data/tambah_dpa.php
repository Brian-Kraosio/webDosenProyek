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
                            <label hidden for="id_DPA" style="font-size: 20px !important">ID Menjabat</label>
                            <input hidden type="number" name="id_DPA" class="form-control" id="id_DPA" placeholder="ID DPA">
                        </div>
                        <div class="form-group">
                            <label for="KODE">KODE</label>
                            <input type="text" name="KODE" class="form-control" id="KODE" placeholder="KODE DOSEN" value=""> 
                            <button style="font-size: 17px !important" type="button" class="btn btn-info" data-toggle="modal" data-target="#KodeDosen"><span class="fa fa-table"></span> See Data Dosen</button>
                        </div>
                        <div class="form-group">
                            <label for="kelas_dpa" >Kelas </label>
                            <select name="kelas_dpa" id="kelas_dpa" class="form-control">
                                <option selected>------</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option style="font-size: 20px !important" value="<?php echo $kls['id_kelas']; ?>"><?php echo $kls['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dpa_tahun" style="font-size: 20px !important">Homeroom Year</label>
                            <input type="number" name="dpa_tahun" class="form-control" id="dpa_tahun" placeholder="exp : 2019" >
                        </div>
                        <div class="form-group">
                            <label for="semester" style="font-size: 20px !important">Homeroom Semester</label>
                            <input type="text" name="semester" class="form-control" id="semester" placeholder="Odd / Even ">
                        </div>
                        <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/dpa" class="btn btn-danger">Go back</a>
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
<script type="text/javascript">
$(document).on("click", ".kode", function () {
    var kode = $(this).data('kode');
    $(".form-group #KODE").val( kode );
    $('#KodeDosen').modal('hide');
});
    </script>