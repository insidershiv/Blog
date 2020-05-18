
function show_password(obj) { 

   password_field =  document.getElementById("password");

   if(password_field.type == "password")
    password_field.type="text";
    else password_field.type="password";
 

    
 }

function signIn() {
  

    

    var credentials = {
        'email': (document.getElementById("email").value),
        'password': (document.getElementById("password").value)
    }


    console.log(credentials);


    // var isSucessfull = true;

    // if(!validator.isEmail(credentials.email)){
    //     document.getElementById("error_email").style.display = "block";
    //     isSucessfull = false;
    // }

    // if(!validator.isLength(credentials.password,{min:8,max:undefined})){
    //     document.getElementById("error_password").style.display = "block";
    //     isSucessfull = false;
    // }

    

    
    
    // if(!isSucessfull)
    //     return ;

   
    $.ajax({
        type: "POST",
        url: base_url + "/api/login",
        data: JSON.stringify(credentials),
        success: function (data, status, xhr) {
            
            

            data = JSON.parse(data);
            
            Cookies.set("name", data.name, { sameSite: 'lax' });
            Cookies.set("email", data.email, { sameSite: 'lax' });
            Cookies.set("id", data.id, { sameSite: 'lax' });
            Cookies.set("token", data.jwt, { sameSite: 'lax' });

            document.location.href = "userprofile";
        },  
        error: function (xhr) {
            body = JSON.parse(xhr.responseText);
            console.log(body.msg);
            swal(body.msg, "", "error");
        }
    });

}





$(document).ready(function () {

    // coookie avaible

    
    if(Cookies.get("id") != undefined){
        document.location.href="userprofile";

   

    }
    else {
        // $("#signin_btn").click(signIn);


        var form = document.getElementById("login_form")
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (form.checkValidity() === false) {
              event.stopPropagation();
            }
           form.classList.add('was-validated');
           signIn();     
        });








    }
});