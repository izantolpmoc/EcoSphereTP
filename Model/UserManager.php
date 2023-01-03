<?php
class UserManager {
    private PDO $db;
    public function __construct( $db1 ) {
        $this->db = $db1;
    }

    public function login(string $email, string $password) :array|false {
        $query = $this->db->query("SELECT * FROM users WHERE email = '".$email."'");      
        
        if($query->rowCount() >= 1) {
            $userData = $query->fetch( PDO::FETCH_ASSOC);
            $result = password_verify($password, $userData['password']);
            if($result == true) 
                return $userData;
            else return false;
        }

        else return false;
    }


    public function create(User $user) :bool {

        $req = $this->db->prepare(
            'INSERT INTO users ( lastName, firstName, email, address, postalCode, city,
            password, admin )
            VALUES ( :lastName, :firstName, :email, :address, :cp, :city, :password, 0 )'
            );

        return $req->execute(
            array(
            'lastName' => $user->getLastName(),
            'firstName' => $user->getFirstName(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'cp' => $user->getPostalCode(),
            'city' => $user->getCity(),
            'password' => $user->getPassword()
            )
        );        
    }

    public function findAll() {
        $req = $this->db->prepare('SELECT * FROM users');
        $req->execute();
        return $req->fetchAll();
    }

    public final function findOne($id) :User {
        $req = $this->db->prepare(
            "SELECT *
            FROM users
            WHERE id = '$id'"
            );
            $req->execute();
            $result = $req->fetch();
            return new User($result);
    }

    public final function findOneByEmail($email) :User|false {
        $req = $this->db->prepare(
            "SELECT *
            FROM users
            WHERE email = '$email'"
            );
            $req->execute();
            $result = $req->fetch( PDO::FETCH_ASSOC);

            return $result == false ? $result : new User($result);
    }

    public final function update(User $user) {
        $req = $this->db->prepare(
            "UPDATE users
            SET lastName = '".$user->getLastName()."',
            firstName = '".$user->getFirstName()."',
            email = '".$user->getEmail()."', 
            address = '".$user->getAddress()."', 
            postalCode = '".$user->getPostalCode()."', 
            city = '".$user->getCity()."', 
            password = '".$user->getEmail()."'
            
            WHERE id = '".$user->getId()."'"
            );
            $req->execute();
    }

    public final function delete(User $user) {
        $req = $this->db->prepare("DELETE FROM users WHERE id = '".$user->getId()."'");
        $req->execute();
    }
}