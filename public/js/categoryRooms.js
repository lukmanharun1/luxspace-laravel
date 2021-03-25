// pagination
const pagination = document.getElementById("pagination");
// ambil item carousel
const tempatPagination = pagination.previousElementSibling;
// icon details (mata) hover
tempatPagination.addEventListener("mouseover", function (e) {
    // tambahkan class hidden (item carousel)
    const hapusIconDetails = tempatPagination.querySelectorAll(
        ".absolute.inset-0.rounded-3xl"
    );
    hapusIconDetails.forEach((hapusIconDetail) => {
        if (!hapusIconDetail.classList.contains("hidden")) {
            hapusIconDetail.classList.add("hidden");
        }
    });
    const iconDetail = e.target.parentElement.querySelector(
        ".absolute.inset-0.rounded-3xl"
    );
    iconDetail.classList.remove("hidden");
});

// ketika mouse keluar
tempatPagination.addEventListener("mouseleave", function (e) {
    if (!iconDetail.classList.contains("hidden")) {
        iconDetail.classList.add("hidden");
    }
});

// pagination
pagination.addEventListener("click", function (e) {
    e.preventDefault();
    const classAktif = "bg-black text-pink-400";
    const halamanAktif = pagination.querySelector(".bg-black.text-pink-400");
    if (e.target.href) {
        const url = e.target.href;
        // jalankan ajax
        if (
            !e.target.classList.contains("bg-black") &&
            !e.target.classList.contains("text-pink-400")
        ) {
            removeClass(halamanAktif, classAktif);
            addClass(e.target, classAktif);
            fetch(url)
                .then((response) => response.text())
                .then((success) => {
                    tempatPagination.innerHTML = success;
                })
                .catch((error) => console.log(error));
        }
    }
});
