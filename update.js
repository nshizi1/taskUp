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

