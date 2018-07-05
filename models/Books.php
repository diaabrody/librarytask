<?php


class Books extends BaseEntity
{

	public $conn ;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    // get all books or get book by id or get all books related to category

    // return an array in all cases
    
    public function  getBooks($id=false)
    {
        if(!$id)
        {
            if(isset($_GET['cateid'])&&$_GET['cateid'])
            {
                $category_id=$_GET['cateid'];
                $query = "SELECT * FROM books where catgory_id = '{$category_id}'";

            }

            else
            {

                 $query = "SELECT * FROM books";
            }

             

        }

        else
        {

            $query = "SELECT * FROM books WHERE id = '{$id}'";

        }
      
        $result = $this->conn->query($query);
        $output=array();


        if($result->num_rows >0)
        {

	     	while($row=$result->fetch_assoc())
		     {
                $cateId=$row['catgory_id'];
                $authorId=$row['author_id'];
                $row['catgory_name']=$this->getCategoryName($cateId);
                $row['author_name']=$this->getAtherName($authorId);
    	        $output[] = new Book($this->conn , $row);

		     }


        }

      	// outputs now is array of object from type Book
      return $output;


    }



// get author name by id
// return value
    private function getAtherName($id)
    {   


        $query = "SELECT * FROM authors WHERE id= {$id}";
        $result = $this->conn->query($query);
        $row= $result->fetch_assoc();
        $authorName=$row['name'];
        
        return $authorName;

    }

// get category name by id
// return value    

    private function getCategoryName($id)
    {

      $query = "SELECT * FROM categories WHERE id= {$id}";
        $result = $this->conn->query($query);
        $row= $result->fetch_assoc();
        $categoryName=$row['name'];
        
        return $categoryName;
    
    }


    public function  getUserBooks($user_id)
    {



    $query = "SELECT * FROM books WHERE user_id = '{$user_id}'";
    $result = $this->conn->query($query);
    $output=array();

    if($result->num_rows >0)
    {
      while($row=$result->fetch_assoc())
       {
                $cateId=$row['catgory_id'];
                $authorId=$row['author_id'];
                $row['catgory_name']=$this->getCategoryName($cateId);
                $row['author_name']=$this->getAtherName($authorId);
                $output[] = new Book($this->conn , $row);
       }

    }

 return $output;
}

 


}	