<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath."/../lib/Database.php");
   include_once  ($filepath."/../helpers/Format.php");
?>
<?php
    class Category{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function catInsert($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->conn, $catName);

            if(empty($catName)){
                $msg = "<span class='error'>Category field must not be empty !</span>";
                return $msg;
            }else{
                $sql = "INSERT INTO tb_category (catName) VALUES ('$catName')";
                $catin = $this->db->insert($sql);
                if ($catin) {
                    $msg = "<span class='success'>Category Insertd Successfully</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Category not Inserted !</span>";
                return $msg;
                }
            }
        }


        public function showAllCat(){
            $sql = "SELECT * FROM tb_category ORDER BY catId DESC";
            $result = $this->db->select($sql);
            return $result;
        }
        
        public function showCatById($id){
            $sql = "SELECT * FROM tb_category WHERE catId='$id'";
            $result = $this->db->select($sql);
            return $result;
        }

        public function catUpdate($catName, $editid){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->conn, $catName);
            $editid = mysqli_real_escape_string($this->db->conn, $editid);
            if(empty($catName)){
                $msg = "<span class='error'>Category field must not be empty !</span>";
                return $msg;
            }else{
                $sql = "UPDATE tb_category SET catName='$catName' WHERE catId='$editid'";
                $catUp = $this->db->update($sql);
                if ($catUp) {
                    $msg = "<span class='success'>Category Updated Successfully</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Category not Updated !</span>";
                return $msg;
                }
            }

        }

        public function delcat($delid){
            $sql = "DELETE FROM tb_category WHERE catId='$delid'";
            $del = $this->db->delete($sql);
            if ($del) {
                $msg = "<span class='success'>Category Deleted Successfully</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Category not Deleted !</span>";
            return $msg;
            }
        }


    }
?>