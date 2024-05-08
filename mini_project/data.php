<?php

include("db.php");
$msg;

class data extends db{
    private $book_name;
    private $author;
    private $branch;
    private $quantity;
    private $bookrent;
    function __construct(){
    }
    function studentlogin($t1,$t2){
        $q="SELECT * FROM student where student_id='$t1' and student_password='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if($result>0){
            foreach($recordSet->fetchAll() as $row){
                $sloginid=$row['student_id'];
            }
            header("Location:student.php");
        }
        elseif($result<=0){
            header("Location:index.php?msg=Invalid Details");
        }
    }  
    function adminlogin($t1,$t2){
        $q="SELECT * FROM admin where admin_id='$t1' and admin_password='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if($result>0){
            foreach($recordSet->fetchAll() as $row){
                $sloginid=$row['admin_id'];
                

            }
            header("Location:admin.php");
        }
        elseif($result<=0){
            header("Location:index.php?msg=Invalid Details");
        }
    } 
    function addbook($book_name,$author,$branch,$quantity,$book_available,$Rack,$Sub_Rack){
        $this->book_name=$book_name;
        $this->author=$author;
        $this->branch=$branch;
        $this->quantity=$quantity;
        $this->book_available=$book_available;
        $this->Rack=$Rack;
        $this->Sub_Rack=$Sub_Rack;
        
        $q="INSERT INTO book (book_id, book_name, author, branch, quantity,book_available,Rack,Sub_Rack,bookrent)VALUES('','$book_name','$author','$branch','$quantity','$book_available','$Rack','$Sub_Rack',0)";    

        if($this->connection->exec($q)) {
            header("Location:admin.php?msg=done");
        }

        else {
            header("Location:admin.php?msg=fail");
        }


    } 
    function bookreport(){
        $q="SELECT * FROM book";
        $data=$this->connection->query($q);
        return $data;

    }
    function getbooktoissue(){
        $q="SELECT * FROM book where book_available !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }
    function studentrecord(){
        $q="SELECT * FROM student";
        $data=$this->connection->query($q);
        return $data;

    }
    function userdetail($id){
        $q="SELECT * FROM student where student_id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }
    function issuebook($book_name,$student_name,$issue_date,$issue_days,$return_date){
    $this->book_name=$book_name;
    $this->student_name=$student_name;
    $this->issue_date=$issue_date;
    $this->issue_days=$issue_days;
    $this->return_date=$return_date;
    $this->branch=$branch;


    $q="SELECT * FROM book where book_name='$book_name'";
    $recordSetss=$this->connection->query($q);

    $q="SELECT * FROM student where student_name='$student_name'";
    $recordSet=$this->connection->query($q);
    $result=$recordSet->rowCount();

    if ($result > 0) {

        foreach($recordSet->fetchAll() as $row) {
            $issue_id=$row['issue_id'];
            $branch=$row['branch'];
        }
        foreach($recordSetss->fetchAll() as $row) {
            $book_id=$row['book_id'];
            $book_name=$row['book_name'];
            $branch=$row['branch'];

            $book_available=$row['book_available']-1;
            $bookrent=$row['bookrent']+1;
        }

    
        $q="UPDATE book SET book_available='$book_available', bookrent='$bookrent' where book_id='$book_id'";
        if($this->connection->exec($q)){

        $q="INSERT INTO issuebook (issue_id,student_name,issue_book_name,branch,issue_days,issue_date,return_date,fine)VALUES('$issue_id','$student_name','$book_name','$branch','$issue_days','$issue_date','$return_date','0')";

        if($this->connection->exec($q)) {
            header("Location:admin.php?msg=done");
        }

        else {
            header("Location:admin.php?msg=fail");
        }
        }
        else{
           header("Location:admin.php?msg=fail");
        }


    }

    else {
        header("location: index.php?msg=Invalid Credentials");
    }


}
function issuereport(){
    $q="SELECT * FROM issuebook";
    $data=$this->connection->query($q);
    return $data;
}

function returnBook($book_name, $student_name) {
    $q = "SELECT * FROM issuebook WHERE issue_book_name='$book_name' AND student_name='$student_name'";
    $recordSet = $this->connection->query($q);
    $result = $recordSet->rowCount();
    
    if ($result > 0) {
        $processedBooks = array();

        foreach ($recordSet->fetchAll() as $row) {
            $issue_id = $row['issue_id'];

            // Check if this book has already been processed
            if (!in_array($row['issue_book_name'], $processedBooks)) {
                $processedBooks[] = $row['issue_book_name'];

                $q = "DELETE FROM issuebook WHERE issue_id='$issue_id'";
                if ($this->connection->exec($q)) {
                    $q = "SELECT * FROM book WHERE book_name='$book_name'";
                    $recordSetss = $this->connection->query($q);

                    foreach ($recordSetss->fetchAll() as $row) {
                        $book_id = $row['book_id'];
                        $book_available = $row['book_available'] + 1;
                        $bookrent = $row['bookrent'] - 1;
                    }

                    $q = "UPDATE book SET book_available='$book_available', bookrent='$bookrent' WHERE book_id='$book_id'";
                    if ($this->connection->exec($q)) {
                        // Delete the row from issuebook after successful return
                        header("Location:admin.php?msg=book_returned_and_deleted");
                    } else {
                        header("Location:admin.php?msg=fail");
                    }
                } else {
                    header("Location:admin.php?msg=fail");
                }
            }
        }
    } else {
        header("Location:admin.php?msg=book_not_found");
    }
}
function getissuebook($student_name) {

    $newfine="";
    $return_date="";

    $q="SELECT * FROM issuebook where student_name='$student_name'";
    $recordSetss=$this->connection->query($q);


    foreach($recordSetss->fetchAll() as $row) {
        $return_date=$row['return_date'];
        $fine=$row['fine'];
        $newfine= $fine;     
    }
    $issue_date= date("d/m/Y");
    if($return_date<$issue_date){
        $q="UPDATE issuebook SET fine='$newfine' where student_name='$student_name'";

        if($this->connection->exec($q)) {
            $q="SELECT * FROM issuebook where student_name='$student_name' ";
            $data=$this->connection->query($q);
            return $data;
        }
        else{
            $q="SELECT * FROM issuebook where student_name='$student_name' ";
            $data=$this->connection->query($q);
            return $data;  
        }

    }
    else{
        $q="SELECT * FROM issuebook where student_name='$student_name'";
        $data=$this->connection->query($q);
        return $data;

    }






}
function feedback($feedback){
    $this->feedback=$feedback;
    $q="INSERT INTO feedback (feedback)VALUES('$feedback')";    

        if($this->connection->exec($q)) {
            header("Location:student.php?msg=done");
        }

        else {
            header("Location:student.php?msg=fail");
        }
}


}