﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Free Responsive Admin Theme - ZONTAL</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a  href="index.html">Dashboard</a></li>
                            <li><a class="menu-top-active" href="ui.html">Articles</a></li>
                            <li><a href="table.html">Data Tables</a></li>
                            <li><a href="forms.html">Forms</a></li>
                             <li><a href="login.html">Login Page</a></li>
                            <li><a href="blank.html">Blank Page</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
		<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Editer les articles</h1>
                    </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Titre</th>
										<th>Auteur</th>
										<th>Date</th>
										<th>Contenu</th>
										<th>Actions</th>
									</tr>
								</thead>
								 <?php
									
									try
									{	
										$bdd = new PDO('mysql:host=localhost;dbname=base.db;charset=utf8', 'root', '');
									}
									catch(Exception $e) 
									{	
										die('Error : ' .$e->getMessage());
									}
									
									$query = "SELECT ID, article_author, article_title, SUBSTRING(`article`, 1, 50) AS article, article_date FROM article WHERE page_name = 'accueil' ";
									$results = $bdd->query($query);
																	
								?>
								<tbody>
									<?php	
										while($row = $results->fetch())
										{
											$title = $row['article_title'];
											$author = $row['article_author'];
											$date = $row['article_date'];
											$content = $row['article']; 
											$id= $row['ID'];
										
									?>
									<tr>
										<td><?php echo $title?></td>
										<td><?php echo $author ?></td>
										<td><?php echo $date ?></td>
										<td><?php echo $content; echo "..."  ?></td>
										<td>
											<form action="update.php" method="get">
												<button class="btn btn-xs btn-primary" name="subject" type="submit" value="<?php echo $id ?>" style="min-width: 80px; margin-bottom: 8px;"><i class="fa fa-edit "></i> Editer &nbsp </button>
											</form>
											
											<form action="test.php" method="get">
												<button class="btn btn-xs btn-danger" name="subject" type="submit" value="Delete" style="min-width: 80px;"><i class="fa fa-remove"></i> Effacer</button>
											</form>
										</td>
									</tr>
										<?php }
										?>
									
								</tbody>
								<a href="#" class="btn btn-success btn-xs" style="min-width: 80px;"><i class="fa fa-plus "></i> Ajouter un article à la page "Accueil"</a>
							 </table>	
							
						
						</div>
					</div>
				<div class="col-md-6">
					<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Titre</th>
										<th>Auteur</th>
										<th>Date</th>
										<th>Contenu</th>
										<th>Actions</th>
									</tr>
								</thead>
								 <?php
									
									try
									{	
										$bdd = new PDO('mysql:host=localhost;dbname=base.db;charset=utf8', 'root', '');
									}
									catch(Exception $e) 
									{	
										die('Error : ' .$e->getMessage());
									}
									
									$query = "SELECT ID, article_author, article_title, SUBSTRING(`article`, 1, 50) AS article, article_date FROM article WHERE page_name = 'indications' ";
									$results = $bdd->query($query);
																	
								?>
								<tbody>
									<?php	
										while($row = $results->fetch())
										{
											$title = $row['article_title'];
											$author = $row['article_author'];
											$date = $row['article_date'];
											$content = $row['article']; 
											$id= $row['ID'];
										
									?>
									<tr>
										<td><?php echo $title?></td>
										<td><?php echo $author ?></td>
										<td><?php echo $date ?></td>
										<td><?php echo $content; echo "..."  ?></td>
										<td>
											<form action="update.php" method="get">
												<button class="btn btn-xs btn-primary" name="subject" type="submit" value="<?php echo $id ?>" style="min-width: 80px; margin-bottom: 8px;"><i class="fa fa-edit "></i> Editer &nbsp </button>
											</form>
											
											<form action="test.php" method="get">
												<button class="btn btn-xs btn-danger" name="subject" type="submit" value="Delete" style="min-width: 80px;"><i class="fa fa-remove"></i> Effacer</button>
											</form>
											
											<!--<a href="update.php" class="btn btn-xs btn-primary" role="button" style="min-width: 80px;"><i class="fa fa-edit "></i> Editer &nbsp <br></a>
											<button class="btn btn-xs btn-danger" style="margin-top: 4px; min-width: 80px;"><i class="fa fa-remove"></i> Effacer</button> -->
											
										</td>
									</tr>
										<?php }
										?>
									
								</tbody>
								<a href="#" class="btn btn-success btn-xs" style="min-width: 80px;"><i class="fa fa-plus "></i> Ajouter un article à la page "Indications & témoignages"</a>
							 </table>	
							
						</div>
						
				</div>
			</div>
		</div>
	</div>

  
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
