document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Stop the form from submitting

    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    // Validate input fields
    if (!username || !password) {
        alert("Both username and password are required.");
        return;
    }

    // Prepare data for submission
    const formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);

    // Submit the form data using fetch
    fetch("http://localhost/Login-System/app/controller/form_controller.php", {
        method: "POST",
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              
              window.location.href = "http://localhost/Login-System/app/view/user.php"; // Redirect on success
          } else {
              alert(data.message);
          }
      })
      .catch(error => {
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
    