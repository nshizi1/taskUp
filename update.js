document.addEventListener("click", function (event) {
    if (event.target.id === "updateData") {
        event.preventDefault();
        console.log("Hello update");
        document.getElementById("view").classList.remove("grid");
        document.getElementById("view").classList.add("hidden");
        document.getElementById("edit").classList.remove("hidden");
        document.getElementById("edit").classList.add("grid");
        event.target.setAttribute("id", "ViewData");
        event.target.textContent = "View Task";
        document.getElementById("complete").classList.add("hidden");
    } else if (event.target.id === "ViewData") {
        event.preventDefault();
        console.log("Hello view");
        document.getElementById("view").classList.add("grid");
        document.getElementById("view").classList.remove("hidden");
        document.getElementById("edit").classList.add("hidden");
        document.getElementById("edit").classList.remove("grid");
        event.target.setAttribute("id", "updateData");
        event.target.textContent = "Update Task";
        document.getElementById("complete").classList.remove("hidden");
    }
});

// disabling ctrl+u
document.addEventListener('keydown', function(event) {
    // Check if Control key and 'U' key are pressed
    if (event.ctrlKey && event.key === 'u') {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      // console.log("Ctrl + U is disabled.");
    }
  });
  
  document.addEventListener('keydown', function(event) {
    // Check if Control key and 'U' key are pressed
    if (event.ctrlKey && event.key === 'p') {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      // console.log("Ctrl + P is disabled.");
    }
  });
  
  document.addEventListener('keydown', function(event) {
    // Check if Control key, Shift key, and 'i' key are pressed
    if (event.ctrlKey && event.shiftKey && (event.key === 'i' || event.code === 'KeyI')) {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      // console.log("Ctrl + Shift + I is disabled.");
    }
  });
  
  document.addEventListener('keydown', function(event) {
    // Check if Control key, Shift key, and 'i' key are pressed
    if (event.ctrlKey && event.shiftKey && (event.key === 'p' || event.code === 'KeyP')) {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      // console.log("Ctrl + Shift + I is disabled.");
    }
  });
  
  
  
  document.addEventListener('keydown', function(event) {
    // Check if Control key and 'I' key are pressed
    if (event.ctrlKey && event.key === 'i') {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      // console.log("Ctrl + I is disabled.");
    }
  });
  
  document.addEventListener('keydown', function(event) {
    // Check if Control key and 'I' key are pressed
    if (event.ctrlKey && event.key === 's') {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      // console.log("Ctrl + S is disabled.");
    }
  });
  
  
  document.addEventListener('contextmenu', function(event) {
    // Prevent the default right-click behavior
    event.preventDefault();
    // Optionally, you can add your own custom behavior here
    // console.log("Right-click is disabled.");
  });
  
  
  
  document.addEventListener('keydown', function(event) {
    // Check if F12 key is pressed
    if (event.key === 'F12' || event.keyCode === 123) {
      // Prevent the default action
      event.preventDefault();
      // Optionally, you can add your own custom behavior here
      console.log("F12 key is disabled.");
      // Or alert a message
      // alert("F12 key is disabled.");
    }
  });
  
  // Prevent drag and drop for all images
  document.addEventListener('dragstart', function (event) {
    event.preventDefault();
  });