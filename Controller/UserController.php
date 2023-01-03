<?php

class userController {
    private $userManager;
    private $user;
    private $db;

    public function __construct($db1) {
        require('./Model/User.php');
        require_once('./Model/UserManager.php');
        $this->userManager = new UserManager($db1);
        $this->db = $db1 ;
    }

    public function login() {
        $page = 'login';
        require('./View/main.php');
    }

    public function doLogin() {

        if(isset($_POST)) {
                $result = $this->userManager->login($_POST['email'], $_POST['password']);
            if ( $result ) :
                $info = "Connexion reussie";
                $_SESSION['user'] = $result;
                $page = 'home';
            else :
                $page = "login";
                $error = "Identifiants incorrects.";
            endif;
            
            require('./View/main.php');
        }
    }

    public function logout(){

        if(isset($_SESSION['user']))
            unset($_SESSION['user']);

        $page = "home";
        require('./View/main.php');
    }

    public function create() {
        $page = "createAccount";
        require('./View/main.php');
    }

    public function doCreate()
    {

        if (
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['lastName']) &&
            isset($_POST['firstName']) &&
            isset($_POST['address']) &&
            isset($_POST['postalCode']) &&
            isset($_POST['city'])
        ) {
            $alreadyExist = $this->userManager->findOneByEmail($_POST['email']);
            
            if (!$alreadyExist) {
                //vérification: firstname et lastname ne doivent pas contenir de chiffre ou de caractères spéciaux
                if(!preg_match('/^[\p{L} -]+$/u', $_POST['firstName']) || !preg_match('/^[\p{L} -]+$/u', $_POST['lastName'])){
                    $error = "Firstname or Lastname must be letters.";
                    $page = "createAccount";
                    return require('./View/main.php');
                }
                    
                $newUser = new User($_POST);
                
                $success = $this->userManager->create($newUser);
                if($success){
                    $info = "Utilisateur " .  $newUser->getFirstName() .  " a été créé ✅.";
                    $page = 'login';
                }
                else {
                    $error = "ERROR : An unexpected error happened during the creation of your account.";
                    $page = 'createAccount';
                }
            } else {
                $error = "ERROR : This email (" . $_POST['email'] . ") is used by another user";
                $page = 'createAccount';
            }
        }
        require('./View/main.php');
    }

    public function usersList() {

        //displays userslist only if user is logged with admin role
        if(isset($_SESSION['user']) && $_SESSION['user']['admin'] == true) {
            $usersList = $this->userManager->findAll();
            $page = "usersList";
        }
        else $page = "unauthorized";
        
        require('./View/main.php');
    }
}