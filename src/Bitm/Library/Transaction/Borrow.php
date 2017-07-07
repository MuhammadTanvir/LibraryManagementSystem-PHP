<?php
namespace App\Bitm\Library\Transaction;

use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

class Borrow{

    public $borrow_id = " ";
    public $student_id = " ";
    public $book_id = " ";
    public $date_borrow = " ";
    public $date_due = " ";
    public $conn;

    public function prepare($data = array())
    {
        if (array_key_exists("borrow_id", $data)) {
            $this->borrow_id = $data['borrow_id'];
        }
        if (array_key_exists("student_id", $data)) {
            $this->student_id = $data['student_id'];
        }
        if (array_key_exists("book_id", $data)) {
            $this->book_id = $data['book_id'];
        }
        if (array_key_exists("date_borrow", $data)) {
            $this->date_borrow = $data['date_borrow'];
        }
        if (array_key_exists("date_due", $data)) {
            $this->date_due = $data['date_due'];
        }
        return $this;

    }
    public function __construct(){
        $this->conn= mysqli_connect("localhost","root","","library") or die("Database connection establish failed");
    }
    public function store()
    {
        $query = "INSERT INTO `library`.`borrow` (`student_id`, `book_id`, `book_title`, `date_borrow`, `date_due`) VALUES ('{$this->student_id}','{$this->book_id}', '{$this->book_title}', '{$this->date_borrow}', '{$this->date_due}')";
        echo $query;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.
</div>");
            Utility::redirect('index.php');

        } else {
            Message::message("<div class=\"alert alert-info\">
  <strong>Error!</strong> Data has been stored successfully.
</div>");
            Utility::redirect('index.php');

        }
    }

    public  function index(){
        $_allItem=array();

        $query = "select * from borrow
                                LEFT JOIN book ON borrow.book_id = book.book_id
								LEFT JOIN book ON borrow.book_title = book.book_title
								LEFT JOIN book ON borrow.author = book.author
								LEFT JOIN book on borrow.catagory =  book.catagory
								ORDER BY borrow.borrow_id
								  ";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allItem[]=$row;
        }
        return $_allItem;
    }

    public function view(){
        $query="SELECT * FROM `student` INNER JOIN `borrow` ON `student`.`student_id`=`borrow`.`student_id`";
        // echo $query;
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_object($result);
        return $row;
    }





}