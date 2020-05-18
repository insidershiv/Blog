<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/style2.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="../javascript/global.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.rawgit.com/download/memorystorage/0.11.0/dist/memorystorage.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>


    <!-- <header class="main-header">



        <nav class="main-nav">

            <ul class="nav-items" id="items">

                <li class="nav-item" id="logout"> <a href="#">Logout</a> </li>


            </ul>
        </nav>
    </header> -->


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a href="userprofile" class="navbar-brand"> Home </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarmenu">


            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="userprofile" class="nav-link" id="dp_name"> </a>
                </li>
                <li class="nav-item" id="post">
					<a href="post" class="nav-link"> Create-post</a>
				</li>

            </ul>

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="#" id="logout" class="nav-link"> Log out</a>
                </li>

            </ul>

        </div>

        </div>

    </nav>



   
<div class="d-flex justify-content-center align-content-stretch flex-wrap " id="post-feed">

</div>















</body>

<script src="../javascript/viewpost.js"></script>

</html>