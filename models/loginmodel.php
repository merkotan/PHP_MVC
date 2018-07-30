<?php 
/**
*/
class LoginModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	// проверяем в БД, зарегистрирован ли юзер с таким имейлом
	public function logged()
	{
		$email = $_POST['email'];	
		$password = $_POST['password'];
		$query = $this->db->prepare('SELECT id, first_name FROM user WHERE email = ? AND password = ?');
		$query->execute([$email, $password]);
		$data=$query->fetch();
		if (!empty($data['id'])) {
			$_SESSION['email'] = $email;
			$_SESSION['first_name'] = $data['first_name'];
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//запись в бд нового пользователя, зарегистрировавшегося в бд
	public function addUser()
	{
	if (isset($_POST['first_name'])) {
		$first_name = $_POST['first_name'];
	}
    if ($first_name == '') {
    	unset($first_name);
    } 
	if (isset($_POST['last_name'])) {
		$last_name = $_POST['last_name'];
	}
    if ($last_name == '') {
    	unset($last_name);
    } 
    if (isset($_POST['auth_pass'])) {
        $password=$_POST['auth_pass'];
    }
    if ($password =='') {
    	unset($password);
    }
    if (isset($_POST['auth_email'])) {
        $email=$_POST['auth_email'];
    }
    if ($email ==''){
    	unset($email);
    } 
    if (empty($first_name) or empty($last_name) or empty($password) or empty($email)) {
            exit ("Fill in all fields PLEASE!");
        }
	//если все поля заполнені, то обрабатываем их, чтобы теги и скрипты не работали
    $first_name = trim(htmlspecialchars(stripslashes($first_name)));
    $last_name = trim(htmlspecialchars(stripslashes($last_name)));
    $password = trim(htmlspecialchars(stripslashes($password)));
    $email = htmlspecialchars($email);   
	if ((strlen($email) < 6)&& (preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $email) === 0)){
		echo "$email<br/>";
		exit("WRONG email!");
	}
		//проверка, есть ли в бд юзер с таким же имейлом
	$query =  $this->db->prepare('SELECT id FROM user WHERE email = ?');
	$query->execute([$email]);
	$data=$query->fetch();
	if (!empty($data['id'])) {
		echo "U V been registered already!";
		return FALSE;
	} else {
		//запись в таблицу user введенніе email, name etc
		$query =  $this->db->prepare('INSERT INTO user(first_name, last_name, email, email_status, password)
		values (?, ?, ?, 0, ?)  on duplicate key update email=?');
		$query->execute([$first_name, $last_name, $email, $password, $email]);//$first_name $last_name $email $password 
		//запись данніх в сессию для использования при переходе на другую страницу
		$_SESSION['email'] = $email;
		$_SESSION['first_name'] = $first_name;
	}
	$this->first_name = $first_name;
}
}
