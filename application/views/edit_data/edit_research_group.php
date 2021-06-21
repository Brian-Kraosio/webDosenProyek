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
                            <label hidden for="id_research_group" style="font-size: 20px !important">ID Research Group</label>
                            <input hidden type="number" name="id_research_group" class="form-control" id="id_research_group" placeholder="ID Research Group" value="<?= $research_group['id_research_group'] ?>" style="font-size: 20px !important">
                        </div>
                        <div class="form-group">
                            <label for="Kode" style="font-size: 20px !important">KODE</label>
                            <input type="text" name="Kode" class="form-control" id="Kode" placeholder="KODE DOSEN" value="<?= $research_group['Kode'] ?>"> 
                            <button style="font-size: 17px !important" type="button" class="btn btn-info" data-toggle="modal" data-target="#KodeDosen"><span class="fa fa-table"></span> See Data Dosen</button>
                        </div>
                        <div class="form-group">
                            <label for="id_research" style="font-size: 20px !important">Research</label>
                            <select name="id_research" id="id_research" class="form-control">
                                <?php foreach ($research as $rsc) : ?>
                                    <?php if($research_group['id_research'] != null) : ?>
                                        <option value="<?= $research_group['id_research'] ?>" selected><?=$rsc['nama_research']?></option>
                                    <?php else : ?>
                                    <option style="font-size: 20px !important" value="<?php echo $rsc['id_research']; ?>"><?php echo $rsc['nama_research']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year" style="font-size: 20px !important">Year of Research</label>
                            <input type="number" name="year" class="form-control" id="year" placeholder="exp : 2019" value="<?= $research_group['year'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="semester" style="font-size: 20px !important">Semester Research Group</label>
                            <input type="text" name="semester" class="form-control" id="semester" placeholder="Odd / Even " value="<?= $research_group['semester'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="priority" style="font-size: 20px !important">Priority of research group</label>
                            <input type="text" name="priority" class="form-control" id="priority" placeholder="Primary / secondary" value="<?= $research_group['priority'] ?>">
                        </div>
                        <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/research_group" class="btn btn-danger">Go back</a>
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
    $(".form-group #Kode").val( kode );
    $('#KodeDosen').modal('hide');
});
    </script>