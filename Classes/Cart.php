<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/Database.php");
    include_once  ($filepath."/../helpers/Format.php");
?>
<?php
    class Cart{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function addToCart($quantity, $editid){
            $quantity    = $this->fm->validation($quantity);
            $productId   = $editid;
            $sId         = session_id();

            $sql         = "SELECT * FROM tb_product WHERE productId='$productId'";
            $result      = $this->db->select($sql)->fetch_assoc();
            $productName =  $result['productName'];
            $price       = $result['price'];
            $image       = $result['image'];

            $chksql         = "SELECT * FROM tb_cart WHERE productId='$productId' AND sId='$sId'";
            $chkresult      = $this->db->select($chksql);
            if($chkresult){
                $msg = "This Product Allredy Added!";
                return $msg;
            }else {

                    $sqlin = "INSERT INTO tb_cart (sId, productId, productName, price, quantity, image) VALUES  ('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";
                    $insert = $this->db->insert($sqlin);
                if($insert){
                header('Location: cart.php');
                }else {
                    header('Location: 404.php');
                }
            }
        }

        public function getCartProducr(){
            $sId         = session_id();
            $sql         = "SELECT * FROM tb_cart WHERE sId='$sId'";
            $result      = $this->db->select($sql);
            return $result;
        }

        public function UpdateToCart($quantity, $cartId){
            $sql = "UPDATE tb_cart SET quantity='$quantity' WHERE cartId='$cartId'";
            $result = $this->db->update($sql);
            if($result){
                $msg = "Cart Update Successfully";
                return $msg;
            }else{
                $msg = "Cart Not Update";
                return $msg;
            }
        }

        public function delCart($delid){
            $sql = "DELETE FROM tb_cart WHERE cartId='$delid'";
            $result = $this->db->delete($sql);
            if($result){
                $msg = "Cart Deleted Successfully";
                return $msg;
            }else{
                $msg = "Cart Not Deleted";
                return $msg;
            }
        }


        public function checkCartTb(){
            $sId         = session_id();
            $sql         = "SELECT * FROM tb_cart WHERE sId='$sId'"; 
            $res = $this->db->select($sql);
            return $res;
        }

        public function delCmrCart(){
            $sid= session_id();
            $sql = "DELETE FROM tb_cart WHERE sid='$sid'";
            $this->db->delete($sql);
        }

        public function checkOrderTb($cmrid){
            $sql = "SELECT * FROM tb_order WHERE cmrId ='$cmrid'";
            $result = $this->db->select($sql);
            return $result;
        }

        public function getCartPro(){
            $sid= session_id();
            $sql = "SELECT * FROM tb_cart WHERE sid ='$sid'";
            $result = $this->db->select($sql);
            return $result;
        }
        public function orderProduct($cmrid){
            $sid= session_id();
                $sql = "SELECT * FROM tb_cart WHERE sid ='$sid'";
                $getpro = $this->db->select($sql);
                if ($getpro) {
                    while ($row  = $getpro->fetch_assoc()) {
                    $productId    = $row['productId'];
                    $productName  = $row['productName'];
                    $quantity = $row['quantity'];
                    $price    = $row['price'] * $quantity;
                    $image    = $row['image'];

                    $sql = "INSERT INTO tb_order (cmrId, productId, productName, quantity, price, image) VALUES  ('$cmrid', '$productId', '$productName', $quantity, '$price', '$image')";
                    $inserted_row = $this->db->insert($sql);
                }
            }
        }

        public function payableAmount($cmrid){
            $sql = "SELECT * FROM tb_order WHERE cmrId ='$cmrid' AND date = now() ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function getOrderPro($cmrid){
            $sql = "SELECT * FROM tb_order WHERE cmrId ='$cmrid' ORDER BY productId DESC ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function gerAllorderPro(){
            $sql = "SELECT * FROM tb_order ORDER BY date ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function productShifted($id, $date, $price){
            $sql = "UPDATE tb_order SET
                    status = '1'
                    WHERE cmrId = '$id' AND date = '$date' AND price = '$price'";
            $update = $this->db->update($sql);
            if ($update) {
                $msg = "<span class='success'>Update Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Not Update.</span>";
                return $msg;
            }
        }
        public function productDelid($id, $date, $price){
            $sql = "DELETE FROM tb_order WHERE cmrId = '$id' AND date = '$date' AND price = '$price'";
            $delete=$this->db->delete($sql);
            if ($delete) {
                $msg = "<span class='success'>Delete Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Not Deleted.</span>";
                return $msg;
            }
        }
    }
?>