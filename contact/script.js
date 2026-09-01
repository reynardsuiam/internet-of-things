function confirmDelete() {
    return confirm(
        "Are you sure you want to delete this contact?"
    );
}

function validateForm() {

    const firstName = document
        .getElementById("first_name")
        .value
        .trim();

    const lastName = document
        .getElementById("last_name")
        .value
        .trim();

    const email = document
        .getElementById("email")
        .value
        .trim();

    if (firstName === "") {
        alert("Please enter the first name.");
        return false;
    }

    if (lastName === "") {
        alert("Please enter the last name.");
        return false;
    }

    if (email === "") {
        alert("Please enter the email address.");
        return false;
    }

    const emailPattern =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true;
}