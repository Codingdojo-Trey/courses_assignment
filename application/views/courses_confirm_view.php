<html>
<head>
	<title></title>
</head>
<body>
	<h1>Are you sure you want to delete this course??</h1>
	<h2>Name: <?= $course['name']; ?></h2>
	<h3>Description: <?= $course['description']; ?></h3>
	<a href='/courses/index'><button>NO</button></a>
	<a href="/courses/delete/<?= $course['id']; ?>"><button>YES</button></a>
</body>
</html>