document.addEventListener("DOMContentLoaded", function () {
    const check = document.getElementById("check");
    const icon = document.querySelector(".icon");
    const links = document.querySelector(".links");

    // Tambahkan event listener untuk mengubah tampilan menu saat checkbox diubah
    check.addEventListener("change", function () {
        if (this.checked) {
            // Checkbox checked, tampilkan menu
            icon.querySelector("#menu-icon").style.display = "none";
            icon.querySelector("#close-icon").style.display = "block";
            links.classList.add("active");
        } else {
            // Checkbox unchecked, sembunyikan menu
            icon.querySelector("#menu-icon").style.display = "block";
            icon.querySelector("#close-icon").style.display = "none";
            links.classList.remove("active");
        }
    });

    // Tambahkan event listener untuk menutup menu saat salah satu link diklik
    links.querySelectorAll("a").forEach(function (link) {
        link.addEventListener("click", function () {
            check.checked = false;
            icon.querySelector("#menu-icon").style.display = "block";
            icon.querySelector("#close-icon").style.display = "none";
            links.classList.remove("active");
        });
    });
});
