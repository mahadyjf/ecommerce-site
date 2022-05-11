<?php
    include "../lib/Database.php";
    include "../helpers/Format.php";
?>
<?php
    class Brand{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }


        public function brandInsert($brandName){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->conn, $brandName);

            if(empty($brandName)){
                $msg = "<span class='error'>Brand field must not be empty !</span>";
                return $msg;
            }else{
                $sql = "INSERT INTO tb_brand (brandName) VALUES ('$brandName')";
                $brandin = $this->db->insert($sql);
                if ($brandin) {
                    $msg = "<span class='success'>Brand Insertd Successfully</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Brand not Inserted !</span>";
                return $msg;
                }
            }
        }


        public function showAllBrand(){
            $sql = "SELECT * FROM tb_brand ORDER BY brandId DESC";
            $result = $this->db->select($sql);
            return $result;
        }


        public function delcat($delid){
            $sql = "DELETE FROM tb_brand WHERE brandId='$delid'";
            $del = $this->db->delete($sql);
            if ($del) {
                $msg = "<span class='success'>Brand Deleted Successfully</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Brand not Deleted !</span>";
            return $msg;
            }
        }

        public function showBrandById($editid){
            $sql = "SELECT * FROM tb_brand WHERE brandId='$editid'";
            $result = $this->db->select($sql);
            return $result;
        }

        public function brandUpdate($brandName, $editid){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->conn, $brandName);
            $editid = mysqli_real_escape_string($this->db->conn, $editid);
            if(empty($brandName)){
                $msg = "<span class='error'>Brand field must not be empty !</span>";
                return $msg;
            }else{
                $sql = "UPDATE tb_brand SET brandName='$brandName' WHERE brandId='$editid'";
                $brandUp = $this->db->update($sql);
                if ($brandUp) {
                    $msg = "<span class='success'>Brand Updated Successfully</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Brand not Updated !</span>";
                return $msg;
                }
            }
        }
    }
?>