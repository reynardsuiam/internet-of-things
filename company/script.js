document.addEventListener("DOMContentLoaded", function () {

    const registerForm = document.getElementById("registerForm");

    if (registerForm) {

        registerForm.addEventListener("submit", function (event) {

            const password =
                document.getElementById("password").value;

            if (password.length < 6) {

                alert(
                    "Password must contain at least 6 characters."
                );

                event.preventDefault();
            }

        });

    }

});
