const pagination = document.getElementById("pagination");
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
                    console.log(success);
                    const tempatPagination = pagination.previousElementSibling;
                    tempatPagination.innerHTML = success;
                });
        }
    }
});
