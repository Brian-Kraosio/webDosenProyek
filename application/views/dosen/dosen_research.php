<div class="container" style="font-size: 20px !important">
    <div class="row mt-1">
        <div class="col-md-12">
            <h1 style="text-align: center; margin-bottom:30px"><?= $title ?></h1>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-9">
            <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/research_group" class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Raw Data</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col md-12">
            <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>KODE</th>
                        <th>Nama</th>
                        <th>Nama Research</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Priority</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($research_group as $rgp) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $rgp["KODE"]; ?></td>
                            <td><?= $rgp["Nama"]; ?></td>
                            <td><?= $rgp["nama_research"]; ?></td>
                            <td><?= $rgp["year"]; ?></td>
                            <td><?= $rgp["semester"]; ?></td>
                            <td><?= $rgp["priority"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>