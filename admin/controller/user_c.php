
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
		
		if (isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			if ($_SESSION['user']==1) {
				$method='listUser';
			}else{
				
				header("Location: index.php");
				echo "<script>alert('Bạn chưa được phân quyền!');</script>";

			}
			
		}

		switch ($method) {
			case 'update':
			if (isset($_GET['id']) && $_SESSION['user']==1) {
				$id = $_GET['id'];
				$user = $this->user->getUserById($id);
				include_once 'views/user/updateUser.php';
				if (isset($_POST['update'])) {
					$username = $_POST['username'];
					$email    = $_POST['email'];
					$phone    = $_POST['phone'];
					$role     = $_POST['role'];
					$status   = $_POST['status'];

					$update   = $this->user->updateUser($id, $username, $email, $phone, $role, $status);
					if ($update) {
						$_SESSION['noti']='update';
						header("Location: index.php?page=user");
					}else{
						echo "<script>alert('Cập nhật không thành công!');</script>";
					}
				}
			}else{
				header("Location: index.php");
				echo "<script>alert('Bạn chưa được phân quyền!');</script>";
			}
			break;

			case 'add':
			if ($_SESSION['user']==1) {

				include_once 'views/user/addUser.php';
				if (isset($_POST['add'])) {
					$username = $_POST['username'];
					$email    = $_POST['email'];
					$phone    = $_POST['phone'];
					$role     = $_POST['role'];
					$checkEmail = $this->user->checkEmail($email);
					if (isset($checkEmail)) {
						if ($checkEmail==0) {
							$add = $this->user->addUser($username, $email, $phone, $role);
							if ($add) {
								$_SESSION['noti']='add';
								header("Location: index.php?page=user");
							}else{
								echo "<script>alert('Thêm mới không thành công!');</script>";
							}
						}else{
							echo "<script>alert('Email đã tồn tại!');</script>";
						}

					}
				}
			}else {
				header("Location: index.php");
				echo "<script>alert('Bạn chưa được phân quyền!');</script>";
			}
			break;

			case 'remove':
			if (isset($_GET['id']) && $_SESSION['user']==1) {
				$id = (int)$_GET['id'];

				$remove = $this->user->deleteUser($id);

				if ($remove) {
					$_SESSION['noti'] = 'delete';
					header("Location: index.php?page=user");
				}else{
					echo "<script>alert('Lỗi không xóa được!');</script>";
				}
			}else{
				header("Location: index.php");
			}
			break;

			case 'logout':
			if (isset($_SESSION['name']) && $_SESSION['name']!=null) {
				unset($_SESSION['name']);

				header('Location: index.php');
				echo "<script>alert('Đã đăng xuất tài khoản!');</script>";
			}
			break;

			default:
			if (isset($_POST['search'])) {
				$key = '%'.$_POST['key'].'%';
				$keys = $_POST['key'];
				$user = $this->user->searchUser($key);
				if ($user) {
					$count=0;
					foreach ($user as $key => $value) {
						$count++;
					}
					$_SESSION['noti']=3;
				}else{
					$_SESSION['noti']=4;
				}
				include_once 'views/user/listUser.php';
			}else{
				$user = $this->user->getUser();
				include_once 'views/user/listUser.php';
			}
			break;



		}
	}
}
?>