function validateRegister() {

    const password =
        document.getElementById("password").value;

    const confirmPassword =
        document.getElementById("confirm_password").value;

    if (password.length < 6) {

        alert("Password must contain at least 6 characters.");

        return false;
    }

    if (password !== confirmPassword) {

        alert("Passwords do not match.");

        return false;
    }

    return true;
}