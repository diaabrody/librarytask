<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>

<?php

 $Books=new Books($conn);
 $user_id=current_user()->id;
 $rows=$Books->getUserBooks($user_id);
 
?>

<link rel="stylesheet" type="text/css" href="vendor/datatables/css/dataTables.bootstrap4.min.css">

<div class="container">

	<div class="table-responsive">
	<table class="table table-bordered table-striped" id="book-data">
		<thead>
			<tr>
				<th>Book Name</th>
				<th>Author Name</th>
				<th>Category</th>
				<th>ISBN</th>
				<th>Start Date</th>
				<th>End Date</th>
					
			</tr>

		</thead>

		<tbody>
	<?php foreach ( $rows as $book):  ?>

		<?php 

		$start_date = strtotime($book->getBorrowedOn());
		$end_date= strtotime("+7 day", $start_date);
		
        // the time in format Y-m-d
        $end_date=date("Y-m-d",$end_date);



		?>

			<tr>

				<td><?php echo $book->getName()?></td>
				<td><?php echo $book->getAuthorName()?></td>
				<td><?php echo $book->getCatgoryName()?></td>
				<td><?php echo $book->getISBN()?></td>
				<td><?php echo $book->getBorrowedOn()?></td>
				<td><?php echo $end_date ?></td>
					
			</tr>

	 <?php endforeach;?>		


		</tbody>
		

	</table>
</div>


</div>
 <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="vendor/datatables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script src="public/js/datatables.js" type="text/javascript"></script>