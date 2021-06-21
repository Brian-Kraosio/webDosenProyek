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
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #244282;">
        <img class="logo" src="<?=base_url()?>assets/images/logo.png" style="width: 300px !important" alt="LOGO JTI">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-5 ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url()?>user/dosen">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <?php echo $this->session->userdata('user') ?> </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?=base_url()?>login/change_pass">Change Password</a>
                        <a class="dropdown-item" href="<?=base_url()?>login/logout">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper d-flex align-items-stretch" >
			<div id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only"></span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="<?=base_url()?>user/dosen" class="logo">JTI<span><?= $title ?></span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-user mr-1"></span> Profile</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a style="font-size: 17px !important" href="<?=base_url()?>user/dosen/#biodata">Biodata</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?=base_url()?>user/dosen/#position">Position</a>
            </li>
            <li>
              <a style="font-size: 17px !important" href="<?=base_url()?>user/dosen/#research_group">Research Group</a>
            </li>
          </ul>
        </li>
	          </li>
	          <li>
            <a href="<?=base_url()?>user/rps_sap_user"><span class="fa fa-flask mr-1"></span> RPS & SAP</a>
        </li>
	          <li>
            <a href="<?=base_url()?>user/kontrak_kuliah"><span class="fa fa-clock-o mr-2"></span> Contract</a>
	          </li>
	      </div>
</div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      