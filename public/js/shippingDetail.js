// ambil seluruh courier
const couriers = document.querySelectorAll(`form input[name='courier']`);
couriers.forEach((courier) => {
    courier.nextElementSibling.addEventListener("click", function (e) {
        // hapus seluruh attribut checked
        e.target.parentElement.parentElement.parentElement
            .querySelectorAll(`input[name='courier']`)
            .forEach((element) => element.removeAttribute("checked"));
        // lalu tambahkan attribut checked
        // jika yang di klik image
        if (e.target.previousElementSibling === null) {
            e.target.parentElement.previousElementSibling.setAttribute(
                "checked",
                ""
            );
        } else {
            // jika yang di klik button
            e.target.previousElementSibling.setAttribute("checked", "");
        }
    });
});

// ambil seluruh payment
const payments = document.querySelectorAll(`form input[name='payment']`);
payments.forEach((payment) => {
    payment.nextElementSibling.addEventListener("click", function (e) {
        // hapus seluruh attribut checked
        e.target.parentElement.parentElement.parentElement
            .querySelectorAll(`input[name='payment']`)
            .forEach((element) => element.removeAttribute("checked"));
        // lalu tambahkan attribut checked
        // jika yang di klik image
        if (e.target.previousElementSibling === null) {
            e.target.parentElement.previousElementSibling.setAttribute(
                "checked",
                ""
            );
        } else {
            // jika yang di klik button
            e.target.previousElementSibling.setAttribute("checked", "");
        }
    });
});
