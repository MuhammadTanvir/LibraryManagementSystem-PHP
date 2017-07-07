<?php
namespace App\Bitm\Library\Issue;

use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;


class Issue{
    public $issue_id="";
    public $student_id="";
    public $book_id="";
    public $due_date="";
    public $issue_date="";
    public $filterByStudent="";
    public $conn;


    public function prepare($data="")
    {
        if (array_key_exists("student_id", $data)) {
            $this->student_id = $data['student_id'];
        }

        if (array_key_exists("book_id", $data)) {
            $this->book_id = $data['book_id'];
        }
        if (array_key_exists("due_date", $data)) {
            $this->due_date = $data['due_date'];
        }
        if (array_key_exists("issue_date", $data)) {
            $this->issue_date = $data['issue_date'];
        }
        if (array_key_exists("filterByStudent", $data)) {
            $this->filterByStudent = $data['filterByStudent'];
        }
        if (array_key_exists("id", $data)) {
            $this->issue_id = $data['id'];
        }
        return $this;
    }


    public function __construct(){
        $this->conn= mysqli_connect("localhost","root","","library") or die("Database connection establish failed");
    }


    public function store(){

        $query="INSERT INTO `library`.`issue` (`student_id`, `book_id`, `due_date`, `issue_date`) VALUES ('".$this->student_id."', '".$this->book_id."', '".$this->due_date."', '".$this->issue_date."')";

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
        $_allIssue=array();

        $whereClause= " 1=1 ";

        if(!empty($this->filterByStudent)) {
           $whereClause .= " AND student_id LIKE '%".$this->filterByStudent."%'";
        }
//        if(!empty($this->filterByAuthor)) {
//            $whereClause .= " AND author LIKE '%".$this->filterByAuthor."%'";
//        }
//        if(!empty($this->search)){
//            $whereClause .= " AND author LIKE '%".$this->search."%' OR  book_title LIKE '%".$this->search."%'";
//        }
        $query= "SELECT * FROM `issue` WHERE ".$whereClause;

        //"SELECT b.book_id,b.book_title,c.category,b.author,b.book_copies,b.book_pub,b.publisher_name,b.isbn,b.copyright_year,b.date_added FROM `book` AS b LEFT JOIN `category` AS c ON c.category_id=b.category_id "
        //
        $result= mysqli_query($this->conn,$query);

        while($row=mysqli_fetch_object($result)){
            $_allIssue[]=$row;
        }
        return $_allIssue;
    }


    public function delete()
    {
        $query = "DELETE FROM `issue` WHERE `issue`.`issue_id` = ".$this->issue_id;
        //"DELETE FROM `issue` WHERE `issue`.`issue_id` = 4"
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Book Has Been Returned Successfully.
</div>");
            Utility::redirect('index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Book Has Not Been Returned Successfully.
</div>");
            Utility::redirect('index.php');


        }
    }


    public function studentID() {
        $_allStudent = array();
        $query = "SELECT `student_id` FROM `issue`";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $_allStudent[] = $row['student_id'];
        }
        return $_allStudent;
    }


    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `issue`";
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }


    public function paginator($pageStartFrom=0,$Limit=5){
        $_allIssue=array();
        $query="SELECT * FROM `issue` LIMIT ".$pageStartFrom.",".$Limit;
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allIssue[]=$row;
        }
        return $_allIssue;

    }

}
?>