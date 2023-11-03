<?php
	#1. connect to database
	include('config/db_connect.php');

	/**** <--  Delete a Single Record --> ****/
	if(isset($_POST['delete'])){
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			// form is deleted successfully
			header('Location: index.php');
		} else {
			// Failed
			echo 'query error: ' . mysqli_connect_error($conn);
		}
	}

	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM pizzas WHERE id = $id";

		$result = mysqli_query($conn, $sql);

		$pizza = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
	}

?>

<!Doctype html>
<html>
	<?php include('templates/header.php'); ?>

	<h2>Details</h2>

	<div class="container center">

		<?php if($pizza): ?>

			<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
			<p>Created by: <?php echo htmlspecialchars($pizza['email']) ; ?></p>
			<p><?php echo date($pizza['created_at']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

			<!-- ********** Delete Form(2) ********** -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0"> 
			</form>


		<?php else: ?>
			<h4>No such pizza</h4>
		<?php endif; ?>
	</div>


	<?php include('templates/footer.php'); ?>



</html>