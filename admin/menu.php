<nav class="navbar navbar-primary container justify-content-cenetr p-1 navbar-expand-lg mt-3 ">
	<div class="container viral-card   ">
	
		<a class="navbar-brand p-3" href="#"> Saustudy </a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item toggle">
					<a class="nav-link  " href="index.php">Home</a>
					
				</li>
				<li class="nav-item">
					<a class="nav-link " href="users.php">Users</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link " href="courses.php">Courses</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link " href="semesters.php">Semesters</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link " href="subjects.php">Subjects</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link " href="category.php">category</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link " href="chapters.php">chapters</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link " href="topics.php">topics</a>
				</li>
				<li class="nav-item dark  ">
				<h4 id=" " class="m-1 "><i class="sun-moon bi bi-sun"></i></h4>
				</li>
			</ul>
			<form class="d-flex">
			<a class="nav-link text-dark" href="logout.php">Hi, <?php echo ucwords($_SESSION['USERNAME']); ?> <span class="btn viral-card text-danger">Logout</span></a>
			</form>
		</div>
	</div>
</nav>