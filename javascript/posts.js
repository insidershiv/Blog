
var post_id = localStorage.getItem("gpost_id");
//console.log(post_id);


function uploadImage(imgfile, editor) {


    var data = new FormData();


    data.append("file", imgfile);





    $.ajax({
        type: "POST",
        url: "/api/upload.php",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        headers: {
            Authorization: "Bearer " + Cookies.get("token")
        },
        success: function (response) {

            response = JSON.parse(response);

            var img = document.createElement("IMG");


            src = "http://" + window.location.hostname + "/" + response.src;
            console.log(src);
            img.src = src;
            img.id = response.id;
            



            $(editor).summernote('insertNode', img);


        },
        error: function (xhr) {

            console.log("haha" + xhr.responseText);
        }
    });



}




$(document).ready(function () {

    // var post_id = localStorage.getItem("gid");
    // console.log(post_id);


    if (Cookies.get("token") == undefined) {
        document.location.href = "signin";
    } else {

        $('#summernote').summernote({
            tabsize: 2,
            height: 400,
            codeviewFilter: false,
            codeviewIframeFilter: true,
            callbacks: {
                onImageUpload: function (image) {
                    editor = $(this);
                    uploadImage(image[0], editor);
                }
            }

        });

        var name = Cookies.get("name");

        document.getElementById("dp_name").innerText = name;

        // console.log(localStorage.getItem("gpost_id"));
        if (localStorage.getItem("gpost_id") == null) {

            document.getElementById("post_btn").innerText = "Post";

            $("#post_btn").click(create_post);


        } else {

            document.getElementById("post_btn").innerText = "Update";

            var id = localStorage.getItem("gpost_id");
            var title = localStorage.getItem("gpost_title");
            var body = localStorage.getItem("gpost_body");

           
            $('#summernote').summernote('code', body);

            document.getElementById("title").value = title;
            //document.getElementById("summernote").value = body;

            $("#post_btn").click(update_post);


        }



    }

});


function create_post(event) {
    event.preventDefault();

    var html = $('#summernote').summernote('code');



    var data = {

        "title": document.getElementById("title").value,
        "body": $('#summernote').summernote('code'),
    }




    $.ajax({
        type: "POST",
        url: base_url + "/api/blog",
        data: JSON.stringify(data),
        headers: {
            Authorization: "Bearer " + Cookies.get("token")
        },
        success: function (response) {
            post = JSON.parse(response);
            posts = localStorage.getItem("posts");

            console.log(post);

            if (posts) {

                posts = JSON.parse(posts);
            }

            posts[post.id] = post;
            localStorage.setItem("posts", JSON.stringify(posts));
            swal("post created", "", "success", {
                button: "continue",

            })
                .then((value) => {


                    if (value) {
                        document.location.href = "userprofile";
                    }

                });


        },

        error: function (response) {
            data = JSON.parse(response.responseText);
            console.log("error " + data.msg);

            swal("something went wrong", "", "error");

        }
    });



}

function update_post(event) {

    event.preventDefault();


    var data = {

        "title": document.getElementById("title").value,
        "body": $('#summernote').summernote('code')
    }

    post_id = localStorage.getItem("gpost_id");

    $.ajax({
        type: "PATCH",
        url: base_url + "/api/blog/" + post_id,
        data: JSON.stringify(data),
        headers: {
            Authorization: "Bearer " + Cookies.get("token")
        },
        success: function (response, status, xhr) {
            response = JSON.parse(response);
            console.log(data.body);
                
                posts = localStorage.getItem(`posts`);
                posts = JSON.parse(posts);
           
                posts[post_id].title = data.title;
                posts[post_id].body = data.body;

                localStorage.setItem("posts",JSON.stringify(posts));
            
    

           

            if (window.confirm+(response.msg)) {

                document.location.href = "userprofile";

            } else {

                document.location.href = "userprofile";
            }
        },
        error: function (xhr, textStatus, errorMessage) {
            console.log(xhr);
        }
    });



}

