<?php
    include('init.php');
    use App\SQLiteConnection;
    use App\User;
    include (__DIR__."/resource/header.php");
?>
<?php
    
    /**
     * check the request method;
     * 
     */
    $logged = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $pdo = ((new SQLiteConnection)->connect());
        $UserObject = new User($pdo);

        $nomComplet = Validator::validateName($_POST['fname']);
        $nomUtilisateur = Validator::validateName($_POST['Uname']);
        $password = Hash::makeHash($_POST['pswd']);
       

        if(!empty($nomComplet) && !empty($nomUtilisateur) && !empty($password)){
            $userData = Array(
                'nomComplet' => $nomComplet,
                'nomUtilisateur' => $nomUtilisateur,
                'motDePasse'     => $password
            );

            $insertData = $UserObject->InsertUser($userData);
            if($insertData){
                $logged = true;
            }

        }














    }










?>














    <div class="auth_page">
        <div class="container">
           <div class="auth_div d-flex justify-content-center align-items-center">
           <div class="auth_form">
                <h2>Creer un compte</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php
                         if($logged == true){
                             ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong>L'utilisateur a ete creer <a href="index.php" class="alert-link">Cliquer ici pour connecter</a></a>.
                            </div>
                            <?php
                         }
                    ?>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Nom Complet</label>
                        <input type="text" class="form-control" id="email" placeholder="taper le nom d'utilisateur" name="fname">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Nom Utilisateur</label>
                        <input type="text" class="form-control" id="email" placeholder="taper le nom d'utilisateur" name="Uname">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="pwd" placeholder="taper Mot de passe" name="pswd">
                    </div>
                    
                    <button type="submit" class="auth_btn btn btn-primary">S'identifier</button>
                </form>
                <br/>
                <a href="index.php">Cliquer ici pour connecter a votr compte</a>
            </div>
           </div>
        </div>
    </div>    
<?php
     include (__DIR__."/resource/footer.php");    
?>