<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Basic Company Template for Bootstrap 3</title>

    <!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/css/home_custom.css" rel="stylesheet">

    <!-- Custom CSS for the 'Business Frontpage' Template -->
    <link href="css/business-frontpage.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#about">About</a>
                    </li>
                    <li><a href="#services">Services</a>
                    </li>
                    <li><a href="#contact">Contact</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                	<a href='<?php echo base_url(); ?>login' class='btn btn-primary btn-success navbar-btn navbar-right'>Sign in</a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="business-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <!-- The background image is set in the custom CSS -->
                    <h1 class="tagline">Car Rental Management System</h1>
                </div>
                <div class="col-lg-4">
					<button>Submit</button>

                </div>
            </div>

        </div>

    </div>

    <div class="container">

        <hr>

        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <h2>What We Do</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel pellentesque quam. Ut dictum eu risus nec volutpat. Sed vitae dui lacus. Duis sed bibendum lorem. Morbi tempor elementum justo in tristique. Fusce sit amet lacus sed lacus tincidunt interdum. Curabitur tincidunt dolor nulla, a scelerisque orci tempor a. Duis eu quam bibendum, elementum turpis sit amet, blandit nibh. Sed et rhoncus tellus, sit amet dignissim mauris. Nunc suscipit tortor sed lobortis facilisis. Pellentesque risus metus, iaculis vitae justo nec, imperdiet aliquam libero. Duis tincidunt orci in feugiat scelerisque</p>
                <p><a class="btn btn-default btn-large" href="#">Call to action &raquo;</a>
                </p>
            </div>
            <div class="col-lg-4 col-sm-4">
                <h2>Contact Us</h2>
                <address>
                    <strong>Twitter, Inc.</strong>
                    <br>795 Folsom Ave, Suite 600
                    <br>San Francisco, CA 94107
                    <br>
                </address>
                <address>
                    <abbr title="Phone">P:</abbr>(123) 456-7890
                    <br>
                    <abbr title="Email">E:</abbr> <a href="mailto:#">first.last@example.com</a>
                </address>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-4">
                <img class="img-circle img-responsive text-center" src="http://placehold.it/300x300">
                <h2>Marketing Box #1</h2>
                <p>These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive" src="http://placehold.it/300x300">
                <h2>Marketing Box #2</h2>
                <p>The images are set to be circular and responsive. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive" src="http://placehold.it/300x300">
                <h2>Marketing Box #3</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            </div>
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /container -->


    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
