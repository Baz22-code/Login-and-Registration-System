document.getElementById("registrationForm").addEventListener("submit", function (event) {
    event.preventDefault();
    clearErrors();

    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();

    let isValid = true;

    if (firstName.length < 3) {
        showError("firstNameError", "Firstname must be at least 3 characters.");
        isValid = false;
    }

    if (lastName.length < 3) {
        showError("lastNameError", "Lastname must be at least 3 characters.");
        isValid = false;
    }

    if (username.length < 3) {
        showError("userNameError", "Username must be at least 3 characters.");
        isValid = false;
    }

    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (!passwordPattern.test(password)) {
        showError("passwordError", "Password must have 8 characters, uppercase, lowercase, and a number.");
        isValid = false;
    }

    if (password !== confirmPassword) {
        showError("confirmPasswordError", "Passwords do not match.");
        isValid = false;
    }

    if (isValid) {
        const formData = new FormData();
        formData.append("firstName", firstName);
        formData.append("lastName", lastName);
        formData.append("username", username);
        formData.append("password", password);
        formData.append("confirmPassword", confirmPassword);

        fetch("../controller/registration_controller.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    document.getElementById("registrationForm").reset();
                } else {
                    for (const key in data.errors) {
                        showError(`${key}Error`, data.errors[key]);
                    }
                }
            })
            .catch(error => console.error("Error:", error));
    }
});

function clearErrors() {
    document.querySelectorAll(".error").forEach(error => {
        error.style.display = "none";
        error.innerText = "";
    });
}

function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.innerText = message;
    errorElement.style.display = "block";
}
