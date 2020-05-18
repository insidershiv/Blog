<!DOCTYPE html>

<head>
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/style2.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="../javascript/global.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/download/memorystorage/0.11.0/dist/memorystorage.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script> -->
    <script src="../javascript/global.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

    






</head>

<body>




    <!-- <header class="main-header">

       

        <nav class="main-nav">

            <ul class="nav-items" id="items">

               
                <li class="nav-item" id="post"> <a href="post" >New Post</a> </li>
                
                <li class="nav-item" id="logout"> <a href="#">Logout</a> </li>


            </ul>
        </nav>
    </header> -->

<!-- <div class="post_items" id="user-post">

    <div class=" user_post" id="post-items">

    </div>

    m-4 pb-4 
</div> -->

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
		<a href="userprofile" class="navbar-brand" > Home </a>

		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarmenu">
			<span class="navbar-toggler-icon"></span>
			</button>

		<div class="collapse navbar-collapse" id="navbarmenu">
			
			<form class="navbar-form my-2 my-lg-2 col-sm-6  ml-auto" id="nav-search">
				<input class="form-control rounded" type="search" placeholder="Search" style="text-align: center;" aria-label="Search" >
			  </form>
			
				

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="#" class="nav-link" id="dp_name"></a>
				</li>
	
				<li class="nav-item" id="post">
					<a href="post" class="nav-link"> Create-post</a>
				</li>

				<ul class="navbar-nav ">
				<li class="nav-item">
					<a href="#"  id="logout" class="nav-link"> Log out</a>
				</li>
	
	
			</ul>
			
		
			</div>
	
		</div>

	</nav>





<div class="d-flex justify-content-center align-content-stretch flex-wrap " id="post-feed">

</div>




<!-- 
<div class="card col-md-3 m-4 pb-4 " >
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-te213#xt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>

    
      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>

        

      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>


     

       <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>


        
      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>


      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>



      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>



      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>


      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>

      <div class="card col-md-3 m-4 pb-4  ">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div>

      <div class="card col-md-3 m-4 pb-4">
		<div class="card-body">
		  <h5 class="card-title">Card title</h5>
		  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
		  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  <a href="#" class="card-link">Card link</a>
		  <a href="#" class="card-link">Another link</a>
		</div>
      </div> -->











</body>

<script src="../javascript/profile.js"></script>

</html>