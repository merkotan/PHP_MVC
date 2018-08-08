<?php
namespace Weather\Models;
use Weather\Libs\Model;

class FeedbackModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function userFeed()
	{
		$feed = $_POST['feed'];
		$feed = stripslashes($feed);
        $feed = trim(htmlspecialchars($feed));
        $first_name=$_SESSION['first_name'];
        $email = $_SESSION['email'];
		//registered user. insert him into user where id=id
		$query =  $this->db->prepare('SELECT id FROM user WHERE email = ?');
		$query->execute(['$email']);
		$data = $query->fetch();
		$user_id = $data['id'];
		$query =  $this->db->prepare('INSERT INTO feeds (feed, user_id) VALUES (?, ?)');
		$query->execute([$feed, $user_id]);
		$data = $query->fetch();
	}

	public function guestFeed()
	{
		$feed = $_POST['feed'];
        $feed = trim(htmlspecialchars(stripslashes($feed)));			
		$name=$_POST['f_name'];
        $name = trim(htmlspecialchars(stripslashes($name)));			
		$email=$_POST['f_email'];
        $email = trim(htmlspecialchars(stripslashes($email)));			
         //unregestered user. insert him into guest 
        $query = $this->db->prepare('INSERT INTO guest (name, email) VALUES (?, ?)');
        $query->execute([$name, $email]);
        $last_id = $this->db->lastInsertId();
        $query = $this->db->prepare('INSERT INTO feeds (feed, guest_id) values (?, ?)');
       	$query = execute([$feed, $last_id]);
	}

	public function createCap()
	{
		$response_key = $_POST['g-recaptcha-response'];
		$response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
		$response = json_decode($response);
		if ($response->success ==1) {
			return true;
		} else {
			return false;
		}
	}
}