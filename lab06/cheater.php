<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
			# Ex 4 : 
			# Check the existence of each parameter using the PHP function 'isset'.
			# Check the blankness of an element in $_POST by comparing it to the empty string.
			# (can also use the element itself as a Boolean test!)
			$name = $_POST["name"];
			$id = $_POST["id"];
			$courses = processCheckbox($_POST["courses"]);
			$grade = $_POST["grade"];
			$cardnumber = $_POST["creditcard"];
			$cardtype = $_POST["cc"];

			if (!isset($name) || !isset($id) || !isset($courses) || !isset($grade) || !isset($cardnumber) || !isset($cardtype)) {
		?>

		<!-- Ex 4 : 
			Display the below error message :
		-->
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), or a single white space.
			} elseif (!preg_match("/^[a-zA-Z]+(([ -])?[a-zA-Z])*$/", $name)) {
		?>

		<!-- Ex 5 : 
			Display the below error message :
		-->
		<h1>Sorry</h1>
		<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
			} elseif (strlen($cardnumber) !== 16 || $cardtype == 'Visa' && $cardnumber[0] !== '4' || $cardtype == 'MasterCard' && $cardnumber[0] !== '5') {
		?>

		<!-- Ex 5 : 
			Display the below error message :
		-->
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

		<?php
			# if all the validation and check are passed 
			} else {
						
			// Checkbox 값 넘어오는것 확인
			/*
			if (isset($_POST["courses"]))
			{
				print_r($_POST["courses"]);
			}
			*/
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<ul> 
			<li>Name: <?= $name ?></li>
			<li>ID: <?= $id ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= $courses ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit Card: <?= $cardnumber ?> (<?= $cardtype ?>)</li>
		</ul>
		
		<!-- Ex 3 : 
			<p>Here are all the loosers who have submitted here:</p> -->
		<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			$input_txt = "$name;$id;$cardnumber;$cardtype"."\n";
			file_put_contents($filename, $input_txt, FILE_APPEND);
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
		<pre><?= file_get_contents($filename) ?></pre>
		<?php } ?>
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names)
			{
				$list = implode(", ", $names);
				return $list;
			}
		?>
	</body>
</html>