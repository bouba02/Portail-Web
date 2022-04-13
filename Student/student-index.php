<!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
	if($_SESSION['LoginStudent']){
		$_SESSION['LoginAdmin'] = "";
	}
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Student - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Bienvenue  M. <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student where code='$roll_no'";
					
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['nom']."  ".$row['prenoms'];
					}
					?> - Dashboard </h4> </h4>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-two text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-file-text-o mr-3" aria-hidden="true"></i>Details des Modules</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapseOne">
									<table class="w-100 table-elements table-two-tr"cellpadding="2">
										<tr class="pt-5 table-two text-white" style="height: 32px;">
											<th>Code Module</th>
											<th>Module</th>
											<th>Semestre</th>
										
										</tr>
										<?php $roll_no=$_SESSION['LoginStudent'];
											$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
											$max_run = mysqli_query($con, $max_semester);
											$row = mysqli_fetch_array($max_run);
											$semester = $row['semester'];
											$query="select sc.subject_code,cs.subject_name,sc.semester, sc.roll_no, sc.semester from student_courses sc inner join course_subjects cs on sc.subject_code=cs.subject_code where sc.roll_no='$roll_no' and sc.semester = $semester";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>								
										<tr>
											<td><?php echo $row['subject_code'] ?></td>
											<td><?php echo $row['subject_name'] ?></td>
											<td><?php echo $row['semester'] ?></td>
											
										</tr>
										<?php } ?>
									</table>
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-md-6 col-sm-12">
						<div>
						
							<section class="mt-4">
								<div class="btn btn-block table-five text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-info-circle mr-3" aria-hidden="true"></i> Details du semestre courant</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsethree">
									<table class="w-100 table-elements table-five-tr"cellpadding="2">
										<tr class="pt-5 table-five text-white" style="height: 32px;">
											<th>Code Module</th>
											<th>Module</th>
											<th>Semestre</th>
											<th>Coefficient</th>
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
											$max_run = mysqli_query($con, $max_semester);
											$row = mysqli_fetch_array($max_run);
											$semester = $row['semester'];
											$query="select * from student_courses inner join course_subjects on student_courses.subject_code=course_subjects.subject_code where student_courses.roll_no='$roll_no' and student_courses.semester = '$semester'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>								
											<tr>
												<td><?php echo $row['subject_code'] ?></td>
												<td><?php echo $row['subject_name'] ?></td>
												<td><?php echo $row['semester'] ?></td>
												<td>01</td>
											</tr>
											<?php } 
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
						<section class="mt-3">
								<div class="btn btn-block table-three text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i>Liste des Concours Disponible</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<table class="w-100 table-elements table-three-tr"cellpadding="2">
										<tr class="pt-5 table-three text-white" style="height: 32px;">
											<th> ID Concours</th>
											<th>Titre</th>
											<th>Description</th>
											<th>Date D'Ajout</th>
											
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$query="SELECT * FROM annonce ";
											// $query="select * from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_fee.roll_no='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) {  ?>
											
											<tr class="text-center">
												<td><?php echo $row['ID_ANNONCE'] ?></td>
												<td><?php echo $row['TITRE_ANNONCE'] ?></td>
												<td><?php echo $row['ANNONCE'] ?></td>
												<td><?php echo $row['DATE_ANNONCE'] ?></td>
												
											</tr>
											<?php	
											}
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
					<!-- <div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-4">
								<div class="btn btn-block table-one text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-check-square-o mr-3" aria-hidden="true"></i>Attendance Status</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsefour"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsefour">
									<table class="w-100 table-elements table-one-tr"cellpadding="2">
										<tr class="pt-5 table-one text-white" style="height: 32px;">
											<th>Roll No</th>
											<th>Present</th>
											<th>Absent</th>
											<th>Percentage</th>
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$query="select count(attendance_id) as attendance_id,sum(attendance) as attendance,student_id from student_attendance where student_id='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row1=mysqli_fetch_array($run)) { ?>
											<tr>
												<td><?php echo $_SESSION['LoginStudent'] ?></td>
												<td><?php echo $row1['attendance'] ? $row1['attendance'] : "0" ?></td>
												<td><?php echo $row1['attendance_id']-$row1['attendance']?></td>
												<?php $attendace =  $row1['attendance_id'] > 0 ? round(($row1['attendance']*100)/$row1['attendance_id'])."%" : "0%" ?>
												<td> <?php echo $attendace ?> </td>
											</tr>
											<?php	
											}
										?>
									</table>
								</div>
							</section>
						</div>
					</div> -->
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>