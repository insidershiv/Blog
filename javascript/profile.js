var id = undefined;
var body = undefined;
var title = undefined;


function removeTags(str) {
    if ((str===null) || (str===''))
    return false;
    else
    str = str.toString();
    return str.replace( /(<([^>]+)>)/ig, '');
 }

$(document).ready(function () {


    // check if cookie has some datza

    if (Cookies.get("id") == undefined) {

        document.location.href = "sigin";

    } else {

       cleanup();

        //localStorage.removeItem("posts");


        var name = Cookies.get("name");

        document.getElementById("dp_name").innerHTML = name;


        //document.onload = get_post();

        posts = localStorage.getItem("posts");


        if (posts) {
            
            posts = JSON.parse(posts);
            render_posts(Object.values(posts));
        } else {
            get_post();
        }

    }

});


function deleteFromObject(keyPart, obj){
    for (var k in obj){          // Loop through the object
        if(~k.indexOf(keyPart)){ // If the current key contains the string we're looking for
            delete obj[k];       // Delete obj[key];
        }
    }
}

function get_post() {




    $.ajax({
        type: "GET",
        url: base_url + "/api/blog/",
        headers: {
            Authorization: "Bearer " + Cookies.get("token")
        },

        success: function (response, status, xhr) {

            if (response) {

                data = JSON.parse(response);

                posts = {};

                for (var i = 0; i < data.length; i++) {
                    post = data[i];
                    id = post.id;
                    posts[id] = post;
                }



                localStorage.setItem("posts", JSON.stringify(posts));
                render_posts(data);
            }

        },

        error: function (response) {
            data = JSON.parse(response);
            console.log(response);
        }
    });


}




function delete_post(id) {


    //delete ajax request method

    id = id.substr(1, id.length - 1);



    $.ajax({
        type: "DELETE",
        url: base_url + "/api/blog/" + id,
        headers: {
            Authorization: "Bearer " + Cookies.get("token")
        },
        success: function (response) {

            data = JSON.parse(response);

            //post = JSON.parse(response);

            posts = JSON.parse(localStorage.getItem("posts"));
            delete posts[id];
            localStorage.setItem("posts",JSON.stringify(posts));
            
            

            var posts = document.getElementById("post-feed");   //getting post element it is an object

            var childNodes = posts.childNodes;                 //getting childnodes of the postnodes array of objects
            var post = undefined;
            for (var i = 0; i < childNodes.length; i++) {      //searching and trying to match the id of the button with the id of the <li> to be deleted


                if (childNodes[i].id == id)
                    post = childNodes[i];



            }
           
            posts.removeChild(post);                    //removing the post from UI by removing child

        },

        error: function (response) {
            localStorage.removeItem("posts");
            console.log(response.responseText);
            // data = JSON.parse(response);
            // console.log(data);
        }
    });


}


function render_posts(posts) {

    my_id = Cookies.get("id");

    for (i = 0; i < posts.length; i++) {

        var id = posts[i].id;
        var title = posts[i].title;
        var body = $(posts[i].body).text();
        var timestamp = posts[i].timestamp;

        body = body.substring(0,100) + "....."; // three lines
        
        var child = "<div class=\"card col-md-3 m-4 pb-4\"" + "id=" + id + ">";
        child = child + "<div class=\"card-body\">";
        child = child + "<h4 class=\"card-title\" >" + title + "</h4>";
        child = child + "<h6 class=\"card-subtitle mb-2 text-muted  \" \">" + timestamp + "</h6>";
        child = child + "<p class=\"card-text\">" + body + "</p>";



        if (posts[i].user_id == my_id) {
            child = child + "<a  href=\"#\" id =d" + id + " onclick= delete_post(this.id)  class=\"card-link\">Delete</a>";
            child = child + "<a href=\"#\" id =e" + id + " onclick= edit_post(this.id)   class=\"card-link\">Edit</a>";
            child = child + "<a href=\"viewpost.php\" id =e" + id + " onclick= view_post(this.id)   class=\"card-link\">View</a>";
        }

        child = child + "</div>";
        child = child + "</div>";

         $("#post-feed").prepend(child);

    }


}

function edit_post(id) {


    id = id.substr(1, id.length - 1);                      //id is the post_id which we want to edit we got from clicking the button
    posts = JSON.parse(localStorage.getItem("posts"));
    post = posts[id];

    console.log(post);


    localStorage.setItem("gpost_id", post.id);               // storing data to tranfer to post.php
    localStorage.setItem("gpost_title", post.title);
    localStorage.setItem("gpost_body", post.body);


    document.location.href = "post";
}


function view_post(id) {

    localStorage.setItem("clicked_id",id);
    

  }