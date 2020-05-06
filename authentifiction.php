<!DOCTYPE html>
<html >
<head>
    <title>Connectez-vous !</title>
    <link rel="stylesheet" type="text/css" href="authntificationCss.css" />     


</head>
<body class="body">
    <form action="profil.php" class="login-box" method="get">

        <h2> Inscrivez-vous pour Continuer</h2>
        <div class="text-box">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <input type="text" placeholder="Nom d'utilisateur" name="Username" id="Username" required autofocus />
        </div>
        <br />
        <div class="text-box">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Mot de passe" name="password" id="password" required autofocus />
        </div>
        <br />
        <div class="text-box">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Confirmer votre mot de passe" name="cpassword" id="cpassword" required autofocus />
        </div>
        <br />
        <?php   
        if(isset($_GET['formsend'])){
            $username = $_GET['Username'];
            $password = $_GET['password'];
            $cpassword = $_GET['cpassword'];

            if( !empty($username) && !empty($password) && !empty($cpassword)){
                $connect = mysqli_connect("localhost","root","") or die('Error');
                mysqli_select_db($connect,'siteweb'); 
                $search = "SELECT `pseudo` FROM `users` " ;
                $qq= mysqli_query($connect, $search);
                $n = 0 ;
                while($row = $qq->fetch_row()) {
                    if ( $username == $row[0]){
                            $n =1 ;  
                            echo "Username existe deja !"    ;
				    }
                }
                if ( ($password == $cpassword) && ($n == 0 ) ){
                    $query = "INSERT INTO `users` (`id`, `pseudo`, `password`) VALUES (NULL, '".$username."', '".$password."')";
                    $q = mysqli_query($connect,$query);
                    
                    
                    

                   
                }
                else{
                    if ( $n == 0 ) {
                    echo "Les mots de passe ne sont pas identiques ! " ;       
				    }
                }
            }	
        }
    ?>
    
    <input type="submit" class="btn" value="S'inscrire" id="formsend" name="formsend" autofocus /> 
   
    </form>
        
    

</body>
</html>