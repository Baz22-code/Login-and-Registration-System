document.getElementById("forgot_pass").addEventListener("submit", function (event) {
    event.preventDefault();

    const username = document.getElementById("username").value.trim();
    const secretId = document.getElementById("secretId").value.trim();

    if (!username || !secretId) {
        alert("Both username and secret id are required.");
        return;
    }

    const formData = new FormData();
    formData.append("username", username);
    formData.append("secretId", secretId);

    fetch("http://localhost/Login-System/app/controller/forgot_controller.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                    // Fixing window.location.href
                    const basePath = "/Login-System/public/index.php";
                    window.location.href = `${basePath}/update_password`;
                    
            } else {
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Something went wrong: " + error.message);
        });
});

// Display error messages
function showError(message) {
    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "block";
    errorMessage.textContent = message;
}

function redirectTo(url) {
    window.location.href = url; // Redirects the user to the specified URL
}

    