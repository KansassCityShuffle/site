<?php
	if(!isset($_GET['subject']))
	{	
		// On récupère le formulaire
		$new_title 				= 	isset($_POST['form_title'])?				$_POST['form_title']: 	'';
		$new_date				= 	isset($_POST['form_modification_date'])? 	$_POST['form_modification_date']:	'';
		$new_content 			= 	isset($_POST['form_content'])?				$_POST['form_content']:		'';
		$id						= 	isset($_POST['form_id'])?					$_POST['form_id']:			'';
		// Si les variables ne sont pas vides...
		if( !empty( $new_title ) && !empty( $id ) && !empty( $new_date ) && !empty( $new_content ) )
		{	
			try
			{	
				$bdd = new PDO('mysql:host=localhost;dbname=base.db;charset=utf8', 'root', '');
			}
			catch(Exception $e) 
			{	
				die('Error : ' .$e->getMessage());
			}
			
			$query = "	UPDATE article
						SET article_title = '$new_title',
							article_date = '$new_date',
							article = '$new_content'
						WHERE id = $id";
			$bdd->query($query);
			die('modification successed');
		}
		
		die('modification failed');
	}
	
	else
	{	
		try
		{	
			$bdd = new PDO('mysql:host=localhost;dbname=base.db;charset=utf8', 'root', '');
		}
		catch(Exception $e) 
		{	
			die('Error : ' .$e->getMessage());
		}
		$article_id = $_GET["subject"];
		
		$query = "SELECT article_author, article_title, article, article_date, page_name FROM article WHERE ID = $article_id ";
		$results = $bdd->query($query);
		
		$row = $results->fetch();
		
		$title = $row['article_title'];
		$author = $row['article_author'];
		$date = $row['article_date'];
		$content = $row['article']; 
		$page = $row['page_name'];
		$today = date("Y-m-d");                         // 10, 3, 2001
	}

?>
<!DOCTYPE html>
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
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="ui.php">UI Elements</a></li>
                            <li><a href="table.html">Data Tables</a></li>
                            <li><a class="menu-top-active"  href="update.php">Forms</a></li>
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
					<h1 class="page-head-line">MODIFIER UN ARTICLE</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							L'article se situe sur la page "<?php echo $page ?>"
						</div>
						<div class="panel-body">
						   <form name="editArticle" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							  <!-- title -->
							  <div class="form-group">
								<label for="inputTitle">Titre de l'article</label>
								<input type="title" class="form-control" name="form_title" value="<?php echo $title ?>" />
							  </div><!-- /title -->
							  
							  <!-- date -->
							  <div class="form-group">
								<label for="inputDate">Date de création</label>
								<input type="date" class="form-control" name="form_creation_date" value="<?php echo $date ?>" disabled />
							  </div><!-- /date -->
							  
							  <!-- todayDate -->
							  <div class="form-group">
								<label for="inputDate">Date de modification</label>
								<input type="date" class="form-control" name="form_modification_date" value="<?php echo $today ?>" />
							  </div><!-- /todayDate -->
							  
							  <!-- picture -->
							  <div class="form-group">
								<label for="exampleInputFile">Insérer une image</label>
								<input type="file" id="inputImage" />
								<p class="help-block">Sélectionner une image à insérer à l'article.</p>
							  </div><!-- /picture -->

							<!-- pictureLocalisation -->
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked />
									Placer l'image avant le texte
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
									Placer l'image après le texte
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
									Placer l'image au milieu du texte
								</label>
							</div><!-- /pictureLocalisation -->
							  
							  
							
							<!-- content 
							<label for="inputContent">Contenu de l'article</label>
							<textarea class="form-control" rows="30" value="" name="form_content"></textarea>
							<hr /><!-- /content -->
							<div class="form-group">
								<label for="inputContent">Contenu de l'article</label>
								<textarea type="content" class="form-control" name="form_content" value="" rows="15" cols="40"/><?php echo $content ?></textarea>
							</div>
							
							<div class="form-group">
								<input type="idform" class="hidden" name="form_id" value="<?php echo $article_id ?>"  />
							</div> 
							<td>
								
							<!-- submitModifications -->
							
								<input type="submit" class="left" value="Editer"/>
							<!-- /submitModifications -->
							
							</td>
							</form>
						</div>
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
