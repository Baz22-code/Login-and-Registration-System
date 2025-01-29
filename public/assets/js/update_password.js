document.getElementById("updatePassword").addEventListener("submit", function (event) {
    event.preventDefault();
    clearErrors();

    const username = document.getElementById("username").value.trim();
    const secretId = document.getElementById("secretId").value.trim();
    const newPassword = document.getElementById("newPassword").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();


    let isValid = true;

    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (!passwordPattern.test(newPassword)) {
        showError("new_passwordError", "Password must have 8 characters, uppercase, lowercase, and a number.");
        isValid = false;
    }

    if (newPassword !== confirmPassword) {
        showError("confirmPasswordError", "Passwords do not match.");
        isValid = false;
    }


    if (isValid) {
        const formData = new FormData();
        formData.append("secretId", secretId);
        formData.append("username", username);
        formData.append("newPassword", newPassword);
        formData.append("confirmPassword", confirmPassword);

        fetch("http://localhost/Login-System/app/controller/update_password.php", {
            method: "POST",
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || "Unexpected server error.");
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error.message);
                alert(error.message);
            });
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
