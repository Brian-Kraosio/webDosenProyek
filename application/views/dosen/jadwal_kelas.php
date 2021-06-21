<div class="container" style="font-size: 20px !important">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px">Data Jadwal Per Kelas</h1>
    </div>

    <div class="row mt-1">
    <div class="col-md-9">
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/jadwal_per_kelas"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Detailed Data</a>
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
                        <th>Nama Kelas</th>
                        <th>Nama Mata Kuliah</th> 
                        <th>Tahun Jadwal</th> 
                        <th>Semester Jadwal</th> 
                        <th>SKS Mata Kuliah</th> 
                        <th>Jam Mata Kuliah</th> 
                        <th>Tipe Mata Kuliah</th> 
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
                            <td><?= $jpk["nama_kelas"]; ?></td>
                            <td><?= $jpk["nama_mata_kuliah"]; ?></td>
                            <td><?= $jpk["tahun_jadwal"]; ?></td>
                            <td><?= $jpk["semester_jadwal"]; ?></td>
                            <td><?= $jpk["sks_mata_kuliah"]; ?></td>
                            <td><?= $jpk["Jam_mata_kuliah"]; ?></td>
                            <td><?= $jpk["tipe_mata_kuliah"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
