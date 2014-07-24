<html>
<head>
	<title>COURSES</title>
</head>
<body>
	<h1>ADD A COURSE</h1>
	<?php 
		if($this->session->flashdata('success'))
		{
			echo "<p>{$this->session->flashdata('success')} </p>";
		}
		if($this->session->flashdata('errors'))
		{
			echo $this->session->flashdata('errors');
		}
	 ?>
	<form method='post' action='/courses/add'>
		Name: <input type='text' name='name'><br>
		Description:<textarea name='description'></textarea>
		<input type='submit' value='create a course!'>
	</form>
	<h2>Here are all of the courses!</h2>
	<table>
		<thead>
			<th>Name</th>
			<th>Description</th>
			<th>Date added</th>
			<th>Action</th>
		</thead>
		<tbody>
	<?php 
		foreach ($courses as $course)
		{
			echo "<tr>
					<td>{$course['name']}</td>
					<td>{$course['description']}</td>
					<td>{$course['created_at']}</td>
					<td><a href='/courses/confirm/{$course['id']}'>DELETE!</a></td>
				  </tr>";
		}
	?>
		</tbody>
	</table>
</body>
</html>