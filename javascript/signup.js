
function signup() {
   
    var credentials = {
        'name': document.getElementById("name").value,
        'email': document.getElementById("email").value,
        'password': document.getElementById("password").value
    };

    console.log(credentials);


    $.ajax({
        type: "POST",
        url: base_url + "/api/user",
        data: JSON.stringify(credentials),
        success: function (response, status, xhr) {
            data = JSON.parse(response);
            swal("Account Creation", "Successfull", "success", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                    document.location.href="signin";
                    
                });

        },
        error: function (xhr, textStatus, errorMessage) {
            body = JSON.parse(xhr.responseText);
            
            swal(body.msg, "", "error");
        }
    });

}

$(document).ready(function () {

    var form = document.getElementById("signup_form")
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        if (form.checkValidity() === false) {
          event.stopPropagation();
        }
       form.classList.add('was-validated');
       signup();     
    });

});