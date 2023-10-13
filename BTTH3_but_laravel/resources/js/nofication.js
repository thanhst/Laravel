function showNotification(message, type) {
    var notification = document.getElementById("notification");
    notification.textContent = message;
    notification.classList.add(type);
    notification.style.display = "block";
  
    setTimeout(function() {
      hideNotification();
    }, 5000);
  }
  
  function hideNotification() {
    var notification = document.getElementById("notification");
    notification.style.display = "none";
    notification.classList.remove("success", "error", "warning");
  }
  
  document.addEventListener("DOMContentLoaded", function() {
    var closeButton = document.createElement("span");
    closeButton.innerHTML = "&times;";
    closeButton.classList.add("close-button");
    closeButton.addEventListener("click", function() {
      hideNotification();
    });
  
    var notification = document.getElementById("notification");
    notification.appendChild(closeButton);
  });