<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION['LoginTeacher']="";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];

 		$last_name=$_POST["last_name"];
 		
 		$email=$_POST["email"];
 		
 		$phone_no=$_POST["phone_no"];
 		
 		$teacher_status=$_POST["teacher_status"];
 		
 		//$application_status=$_POST["application_status"];
 		
 		$cnic=$_POST["cnic"];
 		
 		$dob=$_POST["dob"];
 		
 		//$other_phone=$_POST["other_phone"];
 		
 		$gender=$_POST["gender"];
 		
		$permanent_address=$_POST["permanent_address"];
 		
 		// $current_address=$_POST["current_address"];
 		
 		$place_of_birth=$_POST["place_of_birth"];
		 $state=$_POST['state'];
 		
 		// $matric_complition_date=$_POST["matric_complition_date"];
 		
 		// $matric_awarded_date=$_POST["matric_awarded_date"];
 		
 		// $fa_complition_date=$_POST["fa_complition_date"];
 		
 		// $fa_awarded_date=$_POST["fa_awarded_date"];
 		
 		// $ba_complition_date=$_POST["ba_complition_date"];
 		
 		// $ba_awarded_date=$_POST["ba_awarded_date"];

 		// $ma_complition_date=$_POST["ma_complition_date"];
 		
 		// $ma_awarded_date=$_POST["ma_awarded_date"];

 		$date=date("d-m-y");

 		$password=$_POST['password'];

 		$role=$_POST['role'];
		
		
// *****************************************Images upload code starts here********************************************************** 
 		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		// $matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		// $fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

		// $ba_certificate = $_FILES['ba_certificate']['name'];$tmp_name=$_FILES['ba_certificate']['tmp_name'];$path = "images/".$ba_certificate;move_uploaded_file($tmp_name, $path);

		// $ma_certificate = $_FILES['ma_certificate']['name'];$tmp_name=$_FILES['ma_certificate']['tmp_name'];$path = "images/".$ma_certificate;move_uploaded_file($tmp_name, $path);

