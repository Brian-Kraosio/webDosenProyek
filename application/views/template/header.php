<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $title ?></title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
</head>


<body>
<div class="wrapper d-flex align-items-stretch" >
			<nav id="sidebar" >
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only"></span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="#" class="logo">JTI<span><?= $title ?></span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-user mr-1"></span> Data Dosen</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/dosen">Data Dosen</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/dosen_menjabat">Lecturer Position</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/dpa">Homeroom Teacher</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/jabatan">Position</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/homebase">Homebase</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/status">Status</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/mengajar">Teach Type</a>
            </li>
          </ul>
        </li>
	          </li>
	          <li>
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-flask mr-1"></span> Research Group</a>
          <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/research_group">Research Group</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/research">Research</a>
            </li>
          </ul>
        </li>
	          </li>
	          <li>
            <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-clock-o mr-2"></span>Schedule</a>
          <ul class="collapse list-unstyled" id="homeSubmenu3">
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/jadwal_per_kelas">Schedule Per Class</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/mata_kuliah">Courses</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/kelas">Class</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/jadwal_per_kelas/jadwalDistribusi">Distribution Courses</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/rps_sap">RPS & SAP</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?= base_url()?>admin/kontrak_kuliah">Kontrak Kuliah</a>
            </li>
          </ul>
          <a href="<?=base_url()?>login/logout" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-sign-out mr-2"></span>Logout</a>
          </ul>
          
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">