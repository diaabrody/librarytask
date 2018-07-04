<?php


class Category extends BaseEntity
{

	public $id ;
    public $name ;

    function __construct($conn , $categoryArray)
	{
		$this->conn=$conn ;
        if($categoryArray)
        {

        $this->id=$categoryArray['id'];
        $this->name=$categoryArray['name'];
 
        
        }

	
	}


}