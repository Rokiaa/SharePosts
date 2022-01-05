<?php 
    class Post{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query('SELECT *, 
                            posts.id as postId,
                            users.id as userId,
                            posts.created_at as postCreated,
                            users.created_at as userCreated
                            FROM shareposts.posts
                            INNER JOIN shareposts.users
                            ON posts.user_id = users.id
                            ORDER BY posts.created_at DESC
                            ');
            $results = $this->db->resultSet();
            return $results;
        }

        public function addPost($data){
            $this->db->query('INSERT INTO shareposts.posts (title, body, user_id) VALUES (:title, :body, :user_id)' );
            // Bind Values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':user_id', $data['user_id']);

            //Execute
            if($this->db->execute()){
                return true;
            }
            else { return false; }
        }

        public function updatePost($data){
            $this->db->query('UPDATE shareposts.posts SET title= :title, body= :body WHERE id= :id' );
            // Bind Values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }
            else { return false; }
        }


        public function getPostById($id){
            $this->db->query('SELECT * FROM shareposts.posts WHERE id=:id');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            return $row;

        }

        public function deletePost($id){
            $this->db->query('DELETE FROM shareposts.posts WHERE id= :id' );
            // Bind Values
            $this->db->bind(':id', $id);

            //Execute
            if($this->db->execute()){
                return true;
            }
            else { return false; }

        }

    }





?>