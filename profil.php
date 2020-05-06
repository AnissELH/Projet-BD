<!DOCTYPE html>

<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>Completez votre profil !</title>
<link rel="stylesheet" type="text/css" href="profiCss.css" /> 
</head>
<body class="body">

 
 <form class="login-box" method="post">

        <h2> Completez votre profil ! </h2>
        <div class="text-box">
            
            <input type="text" placeholder="Nom " name="name" id="name" required autofocus />
        </div>
        <br />
        <div class="text-box">
            
            <input type="text" placeholder="Prenom " name="Prenom" id="Prenom" required autofocus />
        </div>
        <br />
        <div class="text-box">
            
            <input type="number" placeholder="Age" name="Age" id="Age" required autofocus />
        </div>
        <br />
        <?php
       
        if(isset($_POST['formsend'])){
            $nom = $_POST['name'];
            $prenom = $_POST['Prenom'];
            $age = $_POST['Age'];
            $username = $_GET['Username'];
            $password = $_GET['password'];
            $cpassword = $_GET['cpassword'];
            
           if( !empty($nom) && !empty($prenom) && !empty($age)){
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
                     $queryy = "INSERT INTO `profil` (`pseudo`,`id`,`Nom`,`Prenom`,`Age`) VALUES ('".$username."' , NULL, '".$nom."', '".$prenom."','".$age."')";
                    $qq = mysqli_query($connect,$queryy);
                    
                    

                   
                }
                else{
                    if ( $n == 0 ) {
                    echo "Les mots de passe ne sont pas identiques ! " ;       
				    }
                }
            }	
}
            ?>  
              
        <input type="submit" class="btn" value="Continuer" id="formsend" name="formsend" autofocus /> 

</form>

</body>
</html>