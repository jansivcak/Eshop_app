
document.addEventListener("DOMContentLoaded", function() {
    const userIcon = document.getElementById("user-icon");
    const userMenu = document.getElementById("user-menu");

    userIcon.addEventListener("click", function() {
        userMenu.classList.toggle("active");
    });

    document.addEventListener("click", function(event) {
        if (!userIcon.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.remove("active");
        }
    });
});

document.getElementById("user-icon").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("user-menu").classList.toggle("active");
});
