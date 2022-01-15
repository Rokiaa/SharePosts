<?php 
    class User extends Controller{
        private $db;
         public function __construct()
         {
             $this->db = new Database;
         }
         // Register User
         public function register($data){
             $this->db->query('INSERT INTO shareposts.users (name,email, password) VALUES (:name, :email, :password)' );
             // Bind Values
             $this->db->bind(':name', $data['name']);
             $this->db->bind(':email', $data['email']);
             $this->db->bind(':password', $data['password']);

             //Execute
             if($this->db->execute()){
                 return true;
             }
             else { return false; }
         }

        public function getUsers(){
            $this->db->query('SELECT * FROM shareposts.users');
            // $this->db->query('SELECT *, 
            // users.id as userId,
            // users.name as userName,
            // users.email as userEmail,
            // FROM shareposts.users
            // ');
            $results = $this->db->resultSet();
            return $results;
        }


        // Login User
        public function login($email,$password){
            $this->db->query('SELECT * FROM shareposts.users WHERE email=:email');
            $this->db->bind(':email', $email);

            $row= $this->db->single();

            $hashed_password= $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            }else{
                return false;
            }
        }

         //find user by email
         public function findUserByEmail($email){
             $this->db->query('SELECT * FROM shareposts.users WHERE email= :email');
             //Bind vlaue
             $this->db->bind(':email', $email);
             $row = $this->db->single();

             //Check row 
             if($this->db->rowCount() >0){
                 return true;
             } else 
             {
                 return false;
             }
         }

           //Get user by ID
           public function getUserById($id){
            $this->db->query('SELECT * FROM shareposts.users WHERE id= :id');
            //Bind vlaue
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

    }




?>