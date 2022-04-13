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
	if (isset($_POST['sub'])) {
		$subject_code=$_POST['subject_code'];
		$subject_name=$_POST['subject_name'];
		$semester=$_POST['semester'];
		$course_code=$_POST['course_code'];
		$credit_hours=$_POST['credit_hours'];

		$query="insert into course_subjects(subject_code,subject_name,course_code,semester,credit_hours)values('$subject_code','$subject_name','$course_code','$semester','$credit_hours')";
		$run=mysqli_query($con,$query);
		if ($run) {
			echo "successfully";
		}
		else{
			echo "not";
		}
	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Module</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Gestion des Modules</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="subjects.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Code du Module: </label>
										<input type="text" name="subject_code" class="form-control" required placeholder="Entrez le Code du Module" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Nom de  Module:</label>
										<input type="text" name="subject_name" class="form-control" required placeholder="Entrez Le Module" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Semestre:</label>
										<input type="text" name="semester" class="form-control" required placeholder="Entrez Semestre" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Code Filière:</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Choisissez La Filière</option>
											<?php
											$query="select course_code from courses";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
											}
										?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Durée:</label>
										<input type="number" name="credit_hours" class="form-control"  placeholder="Entrez la Durée du Module" required>
									</div>
								</div>
								<div class="col-md-6 mt-4">
									<div class="form-group pt-2">
										<input type="submit" name="sub" value="Add Subject" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>Code Module</th>
									<th>Nom du Module</th>
									<th>Code Filière</th>
									<th>Semestre</th>
									<th>Durée</th>
									<th>Action</th>
								</tr>
								<?php
									$sr=1;
									$query="select subject_code,subject_name,course_code,semester,credit_hours from course_subjects";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['subject_code']."</td>";
									echo	"<td>".$row['subject_name']."</td>";
									echo	"<td>".$row['course_code']."</td>";
									echo	"<td>".$row['semester']."</td>";
									echo	"<td>".$row['credit_hours']."</td>";
									echo	"<td width='20'><a class='btn btn-danger' href=delete-function.php?subject_code=".$row['subject_code'].">Delete</a></td>";
									echo	"</tr>";
									} 
								?>
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
