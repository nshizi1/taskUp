document.addEventListener("click", function (event) {
    if (event.target.id === "updateData") {
        event.preventDefault();
        console.log("Hello update");
        document.getElementById("view").classList.remove("grid");
        document.getElementById("view").classList.add("hidden");
        document.getElementById("edit").classList.remove("hidden");
        document.getElementById("edit").classList.add("block");
        event.target.setAttribute("id", "ViewData");
    } else if (event.target.id === "ViewData") {
        event.preventDefault();
        console.log("Hello view");
        document.getElementById("view").classList.add("grid");
        document.getElementById("view").classList.remove("hidden");
        document.getElementById("edit").classList.add("hidden");
        document.getElementById("edit").classList.remove("block");
        event.target.setAttribute("id", "updateData");
    }else if(event.target.id === "demo") {
        event.preventDefault();
        console.log("Hello demo");
    }
});

