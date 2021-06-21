<div class="container">
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="card bg-info text-white" id="cardtable">
                <div class="card-header" style="font-size: 20px !important">
                    <?= $title ?>
                </div>
                <div class="card-body">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post" id="forminput" enctype="multipart/form-data">
                        <div class="form-group">
                            <label hidden for="id_rps_sap" style="font-size: 20px !important">ID RPS SAP</label>
                            <input  type="number" name="id_rps_sap" class="form-control" id="id_rps_sap" placeholder="ID RPS & SAP" value="<?= $rpssap["id_rps_sap"]?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="kode_mk">Kode Mata Kuliah</label>
                            <input type="text" name="kode_mk" class="form-control" id="kode_mk" placeholder="KODE Mata Kuliah" value="<?= $rpssap["kode_mk"]?>">
                            <button style="font-size: 17px !important" type="button" class="btn btn-info" data-toggle="modal" data-target="#KodeDosen"><span class="fa fa-table"></span> See Data Matkul</button>
                        </div>
                        <div class="form-group">
                            <label for="RPS" style="font-size: 20px !important">RPS</label> <br>
                            <input type="file" style="font-size: 20px !important" name="RPS"/><br><br>
                            <input type="hidden" style="font-size: 20px !important" name="old_RPS" value="<?=$rpssap["RPS"]?>"/>
                        </div>
                        <div class="form-group">
                            <label for="SAP" style="font-size: 20px !important">SAP</label><br>
                            <input type="file" style="font-size: 20px !important" name="SAP"/><br><br>
                            <input type="hidden" style="font-size: 20px !important" name="old_SAP" value="<?=$rpssap["SAP"]?>"/>
                        </div>
                        <br>
                        <button style="font-size: 20px !important" value="simpan" type="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/rps_sap" class="btn btn-danger">Go back</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Matkul</th>
                            <th>Nama Matkul</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($mata_kuliah as $mk) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td> <a href="#" class="kode" data-kode_mk="<?= $mk["kode_mk"] ?>"><?= $mk["kode_mk"]; ?></a></td>
                                <td><?= $mk["nama_mata_kuliah"]; ?></td>
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
    var kode_mk = $(this).data('kode_mk');
    $(".form-group #kode_mk").val( kode_mk );
    $('#KodeDosen').modal('hide');
});
    </script>