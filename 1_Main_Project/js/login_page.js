$(document).ready(function () {
    $("#editFormsubmitButton").click(function () {
        // e.preventDefault();


        $("#loginForm").validate({
            rules: {
                userEmail: {
                    required: true,
                    pattern: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+.([a-zA-Z0-9-]+)*$/
                },
                userPassword: {
                    required: true,
                    minlength: 5,

                    pattern: "^(?=.*[0-9])"
                        + "(?=.*[a-z])(?=.*[A-Z])"
                        + "(?=.*[@#$%^&+=])"
                        + "(?=\\S+$).{8,20}$"

                }

            },
            // messages: {
            //     userPassword: {
            //         pattern : "Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one  special character "
            //     }

            // }
        });
    });
});