<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script> -->
    <script src="../javascript/global.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

</head>

<body>

    <!-- <header class="main-header">

        

        <nav class="main-nav">

            <ul class="nav-items" id="items">

              


            </ul>


        </nav>

    </header> -->


    <!-- <div class="form">
    
    <form class="form-pos">
    
    <input type="text" placeholder="username" id = "name" class="form-data" required />
    <input type="email" placeholder="email" id = "email" class="form-data" required />
    <input type="password" placeholder="password" class="form-data" id="password" required />
  
    <button name="btn" id="signup_btn" class="submit">SignUp</button>
    <button type="button" name="btn" id="signup_btn" class="submit" onclick="location.href='index'">Login</button>

    </form>
    
    </div> -->





    <div class="signup-form form-pos">
        <form id="signup_form">
            <h2>Sign UP</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Username" required="required"
                        id="name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                        required="required" id="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        required="required" id="password">
                </div>
            </div>

            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a
                        href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" id="signup_btn">Sign Up</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="signin.php">Login here</a></div>
    </div>




</body>
<script type="application/javascript" src="../javascript/signup.js"></script>

</html>