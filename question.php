<?php include 'database.php'; ?>
<?php 
	// Set quesiton number
	$number = (int) $_GET['n'];
	
	/*
	 * Get Question
	 */
	$query = "SELECT * FROM `questions` WHERE `question_number` = $number";
	
	// Get result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$result_row = $result->fetch_assoc();
	
	/*
	 * Get Choices
	*/
	$choice_query = "SELECT * FROM `choices` WHERE `question_number` = $number";
	
	// Get results
	$choices = $mysqli->query($choice_query) or die($mysqli->error.__LINE__);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Question <?php echo $number ?> of 5</div>
			<p class="question">
				<?php echo $result_row['text'] ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<?php while ($choice_row = $choices->fetch_assoc()) : ?>
					<li><input name="choice" type="radio" value="<?php echo $choice_row['id'] ?>" /><?php echo $choice_row['text']?></li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" value="submit" />
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2015, PHP Quizzer
		</div>
	</footer>
</body>
</html>
