<?php
namespace App\Bitm\Library\Category;

use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;


Class Category{
    public $category_id="";
    public $category="";
    public $conn;

    public function prepare($data="")
    {
        if (array_key_exists("category", $data)) {
            $this->category = $data['category'];
        }
        if (array_key_exists("category_id", $data)) {
            $this->category_id = $data['category_id'];
        }
        return $this;
    }


    public function __construct(){
        $this->conn= mysqli_connect("localhost","root","","library") or die("Database connection establish failed");
    }


    public function store(){
        $query="INSERT INTO `category` (`category`) VALUES ('".$this->category."')";

        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.</div>");
            Utility::redirect('index.php');
        }
        else {
            Message::message("<div class=\"alert alert-info\">
  <strong>Error!</strong> Data has been stored successfully.
</div>");
            Utility::redirect('index.php');
        }
    }



    public  function index(){
        $_allCategory=array();

//        $whereClause= " 1=1 ";

//        if(!empty($this->filterByTitle)) {
//            $whereClause .= " AND book_title LIKE '%".$this->filterByTitle."%'";
//        }
//        if(!empty($this->filterByAuthor)) {
//            $whereClause .= " AND author LIKE '%".$this->filterByAuthor."%'";
//        }
//        if(!empty($this->search)){
//            $whereClause .= " AND author LIKE '%".$this->search."%' OR  book_title LIKE '%".$this->search."%'";
//        }
        $query= "SELECT * FROM `category`";
//echo $query;
        $result= mysqli_query($this->conn,$query);

        while($row=mysqli_fetch_object($result)){
            $_allCategory[]=$row;
        }
        return $_allCategory;
    }


    public function view(){
        $query="SELECT * FROM `book` WHERE `book_id`=".$this->book_id;
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_object($result);
        return $row;
    }


    public function update(){
        $date = str_replace("/","-",$this->date_added);
        $newDate = date("Y-m-d", strtotime($date));

        $query="UPDATE `library`.`book` SET `book_title` = '".$this->book_title."', `category` = '".$this->category."', `author` = '".$this->author."', `book_copies` = '".$this->book_copies."', `book_pub` = '".$this->book_pub."', `publisher_name` = '".$this->publisher_name."', `isbn` = '".$this->isbn."', `copyright_year` = '".$this->copyright_year."', `date_added` = '".$newDate."' WHERE `book`.`book_id` =".$this->book_id;

        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been updated successfully.
</div>");
            Utility::redirect('index.php');

        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been updated successfully.
</div>");
            Utility::redirect('index.php');

        }

    }
//
    public function delete()
    {
        $query = "DELETE FROM `library`.`book` WHERE `book`.`book_id` =" . $this->book_id;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been deleted successfully.
</div>");
            Utility::redirect('index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been deleted successfully.
</div>");
            Utility::redirect('index.php');


        }
    }
//
//
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `book`";
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
//
    public function paginator($pageStartFrom=0,$Limit=5){
        $_allBook=array();
        $query="SELECT * FROM `book` LIMIT ".$pageStartFrom.",".$Limit;
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allBook[]=$row;
        }
        return $_allBook;

    }


    public function title() {
        $_allBook = array();
        $query = "SELECT `book_title` FROM `book`";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $_allBook[] = $row['book_title'];
        }
        return $_allBook;
    }


    public function author(){
        $_allBook = array();
        $query = "SELECT `author` FROM `book`";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $_allBook[] = $row['author'];
        }
        return $_allBook;
    }
//
//
//
//
//
//
//
}