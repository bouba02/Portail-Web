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
		$que="insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date)values('".$_POST['roll_no'][$i]."','".$_POST['course_code'][$i]."','".$_POST['subject_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['total_marks'][$i]."','".$_POST['obtain_marks'][$i]."','$date')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
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
					<h4 class="">Liste Etudiants Inscrit dans mes Module </h4></div>

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
                                 $teacher_id=$_SESSION['teacher_id'];
                                 $query0="select distinct(subject_code) from teacher_courses where teacher_id='$teacher_id'";
                                 $run0=mysqli_query($con,$query0);
                                 $i=1;
								$count=0;
                                 while($row0=mysqli_fetch_array($run0)) {
                                 $subject_code=$row0['subject_code'];
                                 
								
								$query1="select distinct(course_code),semester from teacher_courses where subject_code='$subject_code'";
                                 $run1=mysqli_query($con,$query1);
                                 while($res=mysqli_fetch_array($run1)) {
										$course_code=$res['course_code'];
										$semester=$res['semester'];
                                        
                                 
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
                                            <!-- Date de deliberation -->
											<td><?php 	 $query4="select obtain_marks from class_result where roll_no='".$row['code']."' AND subject_code='".$row['subject_code']."'";
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
									
                                 }
								?>
								<input type="submit" name="sub">

								</form>
							</table>				
						</section>
					</div>
				</div>





                </div>
			</div>
		</main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

