<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginAdmin"])
	{
		$roll_no=$_GET['roll_no'] ?? $_SESSION['LoginStudent'];
		
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']){
		$roll_no=$_SESSION['LoginStudent'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>

	<!-------------- --------Code PHP Valide Registrer Or No ------------------ -->

	<?php 
	//Requete Pour Affectation de Filière 
				
	// $req="SELECT * FROM `course_subjects` WHERE `semester`='$semestre'";
	// $run1=mysqli_query($con, $req);
	// $count=mysqli_num_rows($run1);
	// $count=$count.sizeof();

	// while($res=mysqli_fetch_array($run1)) { 
	// $date=date("d-m-y");
	// $que="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('".$codeFiliere."','".$semestre."','".$code."','".$res['subject_code']."','$date')";
	// $run=mysqli_query($con,$que);
	// }
	// if ($run) {
	// 	$success_message = "All Subjects Successfully Assigned To The Student";
	// }	
	// else{
	// 	$error_message = "All Subjects Not Successfully Assigned To The Student";
	// }

			
		if(isset($_POST['valide'])){

			$code=$_POST['code'];
			$admission=$_POST['admission'];
			
			//$sql="UPDATE student set admission='$admission' where code='$code'";
			//REQUETE POUR AJOUTER AJOUTER UN NOUVEAU ETUDIANT
			$requete1="UPDATE `student` SET `admission` = '$admission' WHERE `student`.`code` = '$code'";
			$reponse=mysqli_query($con,$requete1);
				if ($reponse) {
					echo "L'étudiant a bien été ajouté avec Succès !";
					
				}
				else {
					echo "L'étudiant n'a pas pu être ajouter ! ";
				}
				$req="SELECT * FROM student WHERE code=$code";
				$run1=mysqli_query($con, $req);
				$res=mysqli_fetch_array($run1);
					$email=$res["email"];
					$password=$res["password"];
					$codeFiliere='SMI';
					$semestre=$res['semestre'];
					$role='Student';
					$account="Activate";
					$nom=$res['nom'];
					
			// $requete2="UPDATE `login` SET `account`='Activate' WHERE `user_id`=$email AND `Password`=$password";
			// $run2=mysqli_query($con, $requete2);
			// if ($run2) {
			// 	echo "Your Data has been Updated into login";
				
				
			// }
			// else {
			// 	echo "Your Data has not been Updated into login";
			// }

			// REQUETE D'AJOUT POUR  LE LOGIN
			$query2="INSERT INTO `login`(`user_id`, `Password`, `Role`, `account`) VALUES ('$email','$password','$role','$account')";
			$run2=mysqli_query($con, $query2);
			if ($run2) {
				echo "Your Data has been submitted into login";
			   
			}
			else {
				echo "Your Data has not been submitted into login";
			}

			//Requete Pour Affectation de Filière 
			$req="SELECT * FROM `course_subjects` WHERE `semester`='$semestre'";
			$run1=mysqli_query($con, $req);
			// $count=mysqli_num_rows($run1);
			// $count=$count.sizeof();
		
			while($res=mysqli_fetch_array($run1)) { 
			$date=date("d-m-y");
			
			$requete3="INSERT INTO `student_courses`(`course_code`,`semester`,`roll_no`,`subject_code`,`assign_date`) VALUES ('".$codeFiliere."','".$semestre."','".$code."','".$res['subject_code']."','$date')";
			$run=mysqli_query($con,$requete3);
			}
			if ($run) {
				echo "Tous les module du semestre $semestre ont été bien attribué à $nom ";
				}	
				else{
					echo  " Erreur ! ";
				}
			

		 }

		 if(isset($_POST['refus'])){
			$code=$_POST['code'];
			$req="SELECT * FROM student WHERE code=$code";
				$run1=mysqli_query($con, $req);
				$res=mysqli_fetch_array($run1);
					$email=$res["email"];
				$query2="DELETE FROM  `login` WHERE `user_id`='$email";
				$run2=mysqli_query($con, $query2);
			
				$query3="DELETE from student where code='$code'";
				$run3=mysqli_query($con,$query3);
				

				$query4="DELETE from student_courses where roll_no='$code'";
				$run4=mysqli_query($con,$query4);
				
				if ($run4) {
					header('Location: student.php');
				}
				else{
					echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
					header('Refresh: 5; url=student.php');
				}

			

		 


		}

	
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
	$query="select * from student where code='$roll_no'";
	$run=mysqli_query($con,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["photo"] ?>
					<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['nom']."  ".$row['prenoms'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Nom de Famille:</h5> <?php echo $row['nom']  ?><br><br>
							<h5>Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['telephone']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>Address:</h5> <?php echo $row['adresse']  ?><br><br>
							<h5>CNI:</h5> <?php echo $row['cni']  ?><br><br>
							<h5>Code Etudiant:</h5> <?php echo $row['code']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<!-- <div class="row pt-3">
				<div class="col-md-4"><h5>Applicant Status:</h5> <?php echo $row['applicant_status']  ?></div>
				<div class="col-md-4"><h5>Application Status:</h5> <?php echo $row['application_status']  ?></div>
				<div class="col-md-4"><h5>Prospectus Status:</h5> <?php echo $row['prospectus_issued']  ?></div>
			</div> -->
			<div class="row pt-3">
			
				<div class="col-md-4"><h5>Ville:</h5> <?php echo $row['ville']  ?></div>
				<div class="col-md-4"><h5>Semestre:</h5> <?php echo "0".$row['semestre']  ?></div>
				<div class="col-md-4"><h5>Date de Naissance:</h5> <?php echo $row['dateNaissance']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Sexe:</h5> <?php echo $row['sexe']  ?></div>
				<div class="col-md-4"><h5>Filière:</h5> <?php /*echo $row['course_code'] */ echo'SMI'  ?></div>
				<div class="col-md-4"><h5>Date D'Admission:</h5> <?php echo $row['admission_date']  ?></div>
				<!-- <div class="col-md-4"><h5>Session:</h5> <?php echo $row['session']  ?></div> -->
	
			</div>
			<!-- <div class="row pt-3">
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row['dob']  ?></div>
				<div class="col-md-4"><h5>Admission Date:</h5> <?php echo $row['admission_date']  ?></div>
				<div class="col-md-4"><h5>B Form:</h5> <?php echo $row['form_b']  ?></div>
			</div> -->
			<!-- <div class="row pt-3">
				<div class="col-md-4"><h5>Adresse Permanent:</h5> <?php echo $row['adresse']  ?></div>
				<div class="col-md-4"><h5>Current Address:</h5> <?php echo $row['current_address']  ?></div>
				<div class="col-md-4"><h5>Lieu de Naissance:</h5> <?php echo $row['dateNaissance']  ?></div>
			</div> -->
			<!-- <div class="row pt-3">
				<div class="col-md-4"><h5>Matric Complition Date:</h5> <?php echo $row['matric_complition_date']  ?></div>
				<div class="col-md-4"><h5>Matric Awarded Date:</h5> <?php echo $row['matric_awarded_date']  ?></div>
				<div class="col-md-4"><h5>Matric Certificate:</h5> <?php echo $row['matric_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Fa Complition Date:</h5> <?php echo $row['fa_complition_date']  ?></div>
				<div class="col-md-4"><h5>Fa Awarded Date:</h5> <?php echo $row['fa_awarded_date']  ?></div>
				<div class="col-md-4"><h5>Fa Certificate:</h5> <?php echo $row['fa_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>BA Complition Date:</h5> <?php echo $row['ba_complition_date']  ?></div>
				<div class="col-md-4"><h5>BA Awarded Date:</h5> <?php echo $row['ba_awarded_date']  ?></div>
				<div class="col-md-4"><h5>BA Certificate:</h5> <?php echo $row['ba_certificate']  ?></div>
			</div> -->
				<!-- <a class='btn btn-primary' href=display-student.php?roll_no=".$row['code'].">Profile</a>  -->
				<!-- <a class='btn btn-danger' href=delete-function.php?roll_no=".$row['code'].">Delete</a> -->
				<?php 
					if($row['admission']=='En attente'){
						?>
					

					<form action="" method="POST" enctype="multipart/form-data">
					<div class="row mt-3">
						<div class="col-md-4"> 
						</div>
						<div class="col-md-4"> 
							<input type="hidden" name="admission" value="Accepté">
							<input type="hidden" name="code" value=<?php echo $roll_no ?>>
							<input class='btn btn-primary' type="submit" value="Valide la Demande" name="valide">
							<input class='btn btn-danger' type="submit" value="Refus de  la Demande" name="refus">
						</div>
						<div class="col-md-4"> 
						</div>
					</form>
				<?php 
				}else{
					?>
					<div class="row mt-3">
						<div class="col-md-4"> 
						</div>
						
						<div class="col-md-4"> 
							<a class='btn btn-danger' href="<?php if($_SESSION["LoginAdmin"]){echo "student.php"; }elseif($_SESSION['LoginStudent']) {echo"../Student/student-index.php";};?>" >Retour</a>
						</div>
						<div class="col-md-4"> 
						</div>
				<?php

					} 
				?>
		</div>
	<?php } ?>
</body>
</html>
