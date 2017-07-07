<?php
namespace App\Bitm\Library\Book;

use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

Class Book{
    public $book_id="";
    public $book_title="";
    public $category_id="";
    public $author="";
    public $book_copies="";
    public $book_pub="";
    public $publisher_name="";
    public $isbn="";
    public $copyright_year="";
    public $date_added="";
    public $filterByTitle="";
    public $filterByAuthor="";
    public $search="";
    public $conn;

    public function prepare($data="")
    {
        if (array_key_exists("search", $data)) {
            $this->search = $data['search'];
        }
//        if (array_key_exists("status", $data)) {
//            $this->status = $data['status'];
//        }
        if (array_key_exists("date_added", $data)) {
            $this->date_added = $data['date_added'];
        }
        if (array_key_exists("copyright_year", $data)) {
            $this->copyright_year = $data['copyright_year'];
        }
        if (array_key_exists("isbn", $data)) {
            $this->isbn = $data['isbn'];
        }
        if (array_key_exists("publisher_name", $data)) {
            $this->publisher_name = $data['publisher_name'];
        }
        if (array_key_exists("book_pub", $data)) {
            $this->book_pub = $data['book_pub'];
        }
        if (array_key_exists("book_copies", $data)) {
            $this->book_copies = $data['book_copies'];
        }
        if (array_key_exists("author", $data)) {
            $this->author = $data['author'];
        }
        if (array_key_exists("category_id", $data)) {
            $this->category_id = $data['category_id'];
        }
        if (array_key_exists("book_title", $data)) {
            $this->book_title = $data['book_title'];
        }
        if (array_key_exists("filterByTitle", $data)) {
            $this->filterByTitle = $data['filterByTitle'];
        }
        if (array_key_exists("filterByAuthor", $data)) {
            $this->filterByDescription = $data['filterByAuthor'];
        }
        if (array_key_exists("book_id", $data)) {
            $this->book_id = $data['book_id'];
        }
        return $this;
    }


    public function __construct(){
        $this->conn= mysqli_connect("localhost","root","","library") or die("Database connection establish failed");
    }


    public function store(){
        $date = str_replace("/","-",$this->date_added);
        $newDate = date("Y-m-d", strtotime($date));

        $query="INSERT INTO `library`.`book` (`book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`,`isbn`, `copyright_year`,`date_added`) VALUES ('".$this->book_title."','".$this->category_id."','".$this->author."','".$this->book_copies."','".$this->book_pub."','".$this->publisher_name."','".$this->isbn."','".$this->copyright_year."','".$newDate."')";

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
        $_allBook=array();

        $whereClause= " 1=1 ";

        if(!empty($this->filterByTitle)) {
            $whereClause .= " AND book_title LIKE '%".$this->filterByTitle."%'";
        }
        if(!empty($this->filterByAuthor)) {
            $whereClause .= " AND author LIKE '%".$this->filterByAuthor."%'";
        }
        if(!empty($this->search)){
            $whereClause .= " AND author LIKE '%".$this->search."%' OR  book_title LIKE '%".$this->search."%'";
        }
        $query= "SELECT * FROM `book` WHERE ".$whereClause;
//echo $query;
        $result= mysqli_query($this->conn,$query);

        while($row=mysqli_fetch_object($result)){
            $_allBook[]=$row;
        }
        return $_allBook;
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

}