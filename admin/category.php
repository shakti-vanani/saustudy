<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Login</title>
    <?php include 'css.php'; ?>
</head>
<body>     
    <?php include 'menu.php'; ?>
    
    <div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Semesters</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">
                                    Semesters
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
                <div class="row xs-pd-10-10 pd-ltr-20 mb-10 ">
                <div class="col-md-12 col-sm-12 card-box">
                <form>
                <div class="form-group row pd-10">
		<label class="col-sm-12 col-md-2 col-form-label"><div class="title">
								<h4>Course Select</h4>
							</div></label></label>
		<div class="col-sm-12 col-md-8">
			<select class="custom-select col-12">
				<option selected="">Choose...</option>
				<option value="1">BA</option>
				<option value="2">Bcom</option>
				<option value="3">Three</option>
			</select>
		</div>
	</div>
    <div class="form-group row pd-10">
		<label class="col-sm-12 col-md-2 col-form-label"><div class="title">
								<h4>Semester Select</h4>
							</div></label></label>
		<div class="col-sm-12 col-md-8">
			<select class="custom-select col-12">
				<option selected="">Choose...</option>
				<option value="1">Semester 1</option>
				<option value="2">Semester 2</option>
				<option value="3">Semester 3</option>
			</select>
		</div>
	</div>
                <div class="form-group row pd-10">
                    
                <label class="col-sm-12 col-md-2 col-form-label">
                    <div class="title">
								<h4>Category Name</h4>
							</div></label>
                <div class="col-sm-12 col-md-8">
                    <input class="form-control" type="text" placeholder="Add New Category">
                </div>
                <div class="col-sm-12 col-md-2">
                  <button type="submit" name="submit" class="btn btn-success">submit</button>
                </div>
            </div>
                </form>
                </div>                       
				</div>
				<div class="row xs-pd-20-10 pd-ltr-20 mb-20">
                <div class="col-md-12 col-sm-12   card-box">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Courses</th>
                        <th scope="col">Semesters</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>BA</td>
                        <td>Semesters 1</td>
                        <td>Book</td>
                        <td>
                            <a href="" class="text-primary">
                            <span class="micon fa fa-edit">   Edit</span>
                            </a>   |   <a href="" class="text-danger"><span class="micon ion-trash-a">   Delete</span></a>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">1</th>
                        <td>BA</td>
                        <td>Semesters 1</td>
                        <td>Syllabus</td>
                        <td>
                            <a href="" class="text-primary">
                            <span class="micon fa fa-edit">   Edit</span>
                            </a>   |   <a href="" class="text-danger"><span class="micon ion-trash-a">   Delete</span></a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
</div>                       
				</div>
				
				<div class="footer-wrap pd-20 mb-20 card-box">
					Saustudy Project By:[1] Shakti Vanani [2] Viral Parmar
					<a href="https://github.com/shakti-vanani" target="_blank"
						>Shakti Vanani</a
					>
				</div>
			</div>
		</div>

    <?php include 'js.php'; ?>
</body>
</html>