 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$dateDeliberation='06-08-21';
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['sub'])) {
	$count=$_POST['count'];
	for ($i=0; $i < $count; $i++) {  
		$date=date("d-m-y");
		$run0="select * from class_result where roll_no='".$_POST['roll_no'][$i]."' and subject_code='".$_POST['subject_code'][$i]."'";
		$res=mysqli_fetch_array(mysqli_query($con,$run0));
		if(!$res){
			$que="insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date)values('".$_POST['roll_no'][$i]."','".$_POST['course_code'][$i]."','".$_POST['subject_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['total_marks'][$i]."','".$_POST['obtain_marks'][$i]."','$date')";
			$run=mysqli_query($con,$que);
			if ($run) {
					echo "Insert Successfully - ";
				}	
				else{
					echo " Insert Not Successfully -";
					
				}
			}else{
				$que1="update class_result set obtain_marks='".$_POST['obtain_marks'][$i]."' where roll_no='".$_POST['roll_no'][$i]."' AND subject_code='".$_POST['subject_code'][$i]."' AND semester='".$_POST['semester'][$i]."'";
			$run1=mysqli_query($con,$que1);
			if ($run1) {
					echo "Update Successfully ";
				}	
				else{
				
					echo " Update Not Successfully ";
					
				}
			}
		}
		}

?>

<!doctype html>
<html lang="en">
	<head>
		<title>Gestion de Notes</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Ajoutez les notes </h4>
					
				</div><a class="btn btn-outline-primary ml-auto mr-2 text-black" href="display_Etudiant.php">Consulter les étudiants inscrits </a>

				<div class="row">
					<div class="col-md-12">
						<form action="class-result.php" method="post">
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Entrez la filière :</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Selectionner la filière</option>
											<?php
											$teacher_id=$_SESSION['teacher_id'];
											$query="select distinct(course_code) from teacher_courses where teacher_id='$teacher_id'";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Entrez Semestre:</label>
										<input type="text" class="form-control" name="semester" placeholder="Entre le semestre">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Entrez le Cours:</label>
										<select class="browser-default custom-select" name="subject_code" required="" >
											<option>Selectionnez Module</option>
											<?php
											$teacher_id=$_SESSION['teacher_id'];
											$query="select distinct(subject_code) from teacher_courses where teacher_id='$teacher_id'";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<input type="submit" name="submit" class="btn btn-primary" value="Press">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr"cellpadding="5" >
								<tr class="table-tr-head text-white table-three">
									<th>No.</th>
									<th>Code Etudiant</th>
									<th>Filière</th>
									<th>Module</th>
									<th>Semestre</th>
									<th>Nom Etudiant</th>
									<th>Note totale</th>
									<th>Note Obtenue</th>
								</tr>
								<?php  
								$i=1;
								$count=0;
									if (isset($_POST['submit'])) {
										$course_code=$_POST['course_code'];
										$semester=$_POST['semester'];
										$subject_code=$_POST['subject_code'];


										$que="select student.code,student.nom,student.prenoms,student_courses.semester,student_courses.course_code,subject_code from student_courses inner join student on student.code=student_courses.roll_no where student_courses.course_code='$course_code' and student_courses.semester='$semester' and student_courses.subject_code='$subject_code'";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
										$count++;
									?>
										<form action="class-result.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['code'] ?></td>
											<input type="hidden" name="roll_no[]" value=<?php echo $row['code'] ?> >
											<td><?php echo $row['course_code'] ?></td>
											<input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?> >
											<td><?php echo $row['subject_code'] ?></td>
											<input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?> >
											<td><?php echo $row['semester'] ?></td>
											<input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?> >
											<td><?php echo $row['nom']."  ".$row['prenoms'] ?></td>
											<td class="text-center"><?php echo "20" ?></td>
											<input type="hidden" name="total_marks[]" value="20" >
											<td>
												<!-- Date de deliberation -->
												<?php 	 $query4="select obtain_marks from class_result where roll_no='".$row['code']."' AND subject_code='".$row['subject_code']."'";
                                                $run4=mysqli_query($con,$query4);
                                                $row4=mysqli_fetch_array($run4);
                                                	$date=date("d-m-y");
											    if($date>$dateDeliberation) {?>
                                                  <input type="text" name="obtain_marks[]" placeholder="Note obtenue" value="<?php echo $row4['obtain_marks'];?>" class="form-control"></td>
                                                <?php } else{ 
                                                 echo $row4['obtain_marks'];};?> 
												
												<!-- <input type="text" name="obtain_marks[]" placeholder="Note obtenue" class="form-control"></td> -->
											<input type="hidden" name="count" value="<?php echo $count ?>">
											
										</tr>
										
								<?php		
									}
									}
								?>
								<input type="submit" name="sub">

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

