<div class="container" style="font-size: 20px !important">
    <div class="row mt-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Profile
                </div>
                <section id="biodata">
                    <div class="card-body">
                        <img src="<?= base_url() ?>assets/images/dosen profile pic/<?= $pic ?>" style="width: 150px !important; display: block !important; margin: 0 auto !important;" alt="Profile Pic"><br><br>
                        <h4 class="card-title"><?= $dosen[0]->Nama ?> &emsp;(Code : <?= $dosen[0]->KODE ?>)</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <h5>NIDN</h5>
                                <b><?= $dosen[0]->NIDN ?></b>
                                <hr>
                                <h5>Field of Study </h5>
                                <b><?= $teach[0]->tipe_pelajaran ?></b>
                                <hr>
                                <h5>Homebase</h5>
                                <b><?= $homebase[0]->nama_homebase ?></b>
                                <hr>
                            </div>
                            <div class="col-md-6 mt-3">
                                <h5>NIP</h5>
                                <b><?= $dosen[0]->NIP ?></b>
                                <hr>
                                <h5>Status</h5>
                                <b><?= $status[0]->kode_status ?> (<?= $status[0]->status ?>)</b>
                                <hr>
                                <h5>Homebase Accreditation</h5>
                                <b><?= $homebaseakre[0]->Homebase_Akre ?></b>
                                <hr>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="position">
                    <div class="card-body">
                        <h4 class="card-title">Position :</h4>
                        <hr>
                        <table style="font-size: 20px !important" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Position Name</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($position as $djm) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $djm["nama_jabatan"]; ?></td>
                                        <td><?= $djm["tahun_menjabat"]; ?></td>
                                        <td><?= $djm["semester_menjabat"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section id="research_group">
                <div class="card-body">
                        <h4 class="card-title">Research Group :</h4>
                        <hr>
                <table style="font-size: 20px !important" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Research</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Priority</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($research as $rgp) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $rgp["nama_research"]; ?></td>
                            <td><?= $rgp["year"]; ?></td>
                            <td><?= $rgp["semester"]; ?></td>
                            <td><?= $rgp["priority"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
                </section>
            </div>
            </div>
        </div>
    </div>