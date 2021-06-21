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
                    <form action="<?=base_url()?>admin/kontrak_kuliah/tambahKontrak" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label hidden for="id_kontrak" style="font-size: 20px !important">ID RPS SAP</label>
                            <input hidden type="number" name="id_kontrak" class="form-control" id="id_kontrak" placeholder="ID Kontrak Kuliah" >
                        </div>
                        <div class="form-group">
                            <label for="id_matkul">Kode Mata Kuliah</label>
                            <input type="text" name="id_matkul" class="form-control" id="id_matkul" placeholder="KODE Mata Kuliah" value="" >
                            <button style="font-size: 17px !important" type="button" class="btn btn-info" data-toggle="modal" data-target="#KodeDosen"><span class="fa fa-table"></span> See Data Matkul</button>
                        </div>
                        <div class="form-group">
                            <label for="up_file" style="font-size: 20px !important">Kontrak Kuliah</label> <br>
                            <input type="file" style="font-size: 20px !important" name="up_file" /><br><br>
                        </div>
                        <div class="form-group">
                            <label hidden  for="uploader" style="font-size: 20px !important">uploader</label> <br>
                            <input hidden  type="text" style="font-size: 20px !important" name="uploader" value="<?=$this->session->userdata('user')?>" /><br><br>
                        </div>
                        <br>
                        <button style="font-size: 20px !important" value="simpan" type="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/kontrak_kuliah" class="btn btn-danger">Go back</a>
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
    $(".form-group #id_matkul").val( kode_mk );
    $('#KodeDosen').modal('hide');
});
    </script>