// icon details

// const iconDetails = document.querySelectorAll('.show-icon-details');
const categoryRoom = document.getElementById('category-room');

categoryRoom.addEventListener('mouseover', (e) => {
    if (e.target.classList.contains('show-icon-details')) {
        const element = e.target.nextElementSibling;
        if (element.classList.contains('hidden')) {
            element.classList.remove('hidden');
            element.classList.add('flex');

            element.addEventListener('mouseleave', () => {
                element.classList.remove('flex');
                element.classList.add('hidden');
            });
        }
    }
});

// pagination
const pagination = document.getElementById("pagination");
// ambil item carousel
const tempatPagination = pagination.previousElementSibling;

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
