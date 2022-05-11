<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath."/../lib/Database.php");
   include_once  ($filepath."/../helpers/Format.php");
?>
<?php
    class Customer{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
            public function customerRegi($data){
            $name = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['name']));
            $address = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['address']));
            $city = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['city']));
            $country = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['country']));
            $zip = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['zip']));
            $phone = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['phone']));
            $email = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['email']));
            $pass = $data['pass'];
        
        
            if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" ||$phone == "" || $email == "" || $pass = ""){
                $msg="<span class='error'>Field must not be empty</span>";
                return $msg;
            }
            $mailsql = "SELECT * FROM tb_customer WHERE email = '$email' LIMIT 1 ";
            $mailchk = $this->db->select($mailsql);
            if ($mailchk == true) {
                $msg="<span class='error'>Email already Exist !</span>";
                return $msg;
            }else{
                $sql = "INSERT INTO tb_customer (name, address, city, country, zip, phone, email, pass) VALUES  ('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$pass')";
                $result = $this->db->insert($sql);
                if($result){
                    $msg="<span class='success'>Customer Data Insertd Successfully</span>";
                    return $msg;
                }else {
                    $msg="<span class='error'>Customer Data Not Insertd </span>";
                    return $msg;
                }
            }
        }


        public function customerlogin($data){
            $email = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['email']));
            $pass = md5($data['pass']);
            if (empty($email) || empty($pass)) {
                $msg="<span class='error'>Field must not be empty</span>";
                    return $msg;
            }
            $sql = "SELECT * FROM tb_customer WHERE email = '$email' AND pass = '$pass' ";
            $result = $this->db->select($sql);
            if($result == true){
                $value = $result->fetch_assoc();
                Session::set("cuslogin", true);
                Session::set("cmrid", $value['id']);
                Session::set("cmrname", $value['name']);
                header("Location:cart.php");
            }else {
                $msg="<span class='error'>Email of Password not matched</span>";
                    return $msg;
            }
         }

         public function getcmarData($id){
            $sql = "SELECT * FROM tb_customer WHERE id ='$id'";
            $result = $this->db->select($sql);
            return $result;
         }

         public function updateCmrData($data, $id){
            $name = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['name']));
            $address = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['address']));
            $city = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['city']));
            $country = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['country']));
            $zip = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['zip']));
            $phone = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['phone']));
            $email = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['email']));
           
           
           
            if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" ||$phone == "" || $email == ""){
                $msg="<span class='error'>Field must not be empty</span>";
                return $msg;
         }else{
             $sql = "UPDATE tb_customer SET
                    name = '$name',
                    address = '$address',
                    city = '$city',
                    country = '$country',
                    zip = '$zip',
                    phone = '$phone',
                    email = '$email'
                    WHERE id='$id' ";
                    $result = $this->db->update($sql);
                    if($result){
                        $msg="<span class='success'>Customer Data Updated Successfully</span>";
                        return $msg;
                    }else {
                        $msg="<span class='error'>Customer Data Not Updated </span>";
                        return $msg;
                    }
         }
        }
    }
?>