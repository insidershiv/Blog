
var base_url = location.hostname;

function logout(event) {
    event.preventDefault();

    Cookies.remove("name", {
        sameSite: 'lax'
    });
    Cookies.remove("id", {
        sameSite: 'lax'
    });
    Cookies.remove("token", {
        sameSite: 'lax'
    });

   
    localStorage.removeItem("posts");

    document.location.href = "signin";
}


$(document).ready(function () {
    $(document).ready(function(){
        $("img").addClass("blog_image");
    });
           
$("#logout").click(logout);
});




function myFunction(x) {
    if (x.matches) { // If media query matches
     
     $("#nav-search").removeClass("col-sm-6")
     $("#nav-search").addClass("col-sm-12");
     

    } else {
        
        $("#nav-search").removeClass("col-sm-12")
        $("#nav-search").addClass("col-sm-6");

    }
  }
  
  var x = window.matchMedia("(max-width: 994px)")
  myFunction(x) // Call listener function at run time
  x.addListener(myFunction)


  function cleanup() {



    localStorage.removeItem("gpost_id");
    localStorage.removeItem("gpost_title");
    localStorage.removeItem("gpost_body");
   

    localStorage.removeItem("clicked_id");



    }