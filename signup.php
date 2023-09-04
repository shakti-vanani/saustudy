<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
    <?php include 'css.php'; ?>
</head>

<body>
    <?php include 'menu.php'; ?>

        <!--Page Header-->
        <section class="page_header padding-top">
        <div class="container">
            <div class="row">
            <div class="col-md-12 page-content">
                <h1>Signup</h1>
                <p>We offer the most complete house renovating services in the country</p>
                <div class="page_nav">
            <span>You are here:</span> <a href="index.html">Home</a> <span><i class="fa fa-angle-double-right"></i>Signup</span>
            </div>
            </div>
            </div>
        </div>
        </section>
        
<!--Contact Deatils -->
<section id="contact" class="padding">
  <div class="container">
    <div class="row padding-bottom">
      <div class="col-md-8 wow fadeInRight" data-wow-delay="500ms">
        <h2 class="heading heading_space">Signup Form<span class="divider-left"></span></h2>
        <form class="form-inline findus" id="contact-form" method="POST" action="main.php">
          <div class="row">
            <div class="col-md-12">
              <div id="result"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name"  name="fname" id="name" required>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="lName"  name="lfname" id="lname" required>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="username"  name="username" id="username" required>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="password"  name="password" id="password" required>
              </div>
            </div>
            
            <div class="col-md-12">
              <button class="btn_common yellow border_radius" type="submit" name="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--Contact Deatils -->
    <?php include 'footor.php'; ?>
    <?php include 'js.php'; ?>
</body>

</html>