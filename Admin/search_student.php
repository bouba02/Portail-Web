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



<!---------------- Search Student form here ------------------------>

<?php
	if(isset($_POST["btnSearch"]))
    {
		$userId = $_POST['search'];
        $query="select * from login where user_id='$userId' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
				echo $_SESSION['LoginStudent']=$row['user_id'];
				header('Location: ../student/student-index.php');
            }
        }
        else
        { 
            header("Location: student.php");
        }
	}
	
?>

<!---------------- Search Student form here ------------------------>

<!-- La première page est une page d'accueil qui contiendra dans le menu , l'onglet Accueil
, Admission et d'Authentification.
- La partie Accueil permettra à tous les utilisateur de voir de façon générale les informations 
liée à la faculté, les différentes filière et les liens utiles de la faculté.
- L'onglet Authentification contient un formulaire d'authentification pour l'Admin , les 
Professeurs et les Etudiants déjà inscrits. La vérification sera faite par la suite
à savoir si les données sont correcte et le type d'utilisateur, après 
l'authentification, si l'utilisateur en question est :
. L'admin : il sera rédirigé vers le backoffice des Administrateurs où se trouve des fonctionnalités proposé par le sytème.
. Professeur: il sera rédirigé vers le backoffice des Professeurs où se trouve des fonctionnalités proposé par le sytème.
. Etudiant: il sera rédirigé vers la page principale où se trouve les infos , notes et concours destinée à l'étudiant. -->