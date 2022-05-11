<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once  ($filepath."/../helpers/Format.php");
?>
<?php
    class Product{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function productInsert($data, $file){
            $productName = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['productName']));

            $catId = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['catId']));
    
            $brandId = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['brandId']));
    
            $body = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['body']));
    
            $price = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['price']));
    
            $type = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['type']));

        $permited  = array('jpg','jpeg','png','gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $file_name == "" || $type == ""){
            $msg="<span class='error'>Field must not be empty</span>";
            return $msg;
    }elseif($file_size > 1048567){
        $msg="<span class='error'>Image Size should be less then 1MB</span>";
        return $msg;
    }elseif(in_array($file_ext,$permited) === false){
        $msg="<span class='error'>You can Upload only:-".implode(',', $permited)."</span>";
        return $msg;
    } else {
        move_uploaded_file($file_temp, $uploaded_image);
        $sql = "INSERT INTO tb_product (productName, catId, brandId, body, price, image, type) VALUES  ('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";
        $result = $this->db->insert($sql);
        if($result){
            $msg="<span class='success'>Product Insertd Successfully</span>";
            return $msg;
        }else {
            $msg="<span class='error'>Product Not Insertd </span>";
            return $msg;
        }
     }
    
        }

        public function getAllproduct(){

        $sql = "SELECT * FROM tb_product p
                INNER JOIN tb_category c
                ON p.catId = c.catId
                INNER JOIN tb_brand b
                ON p.brandId = b.brandId
                ORDER BY p.productId DESC";
        $result = $this->db->select($sql);
        return $result;
        }

        public function showProById($editid){
            $sql = "SELECT * FROM tb_product WHERE productId='$editid'";
            $result = $this->db->select($sql);
            return $result;
        }


        public function productUpdate($data, $file, $editid){
            $productName = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['productName']));

            $catId = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['catId']));
    
            $brandId = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['brandId']));
    
            $body = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['body']));
    
            $price = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['price']));
    
            $type = mysqli_real_escape_string($this->db->conn, $this->fm->validation($data['type']));

        $permited  = array('jpg','jpeg','png','gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == ""){
            $msg="<span class='error'>Field must not be empty</span>";
            return $msg;
            }else{
                    if(!empty($file_name)){

                    if($file_size > 1048567){
                    $msg="<span class='error'>Image Size should be less then 1MB</span>";
                    return $msg;
                }elseif(in_array($file_ext,$permited) === false){
                    $msg="<span class='error'>You can Upload only:-".implode(',', $permited)."</span>";
                    return $msg;
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                

                    $sql = "UPDATE tb_product
                            SET
                            productName    = '$productName',
                            catId          = '$catId',
                            brandId        = '$brandId',
                            body           = '$body',
                            price          = '$price',
                            image          = '$uploaded_image',
                            type           = '$type'
                            WHERE productId= '$editid'
                            ";
                    $result = $this->db->update($sql);
                    if($result){
                        $msg="<span class='success'>Product Updated Successfully</span>";
                        return $msg;
                    }else {
                        $msg="<span class='error'>Product Not Updated ! </span>";
                        return $msg;
                    }
                }
                }else{
                            $sql = "UPDATE tb_product
                            SET
                            productName    = '$productName',
                            catId          = '$catId',
                            brandId        = '$brandId',
                            body           = '$body',
                            price          = '$price',
    
                            type           = '$type'
                            WHERE productId= '$editid'
                            ";
                    $result = $this->db->update($sql);
                    if($result){
                        $msg="<span class='success'>Product Updated Successfully</span>";
                        return $msg;
                    }else {
                        $msg="<span class='error'>Product Not Updated ! </span>";
                        return $msg;
                    }
                }

        }
    }

    public function delProById($id){
        $sql = "SELECT * FROM tb_product WHERE productId = '$id'";
        $result = $this->db->select($sql);
        if($result){
            while($delimg = $result->fetch_assoc()){
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }

        $sql = "DELETE FROM tb_product WHERE productId='$id'";
        $del = $this->db->delete($sql);
        if ($del) {
            $msg = "<span class='success'>Product Deleted Successfully</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Product not Deleted !</span>";
        return $msg;
        }
    }

    public function getFeatureProducts(){
        $sql = "SELECT * FROM tb_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
            $result = $this->db->select($sql);
            return $result;
    }

    public function getNewProducts(){
        $sql = "SELECT * FROM tb_product ORDER BY productId DESC LIMIT 4";
            $result = $this->db->select($sql);
            return $result;
    }

    public function getSingleProduct($editid){
       $sql = "SELECT * FROM tb_product p
                INNER JOIN tb_category c
                ON p.catId = c.catId
                INNER JOIN tb_brand b
                ON p.brandId = b.brandId
                WHERE p.productId = '$editid'";
            $result = $this->db->select($sql);
            return $result;
    }


    public function getIphone(){
        $sql = "SELECT * FROM tb_product WHERE brandId='5' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
    }

    public function getSamsung(){
        $sql = "SELECT * FROM tb_product WHERE brandId='2' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
    }

    public function getAcer(){
        $sql = "SELECT * FROM tb_product WHERE brandId='1' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
    }

    public function getCanon(){
        $sql = "SELECT * FROM tb_product WHERE brandId='3' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
    }

    public function getProductsByCat($catId){
        $sql = "SELECT * FROM tb_product WHERE catId='$catId'";
        $result = $this->db->select($sql);
        return $result;
    }




    }
?>