// *****************************************Images upload code end here********************************************************** 


 		$query1="INSERT INTO `teacher_info`(`first_name`,`last_name`,`email`,`phone_no`,`profile_image`,`teacher_status`,`cnic`,`dob`,`gender`,`permanent_address`,`place_of_birth`,`state`,`hire_date`) VALUES ('".$first_name."','".$last_name."','".$email."','".$phone_no."','".$profile_image."','".$teacher_status."','".$cnic."','".$dob."','$gender','$permanent_address','$place_of_birth','$state','$date')";
		 var_dump($query1);
 		$run=mysqli_query($con, $query1);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 		$query2="INSERT INTO `login`(`user_id`,`Password`,`Role`,`account`) VALUES ('$email','$password','$role','')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			echo " -Your Data has been submitted into login";
 		}
 		else {
 			echo " -Your Data has not been submitted into login";
 		}
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code']; //Code filiere 

		$semester=$_POST['semester'];

		$teacher_id=$_POST['teacher_id'];

		$subject_code=$_POST['subject_code'];  //code Module

		// $total_classes=$_POST['total_classes'];

		$date=date("d-m-y");

		$query3="insert into teacher_courses(course_code,semester,teacher_id,subject_code,assign_date)values('$course_code','$semester','$teacher_id','$subject_code','$date')";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Ajout Professeur</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Gestion Des Professeurs </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter un Professeur</button>
					</div>
				</div>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Ajouter un Nouveau Professeur</h4>
									</div>
									<div class="modal-body">
										<form action="teacher.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Nom:* </label>
														<input type="text" name="first_name" class="form-control" required="" placeholder="Nom">
													</div>
												</div>
												<!-- <div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Deuxième Prénoms: </label>
														<input type="text" name="middle_name" class="form-control"  placeholder="Deuxième Prénoms">
														</div>
												</div> -->
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Prénoms:* </label>
														<input type="text" name="last_name" class="form-control" required="" placeholder="Prénoms">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Ville :*</label>
														<input type="text" name="state" class="form-control"  required="" placeholder="Entrez votre Ville">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1"> Email:*</label>
														<input type="email" name="email" class="form-control" required="" placeholder="xxxx@gmail.com">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Contact * </label>
														<input type="text" name="phone_no" class="form-control"placeholder="Entrez Votre Numéro " reuired=''>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Sélectionnez votre Photo </label>
														<input type="file" name="profile_image" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Status du Professeur: </label>
														<select class="browser-default custom-select" name="teacher_status" required="">
															<option >Select Status</option>
															<option value="Permanent">Permanent	</option>
															<option value="Contract">Contrat</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Lieu de Naissance:</label>
														<input type="text" name="place_of_birth" class="form-control" required='' placeholder="Entrez votre Lieu de Naissance">
													</div>
												</div>
												<!-- <div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Application Status:</label>
														<select class="browser-default custom-select" name="application_status">
															<option >Select Status</option>
															<option value="Yes">Oui</option>
															<option value="No">Non</option>
														</select>
													</div>
												</div> -->
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">No CIN:</label>
														<input type="text" name="cnic" class="form-control"  required="" placeholder=" No CIN">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Date De Naissance: </label>
														<input type="date" name="dob" class="form-control" required>
													</div>
												</div>
												<!-- <div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Autre Telephone:</label>
														<input type="number" name="other_phone" class="form-control" placeholder="No telephone">
													</div>
												</div> -->
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Sexe:</label>
														<select class="browser-default custom-select" name="gender">
															<option selected>Selectionner le Sexe</option>
															<option value="Masculin">Masculin</option>
															<option value="Feminin">Feminin</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Adresse : </label>
														<input type="text" name="permanent_address" class="form-control" required="" placeholder="Entrez votre Adresse ">
													</div>
												</div>
											</div>
											<div class="row">
												
												<!-- <div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Adresse Actuelle :</label>
														<input type="text" name="current_address" class="form-control" required="" placeholder="Entrez L'Adresse Actuelle">
													</div>
												</div> -->
												<!-- <div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Ville :</label>
														<input type="text" name="state" class="form-control"  required="" placeholder="Entrez votre Ville">
													</div>
												</div> -->
												
											</div>
											<!-- <div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Matric/OLevel Complition Date: </label>
														<input type="date" name="matric_complition_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Matric/OLevel Awarded Date:</label>
														<input type="date" name="matric_awarded_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Matric/OLevel Certificate:</label>
														<input type="file" name="matric_certificate" class="form-control">
													</div>
												</div>
											</div> -->
											<!-- <div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">FA/ALevel Complition Date: </label>
														<input type="date" name="fa_complition_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">FA/ALevel Awarded Date:</label>
														<input type="date" name="fa_awarded_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
														<input type="file" name="fa_certificate" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">BA Complition Date: </label>
														<input type="date" name="ba_complition_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">BA Awarded Date:</label>
														<input type="date" name="ba_awarded_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload BA Certificate:</label>
														<input type="file" name="ba_certificate" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">MA Complition Date: </label>
														<input type="date" name="ma_complition_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">MA Awarded Date:</label>
														<input type="date" name="ma_awarded_date" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload MA Certificate:</label>
														<input type="file" name="ma_certificate" class="form-control">
													</div>
												</div> -->
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
											<div>
												<input type="hidden" name="password" value="teacher123*">
												<input type="hidden" name="role" value="Teacher">
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_save" value="Ajouter">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<div class="row">
								<div class="col-md-3 offset-9 pt-5 mb-2">
									<!-- Large modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Attribuer Module</button>
									<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-info text-white">
													<h4 class="modal-title text-center">Attribution des Modules aux Profs</h4>
												</div>
												<div class="modal-body">
													<form action="teacher.php" method="POST" enctype="multipart/form-data">
														<div class="row mt-3">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputEmail1">Select Filière:*</label>
																	<select class="browser-default custom-select" name="course_code" required="">
																		<option >Selectionnez Filière</option>
																		<?php
																			$query="select distinct(course_code) from courses";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																			}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1" required>Entrez le Semestre:*</label>
																	<input type="text" name="semester" id="semester" class="form-control">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1">Entrez l'ID du Professeur:*</label>
																	<input type="text" name="teacher_id" class="form-control" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1"> Choisissez le module:*</label>
																	<select class="browser-default custom-select" name="subject_code" required="">
																		<option >Choix du Module</option>
																		<?php
																			$query="select subject_code from course_subjects order by semester asc";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1">Enter Total Classes:*</label>
																	<input type="text" name="total_classes" class="form-control" required>
																</div>
															</div>
														</div> -->
														<div class="modal-footer">
															<input type="submit" class="btn btn-primary" name="btn_save2">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
									</div>
									</div>
								</div>
							</div>
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th> ID Professeur</th>
									<th>Nom & Prenoms</th>
									<th>Adresse Actuelle</th>
									<th>Date D'arrivée</th>
									<th>Email</th>
									<th>Operations</th>
								</tr>
								<?php 
								$query="SELECT * from teacher_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr>";
									echo "<td>".$row["teacher_id"]."</td>";
									echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
									echo "<td>".$row["permanent_address"]."</td>";
									echo "<td>".$row["hire_date"]."</td>";
									echo "<td>".$row["email"]."</td>";
									echo	"<td width='170'><a class='btn btn-primary' href=display-teacher.php?teacher_id=".$row['teacher_id'].">Profile</a> <a class='btn btn-danger' href=delete-function.php?teacher_id=".$row['teacher_id'].">Delete</a></td>";
									echo "</tr>";
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


