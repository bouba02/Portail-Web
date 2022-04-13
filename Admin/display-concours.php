<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
    
    <?php 
                
    // Modification de concours
        if(isset($_POST['sub'])){
                $titre=$_POST['titre'];
                $annonce=$_POST["message"];
                $id_concours=$_POST['id_con'];
                //var_dump($id_concours);
                
            $requete="update annonce set TITRE_ANNONCE='$titre',ANNONCE='$annonce' where ID_ANNONCE=$id_concours";
                $run=mysqli_query($con,$requete);
               
                if($run){
                    header('location:student-fee.php');
                   
                }

        }


        if(isset($_GET['id_con'])){

            $id_concours=$_GET['id_con'];
            
            $query="select * from annonce where ID_ANNONCE='$id_concours'";
            $run=mysqli_query($con,$query);
            while ($row=mysqli_fetch_array($run)) {
        
    ?>
    <!doctype html>
<html lang="fr">
	<head>
		<title>Admin - Concours Etudiant</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Modification du Concours </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">
						<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Titre du Concours</label>
										<input type="text" class="form-control" name="titre" value=<?php echo $row['TITRE_ANNONCE'];  ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Description du Concours:*</label>
										<!-- <input type="textarea" name="annonce"  class="form-control"  value=<?php echo $row['ANNONCE'] ?>> -->
										<textarea name="message" cols="65" rows="6" placeholder="Details du concours"><?php echo $row['ANNONCE'] ?> </textarea>
									</div>
								</div>
						<?php 
                         }
                         }      
                    		?>			<input type="hidden" name="id_con" value=<?php echo $id_concours?>>
											<input type="submit" name="sub" class="btn btn-primary px-4 ml-4" value="Modifier">
										</div>
									</div>
								</div>
								<div class="col-md-6 align-items-baseline pt-4">
								</div>
							</div>	
						</form>


                        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>