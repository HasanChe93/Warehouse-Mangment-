


document.addEventListener("DOMContentLoaded", function () {
    const roleSelect = document.getElementById("roleSelect");

    document.addEventListener("change", function () {
        const employeeDiv = document.getElementById("employeeDiv");
        if (roleSelect.value === "employee") {
            employeeDiv.style.display = "";
        } else {
            employeeDiv.style.display = "none";
        }
    });
});
