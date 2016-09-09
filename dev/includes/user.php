<?php
include('password.php');
class User extends Password{
    private $_db;
    function __construct($db){
    	parent::__construct();
    	$this->_db = $db;
    }
	private function get_user_hash($username){	
		try {
			$stmt = $this->_db->prepare('SELECT password FROM Users WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			return $row['password'];
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function login($username,$password){
		session_start();
		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
			try {
			    $stmt = $this->_db->prepare('SELECT user_id, group_id FROM Users WHERE username = :username ');
			    $stmt->execute(array('username' => $username));
			    $row = $stmt->fetch(PDO::FETCH_ASSOC);
			    $_SESSION['loggedin'] = true;
			    $_SESSION['group_id'] = $row['group_id'];
			    $_SESSION['user_id'] = $row['user_id'];
			    $_SESSION['username'] = $username;
			    return true;
		    }catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
		} 	
	}
		
	public function logout(){
		session_destroy();
	}
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	
}
?>