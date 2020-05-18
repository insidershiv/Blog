$(document).ready(function () {
    if (Cookies.get("id") == undefined) {

        document.location.href = "sigin";

    } else {
        var name = Cookies.get("name");

    document.getElementById("dp_name").innerHTML = name;
 

        show_post();

        $(document).ready(function(){
            $("img").addClass("blog_image");
        });


    }

});



function show_post() {
    
    id = localStorage.getItem("clicked_id");
    id = id.substr(1,);
    posts = localStorage.getItem("posts");
    
    posts = JSON.parse(posts);
    
    post = posts[id];


    render_posts(post);





    



}







function render_posts(post) {

    my_id = localStorage.getItem("clicked_id");
    console.log(post)
    

        var id = post.id;
        var title = post.title;
        var body = post.body;
        var timestamp = post.timestamp;

        
        
        var child = "<div class=\"card col-md-12 pb-3\"" + "id=" + id + ">";
        child = child + "<div class=\"card-body\">";
        child = child + "<h4 class=\"card-title text-center \"  style=\" font-family:serif;\">" + title + "</h4>";
        child = child + "<h6 class=\"card-subtitle mb-2 text-muted text-center  \" \">" + timestamp + "</h6>";
        child = child + "<p class=\"card-text\">" + body + "</p>";




        child = child + "</div>";
        child = child + "</div>";

         $("#post-feed").prepend(child);

    }


