<?php
    include "../lib/Database.php";
    include "../lib/Session.php";
    Session::chaeckLogin();
    include "../helpers/Format.php";
?>

<?php
    class AdminLogin{

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }


        public function adminLogin($adminUser, $adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->conn, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->conn, $adminPass);

            if(empty($adminUser) || empty($adminPass)){
                $loginmsg = "Username or Password not be empty !";
                return $loginmsg;
            }else{
                $sql = "SELECT * FROM tb_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
                $result = $this->db->select($sql);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('adminId', $value['adminId']);
                    Session::set('adminUser', $value['adminUser']);
                    Session::set('adminName', $value['adminName']);
                    header('Location: index.php');
                }else {
                    $loginmsg = "Username or Password not metch !";
                 return $loginmsg;
                }
            }


        }
    }


?>