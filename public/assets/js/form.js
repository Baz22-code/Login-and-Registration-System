function redirectToRegister() {
    window.location.href = "/Login-System/public/index.php/register";
}

function redirectToLogin() {
  window.location.href = "/Login-System/public/index.php";
}


document.getElementById("loginForm").addEventListener("submit", function (event){


    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    const formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);

    fetch("/Login-System/app/controller/form_controller.php", {
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
              document.getElementById("registrationForm").reset();
              alert(data.message);
          } else {
              alert(data.message);
          }
      })
      .catch(error => {
          console.error("Error:", error.message);
          alert(error.message);
      });




});
