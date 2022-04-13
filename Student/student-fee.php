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


<!doctype html>
<html lang="en">
	<head>
		<title>Student - Fees</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main ">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Liste des Concours</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table class="w-100 table-striped table-hover table-dark" cellpadding="10">
								<tr>
									<th colspan="9"><h4 class="text-center">Details des Concours</h4 class="text-center"></th>
								</tr>
								<tr>
									<th>ID Concours </th>
									<th>Titre</th>
									<th>Description</th>
									<th>Date d'ajout</th>
									<!-- <th>Amount (Rs.)</th>
									<th>Posting Date</th>
									<th>Status</th> -->
								</tr>
								<?php 
								$roll_no=$_SESSION['LoginStudent'];
								$query="SELECT * FROM annonce ";
								// $query="select * from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_fee.roll_no='$roll_no'";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {  ?>
								
								<tr >
									<td><?php echo $row['ID_ANNONCE'] ?></td>
									<td><?php echo $row['TITRE_ANNONCE'] ?></td>
									<td><?php echo $row['ANNONCE'] ?></td>
									<td><?php echo $row['DATE_ANNONCE'] ?></td>
									
								</tr>
								<?php	
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