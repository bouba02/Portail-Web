<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['submit'])) {
 	$titre=$_POST['titre'];
 	$concours=$_POST['message'];
	 $date=date("d-m-y h:m:s");

 	
		$que="insert into annonce (TITRE_ANNONCE,DATE_ANNONCE,ANNONCE)values('$titre','$date','$concours')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}

?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Concours Etudiant</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Gestionnaire de Concours </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="student-fee.php" method="post">
						<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Titre du Concours</label>
										<input type="text" class="form-control" name="titre"  >
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Description du Concours:*</label>
										<!-- <input type="textarea" name="annonce"  class="form-control"  value=<?php echo $row['ANNONCE'] ?>> -->
										<textarea name="message" cols="65" rows="2" placeholder="Details du concours"></textarea>
									</div>
								</div>
											
											<input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Ajouter">
										</div>
									</div>
								</div>
								<div class="col-md-6 align-items-baseline pt-4">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>No.</th>
									<th>Titre Annonce</th>
									<th> Description</th>
									<th>Date D'ajout </th>
									<th colspan="1">Operations</th>
									
									
								</tr>
								<?php  
								$i=1;
									

										$que="select * from annonce";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
									?>
										<form action="student-fee.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['TITRE_ANNONCE'] ?></td>
											<!-- <input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?> > -->
											<td><?php echo $row['ANNONCE'] ?></td>
											<td><?php echo $row['DATE_ANNONCE'] ?></td>
											<td width='180'> 
											<?php 
												echo "<a class='btn btn-primary' href=display-concours.php?id_con=".$row['ID_ANNONCE'].">Modifier</a> 
												<a class='btn btn-danger' href=delete-function.php?id_con=".$row['ID_ANNONCE'].">Delete</a> ";
												
											?>
										</td>
											<!-- <td><input type="text" name="amount" class="form-control" placeholder="Enter Amount for fee"></td> -->
											<!-- <input type="hidden" name="status" value="Paid"> -->

										</tr>
										
								<?php		
									}
									
								?>
								<!-- <input type="submit" name="sub"> -->

								</form>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

