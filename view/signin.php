<!DOCTYPE html>

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

                <li class="nav-item" id="logout"> <a href="signup">signup</a> </li>

            </ul>
        </nav>
    </header> -->

    <!-- <div class="form card" style="width: 18rem;">
        <form class="form-pos">


            <input  placeholder="email" id="email" class="form-data" name="email"  />
            <label class="validator_error" id = "error_email" for="form9" data-error="E-mail address seems to be invalid" >Invalid Email Adress</label>
            
            <input type="password" placeholder="password" class="form-data" id="password" name="password" />
            <label class="validator_error" id = "error_password" for="form9" data-error="E-mail address seems to be invalid" >Invalid Password</label> <br>
            
            <input type="submit" value="SignIn" id="signin_btn" class="submit">
         
        </form>
    </div> -->


    <div class="signup-form form-pos">
        <form id="login_form">
            <h2>Login</h2>
            <p>Please fill in this form to Login!</p>
            <hr>
            
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" ><i class="fa fa-paper-plane"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                        required="required" id="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span onclick="show_password(this)" class="input-group-addon" data-toggle="tooltip" title="Show Password"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        required="required" id="password">
                </div>
            </div>

          
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" id="signup_btn">Login</button>
            </div>
        </form>
        <div class="text-center">Not registered? <a href="signup">Register here</a></div>
    </div>














</body>
<script type="text/javascript" src="../javascript/login.js"></script>

</html>