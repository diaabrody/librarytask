<?php


class Categories extends BaseEntity
{

	public $conn ;
   
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

   public function  getCategories()
   {

        $query = "SELECT * FROM categories";
        $result = $this->conn->query($query);
        $output=array();
      if($result->num_rows >0)
      {

	     	while($row=$result->fetch_assoc())
		      {

    	       $output[] = new Category($this->conn , $row);

		      }


      }

      	// outputs now is array of object from type Book
      return $output;


   }


}
