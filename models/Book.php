<?php



class Book extends BaseEntity
{
	public $id ;
    public $name ;
    public $iSBN;
    public $image;
    public $publicationDate;
    public $catgoryId;
    public $authorId;
    public $catgoryName;
    public $authorName;
    public $isAvailable;
    public $userId;
    public $borrowedOn;
	
	function __construct($conn , $bookArray=false)
	{
		$this->conn=$conn ;
        if($bookArray)
        {

        $this->id=$bookArray['id'];
        $this->name=$bookArray['name'];
        $this->iSBN=$bookArray['ISBN'];
        $this->image=$bookArray['image'];
        $this->publicationDate=$bookArray['Publication_date'];
        $this->catgoryId=$bookArray['catgory_id'];
        $this->authorId=$bookArray['author_id'];
        $this->catgoryName=$bookArray['catgory_name'];
        $this->authorName=$bookArray['author_name'];
        $this->isAvailable=$bookArray['is_available'];
        $this->userId=$bookArray['user_id'];
        $this->borrowedOn=$bookArray['borrowed_on'];
        
        }

	
	}




    function borrowBook($id)
    {

        $id=(int)$id;
        $date_today=date("Y-m-d");
        $date = strtotime($date_today);
        //get current user id 
        $user_id=current_user()->id;
        $query  = "UPDATE books SET borrowed_on= '{$date_today}'";
        $query .= ", is_available=1 "; 
        $query .= " , user_id = '{$user_id}'  where id = '{$id}'";
     

        mysqli_query($this->conn, $query);
       


    }








}

















?>