<!DOCTYPE html>
<html>
<head>
	<title>Formulaire D'Admission</title>
</head>
<body>
	<?php include('common/header.php') ?>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-xl-12 col-lg-12 col-md-12 w-100">
				<div class="bg-info text-center">
					<div class="table-one flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
						<h4>Formulaire D'Admission</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-3">
			<div class="col-md-12">
				<form action="Admin/student.php" method="POST" enctype="multipart/form-data">
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Nom:*</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Prénoms :*</label>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Date De Naissance: </label>
								<input type="date" name="dob" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Email:*</label>
								<input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Numero Telephone:*</label>
								<input type="number" name="mobile_no" class="form-control" required>
							</div>
						</div>

						<div class="col-md-4">
							
							<div class="form-group">
								<label for="exampleInputEmail1">Semestre: </label>
								<!-- <input type="text" name="semestre"  class="browser-default custom-select" required> -->
								<select class="browser-default custom-select" name="semestre"  required>
									<option >Semestre </option>
									<option value='1'>Semestre 1</option>
									<option value='2'>Semestre 2</option>
									<option value='3'>Semestre 3</option>
									<option value='4'>Semestre 4</option>
									<option value='5'>Semestre 5</option>
									<option value='6'>Semestre 6</option>
								
								</select>
								
							</div>
						</div>
					</div>

					<!-- <div class="row">
						
						<div class="col-md-4">
							<div class="form-group">

								<label for="exampleInputPassword1">Choisissez vos modules:</label>
											
									 <?php
									// include 'Connection/connection.php';
									 
									
									// 			$choix=1;
									// 	$query="select * from course_subjects where semester=$choix";

									// 	$run=mysqli_query($con,$query);
									// 	echo'<div class="row">';
									// 	while($row=mysqli_fetch_array($run)) {
											
									// 		echo	" <div class='col-md-4'> <input name='choix[]' type='checkbox' value=".$row['subject_code'].">"   .$row['subject_code'].   "</div></option>";
									// 	}
									// 	echo'</div class="row">';
										
									?> 
										

								</div>
							</div>
					</div>  -->
						
						<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Adresse: </label>
								<input type="text" name="permanent_address" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">CNI No:</label>
								<input type="text" name="cnic"  placeholder="XXXXX-XXXXXXX-X" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Image De Profil:</label>
								<input type="file" name="profile_image" placeholder="Image de Profil" accept="image/png, image/jpeg"  class="form-control" required>
							</div>
					</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Prospectus Issude: </label>
								<select class="browser-default custom-select" name="prospectus_issued">
									<option>Select Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Prospectus Amount Recvd:</label>
								<select class="browser-default custom-select" name="prospectus_amount">
									<option>Select Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div> -->
						<!-- <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Form B:</label>
								<input type="text" name="form_b" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Applicant Status: </label>
								<select class="browser-default custom-select" name="applicant_status">
									<option>Select Option</option>
									<option value="Admitted">Admitted</option>
									<option value="Not Admitted">Not Admitted</option>
								</select>
							</div>
						</div> -->
						<!-- <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Application Status:</label>
								<select class="browser-default custom-select" name="application_status">
									<option>Select Option</option>
									<option value="Approved">Approved</option>
									<option value="Not Approved">Not Approved</option>
								</select>
							</div>
						</div> -->
					
					<!-- <div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Other Phone:</label>
								<input type="number" name="other_phone" class="form-control">
							</div>
						</div> 
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Gender:</label>
								<select class="browser-default custom-select" name="gender">
									<option>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
					</div> -->
					
						
						
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Ville :</label>
								<input type="text" name="ville" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mot de passe:</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Confirmez votre mot de passe:</label>
								<input type="password" name="passwordConfirm" class="form-control" >
							</div>
						</div>
					</div>
						<!-- <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Matric/OLevel Complition Date: </label>
								<input type="date" name="matric_complition_date" class="form-control">
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
							<div class="form-group">
								<label for="exampleInputPassword1">FA/ALevel Awarded Date:</label>
								<input type="date" name="fa_awarded_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
								<input type="file" name="fa_certificate" class="form-control" value="there is no image" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">BA Complition Date: </label>
								<input type="date" name="ba_complition_date" class="form-control" value="0">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">BA Awarded Date:</label>
								<input type="date" name="ba_awarded_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload BA Certificate:</label>
								<input type="file" value="C:/xampp/htdocs/Imperial University/Images/no-image-available.jpg" name="ba_certificate" class="form-control" >
							</div>
						</div> -->
					</div>
					<!-- _________________________________________________________________________________
														Hidden Values are here
					_________________________________________________________________________________ -->
					<div>
						<!-- <input type="hidden" name="password" value="student123*"> -->
						<input type="hidden" name="admission" value="En attente">
						<input type="hidden" name="role" value="Student">
					</div>
					<!-- _________________________________________________________________________________
														Hidden Values are end here
					_________________________________________________________________________________ -->
					<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Sexe:</label>
								<select class="browser-default custom-select" name="sexe">
									<option>Selectionnez votre sexe</option>
									<option value="Masculin">Masculin</option>
									<option value="Feminin">Feminin</option>
								</select>
							</div>
						</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary px-5" name="btn_save">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 w-100 p-5">
				<h4 class="bg-secondary p-3 text-center text-white">Engagement</h4>
				<h5>Les candidats en attente de résultats sont tenus de signer l'engagement suivant :</h5>
				<p class="tet-justify">
				Je déclare solennellement que j'ai soumis la demande avec 
				le consentement de mon père / tuteur. Je m'engage à respecter les règles et 
				règlements de la FSR de Lahore et à ne participer à aucune activité politique
				 de quelque nature que ce soit. Si je le fais, l'administration FSR aura le droit
				  de rayer mon nom des listes FSR. Je m'engage à ne pas garder en ma possession des
				   armes de quelque nature que ce soit, qu'elles soient autorisées ou non. J'affirme que je n'ai 
				   jamais été expulsé / rustique par aucune institution à aucun moment. Je comprends que si mon 
				   pourcentage d'assiduité aux cours n'est pas à la hauteur de la norme requise par le FSR, je ne
				    serai pas éligible pour passer les examens finaux. J'affirme que si, à un stade quelconque,
					 les documents que j'ai soumis pour admission s'avèrent falsifiés, faux ou erronés, j'en
					  serai responsable et l'administration FSR aura le droit d'annuler mon admission et de prendre
					   les mesures nécessaires contre moi.
					</p>
			</div>
		</div>	
	</div>
</body>
</html>