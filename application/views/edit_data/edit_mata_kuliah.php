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
                            <label for="kode_mk" style="font-size: 20px !important">Course Code</label>
                            <input type="text" name="kode_mk" class="form-control" id="kode_mk" placeholder="exp: RIF19.. / RTI19.." value="<?= $mata_kuliah['kode_mk'] ?>" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="nama_mata_kuliah">Course Name</label>
                            <input type="text" name="nama_mata_kuliah" class="form-control" id="nama_mata_kuliah" placeholder="Exp : proyek" value="<?= $mata_kuliah['nama_mata_kuliah'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="sks_mata_kuliah">SKS Course</label>
                            <input type="number" name="sks_mata_kuliah" class="form-control" id="sks_mata_kuliah" placeholder="SKS" value="<?= $mata_kuliah['sks_mata_kuliah'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="Jam_mata_kuliah">Course Time</label>
                            <input type="number" name="Jam_mata_kuliah" class="form-control" id="Jam_mata_kuliah" placeholder="Time" value="<?= $mata_kuliah['Jam_mata_kuliah'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="tipe_mata_kuliah">Course Type</label>
                            <input type="text" name="tipe_mata_kuliah" class="form-control" id="tipe_mata_kuliah" placeholder="Exp : P / T" value="<?= $mata_kuliah['tipe_mata_kuliah'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="RPS">Rencana Pembelajaran Semester (RPS)</label>
                            <input type="file" name="RPS" class="form-control-file" id="RPS"> 
                            <input hidden type="file" name="Old_RPS" class="form-control-file" id="Old_RPS"> 
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px !important" for="SAP">Satuan Acara Perkuliahan (SAP)</label>
                            <input type="file" name="SAP" class="form-control-file" id="SAP"> 
                            <input hidden type="file" name="Old_SAP" class="form-control-file" id="Old_SAP"> 
                        </div>
                            <br>
                        <button style="font-size: 20px !important" type="submit" name="submit" class="btn btn-primary float-right">Submit</button> <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/mata_kuliah" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
