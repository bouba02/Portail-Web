 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<?php

    $roll_no=$_SESSION['LoginStudent'];

	if (isset($_POST['sub'])) {

		$first_name=$_POST['first_name'];

		$middle_name=$_POST['middle_name'];

		$last_name=$_POST['last_name'];

		$father_name=$_POST['father_name'];

		$cnic=$_POST['cnic'];

		$mobile_no=$_POST['mobile_no'];

		$gender=$_POST['gender'];

		$semester=$_POST['semester'];

		// $total_marks=$_POST['total_marks'];

		// $obtain_marks=$_POST['obtain_marks'];

		// $current_address=$_POST['current_address'];

		$permanent_address=$_POST['permanent_address'];

		$state=$_POST['state'];

		$place_of_birth=$_POST['place_of_birth'];
	

		$query="update student set nom='$first_name',prenoms='$last_name',cni='$cnic',telephone='$mobile_no',sexe='$gender',adresse='$permanent_address',ville='$state',dateNaissance='$place_of_birth' where code='$roll_no'";
		$run=mysqli_query($con,$query);
		if ($run) {  ?>
 			<script type="text/javascript">
 				alert("Student data has been updated");
 			</script>
 		<?php }
 		else { ?>
 			<script type="text/javascript">
 				alert("Student data has not been updated due to some errors");
 			</script>
 		<?php }


	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Information Personnelle de L'Etudiant</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main sub-main-student">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Modifider Vos Informations </h4>
				</div>
				<div class="row ml-4">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form action="student-personal-information.php" method="post">
							<?php $roll_no=$_SESSION['LoginStudent'];
							
								$query="select * from student where code='$roll_no'";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
							<div class="row">
								<div class=" col-lg-6 col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Nom:*</label>
										<input type="text" class="form-control" name="first_name" value=<?php echo $row['nom'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Prenoms:*</label>
										<input type="text" class="form-control" name="last_name" value=<?php echo $row['prenoms'] ?>>
									</div>
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">CNI:*</label>
										<input type="text" class="form-control" name="cnic" value=<?php echo $row['cni'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Telephone:*</label>
										<input type="number" class="form-control" name="mobile_no"  value=<?php echo $row['telephone'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Sexe</label>
										<input type="text" class="form-control" name="gender" value=<?php echo $row['sexe'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Date de Naissance:*</label>
										<input type="text" name="place_of_birth" class="form-control"  value=<?php echo $row['dateNaissance'] ?>>
									</div>
								</div>
								<!-- <div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Semestre</label>
										<input type="number" name="semester" class="form-control"  placeholder="Semester" value=<?php echo $row['semestre'] ?>>
									</div>
								</div> -->
							</div>
							<!-- <div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Total Marks (InterMediate/HSSC/Equiv Marks):*</label>
										<input type="number" name="total_marks" class="form-control" placeholder="Marks" value=<?php echo $row['total_marks'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Obtain Marks (InterMediate/HSSC/Equiv Marks):*</label>
										<input type="number" name="obtain_marks" class="form-control"  placeholder="Marks" value=<?php echo $row['obtain_marks'] ?>>
									</div>
								</div>
							</div> -->
							<div class="row">
								<!-- <div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Current Address:*</label>
										<input type="text" name="current_address" class="form-control" value=<?php echo $row['current_address'] ?>>
									</div>
								</div> -->
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Ville ou Province: *</label>
										<input type="text" name="state" class="form-control" placeholder="State Province" value=<?php echo $row['ville'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Adresse Actuelle:*</label>
										<input type="text" name="permanent_address" class="form-control"  value=<?php echo $row['adresse'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<!-- <div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">State Or Province: *</label>
										<input type="text" name="state" class="form-control" placeholder="State Province" value=<?php echo $row['state'] ?>>
									</div>
								</div> -->
								<!-- <div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Date de Naissance:*</label>
										<input type="text" name="place_of_birth" class="form-control"  value=<?php echo $row['dateNaissance'] ?>>
									</div>
								</div> -->
							</div>
							<?php } ?>
							<div class="row mt-3">
								<div class="col-lg-6 col-md-6 offset-4">
									<input type="submit" name="sub"  class="btn btn-primary" value="Modifier Information">
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>