<div class="container" style="font-size: 20px !important">

    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"><?=$title?></h1>
    </div>
    <div class="row mt-1">
    <div class="col-md-9">
        <a style="font-size: 20px !important" href="<?= base_url();?>admin/research_group/dosenResearch"class="btn btn-info"><span class="fa fa-info mr-2"></span> Show Detailed Data</a>
        <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/research_group/tambahResearchGroup" class="btn btn-warning"><span class="fa fa-plus-square mr-2"></span>Add Research Group</a>
    </div>
    </div>
    
<?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?=$title?> <strong> Sucessfully </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col md-12">
            <table style="font-size: 20px !important" class="table table-striped table-bordered " id="list_dosen">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>KODE</th>
                        <th>ID Research</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Priority</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($research_group as $rgp) {?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $rgp["Kode"]; ?></td>
                            <td><?= $rgp["id_research"]; ?></td>
                            <td><?= $rgp["year"]; ?></td>
                            <td><?= $rgp["semester"]; ?></td>
                            <td><?= $rgp["priority"]; ?></td>
                            <td> <a href="<?= base_url(); ?>admin/research_group/deleteResearchGroup/<?= $rgp['id_research_group']; ?>" onclick="return confirm('Are you sure want to delete this data?')"><span class="fa fa-minus-circle" style="color: red"></span> Delete</a>
                        <br><a href="<?= base_url(); ?>admin/research_group/editResearchGroup/<?= $rgp['id_research_group'] ?>"><span class="fa fa-pencil-square-o mr-1"></span>Edit</a> </td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6 ">
            <div class="card bg-success text-white">
                <div class="card-header">Import / Upload <?=$title?> </div>
                <div class="card-body ">
                    <p class="card-text">Upload Excel File</p>
                    <form action="<?php echo base_url(); ?>admin/research_group/importFile" method="post" enctype="multipart/form-data">
                        <input type="file" name="uploadFile" value="" /><br><br>
                        <input type="submit" name="submit" value="Upload" />
                    </form>
                </div>
            </div>
        </div>
            <div class="card bg-success text-white ">
                <div class="card-header">Export <?=$title?> data & <br> Download Template <?=$title?></div>
                <div class="card-body ">
                    <a style="font-size: 20px !important; " href="<?= base_url(); ?>admin/research_group/generateXls" class="btn btn-light"><span class="fa fa-file-excel-o mr-2"></span>Export <?=$title?></a> <br><br>
                    <a style="font-size: 20px !important" href="<?= base_url(); ?>admin/research_group/downloadResearchGroup" class="btn btn-light"><span class="fa fa-file-excel-o mr-2"></span>Download Template <?=$title?></a>
                </div>
            </div>
        </div>
</div>
