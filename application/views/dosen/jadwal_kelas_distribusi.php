<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>

    <div class="row mt-3">
        <div class="col md-12">
            <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>KODE</th>
                        <th>Nama</th>
                        <th>Total Jam</th>
                        <th>Tahun Jadwal</th> 
                        <th>Semester Jadwal</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal_per_kelas as $jpk) {?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jpk["KODE"]; ?></td>
                            <td><?= $jpk["Nama"]; ?></td>
                            <td><?= $jpk["Total_jam"]; ?></td>
                            <td><?= $jpk["tahun_jadwal"]; ?></td>
                            <td><?= $jpk["semester_jadwal"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
