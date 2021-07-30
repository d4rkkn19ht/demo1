 
<?php  

include_once 'model/user_m.php';

class user_c extends user_m
{
	private $user;

	function __construct()
	{
		$this->user = new user_m();
	}
	public function user(){
		if(isset($_GET['method'])){
			$method = $_GET['method'];
		}else{
			$method = '';
		}
		switch($method){
			case 'add':
			if(isset($_POST['register'])){
				$username = $_POST['username'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$repassword = $_POST['repassword'];
				$passw = md5($password);
				$emailCheck = $this->user->checkEmail($email);

				if ( $username !='' && $phone !='' && $email!='' && $password !='' && $password !=''&& $password == $repassword) {
					if ($emailCheck==0) {
						$add = $this->user->addMember($username, $phone, $email, $passw);
						if ($add) {
							echo "<script>alert('Đăng kí thành công!');</script>";
							header("Location: dang-nhap");
						}
						else{
							echo "<script>alert('Lỗi không đăng kí được!');</script>";
							include_once 'views/register.php';
						}
					}else{
						$erroEmail='Email đã tồn tại!';
					}
					
				}
			}
			include_once 'views/register.php';
			break;

			case 'forget':
			include_once "views/forget.php";
			if (isset($_POST['update'])) {
				$email = isset($_POST['email'])? $_POST['email']: '';
				$password = isset($_POST['password'])? $_POST['password']: '';
				$repassword = isset($_POST['repassword'])? $_POST['repassword']: '';
				$passw = md5($password);
				$repassw = md5($repassword);
				$emailCheck = $this->user->checkEmail($email);

				if ($emailCheck==0) {
					$erro = 'Email chưa đăng ký tài khoản!';
				}else{
					if ($password !='' && $repassword !='' && $password == $repassword) {
						$update = $this->user->updateMember($email, $passw);
						if ($update) {
							
							echo "<script>alert('Cập nhật thành công!');</script>";
						}else{
							echo "<script>alert('Lỗi cập nhật!');</script>";
						}

					}
					
				}
			}
			break;

			case 'login':
			if(isset($_POST['login'])){
				$email = isset($_POST['email'])? $_POST['email']: '';
				$password = isset($_POST['password'])? $_POST['password']: '';
				$passw = md5($password);
				if($passw !='' && $email !=''){
					$login = $this->user->loginUser($email,$passw);
					if (isset($login) && $login==1) {
						$getName = $this->user->getUser($email, $passw);
						$_SESSION['name']= $getName['username'];
						$_SESSION['user'] = $getName['role'];
						$_SESSION['id'] = $getName['id'];
						header('Location: admin/index.php');
					}
					else {
						$login = $this->user->loginMember($email, $passw);
						if (isset($login) && $login==1) {
							$_SESSION['user']=0;
							$member = $this->user->getMember($email, $passw);
							if ($member) {
								$id = $member['id'];
								$_SESSION['id'] = $id;
								$getName = $this->user->getName($id);
								$_SESSION['name']=$getName['lastname'];
								header('Location: trang-chu');
							}

						}else{
							$erro = 'Tài khoản hoặc mật khẩu không đúng!';
						}
					}

				}		
				

				}
				include_once 'views/login.php';
				break;
			


			case 'logout':
			if (isset($_SESSION['name']) && $_SESSION['name']!=null) {
				unset($_SESSION['name']);
				unset($_SESSION['id']);
				unset($_SESSION['carts']);
				header('Location: trang-chu');

			}
			break;
		}
	}	

}


?>