function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "[]";
}

function setCookie(cname, cvalue, exdays) {
    let date = new Date();
    date.setTime(date.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// shopping cart
const shoppingCart = document.getElementById("shopping-cart");
// jika cart kosong
const cartEmpty = shoppingCart.querySelector("#cart-empty");
// total Harga
const totalHarga = shoppingCart.querySelectorAll(".total");

// ambil dari cookie key cart
const carts = JSON.parse(getCookie("cart"));
if (shoppingCart) {
    const headerCart = document.getElementById("header-cart");
    const buttons = shoppingCart.querySelectorAll("button[data-delete-item]");
    // jika tidak ada data munculkan pesan & hilangkan warna pink di icon belanja
    if (buttons.length === 0) {
        removeClass(cartEmpty, "hidden");
        removeClass(headerCart, "cart-filled");
    }
    // looping seluruh button X
    for (let index = 0; index < buttons.length; index++) {
        const button = buttons[index];
        const id = button.attributes["data-delete-item"].value;
        button.addEventListener("click", function () {
            // hapus array di cookie
            const index = carts.indexOf(parseInt(id));
            if (index > -1) {
                carts.splice(index, 1);
            }
            // set nilai cookie ubah jadi string (json)
            const valueCart = JSON.stringify(carts);
            setCookie("cart", valueCart, 7);

            // jika tidak ada data cart maka munculkan pesan 'show now'
            // & hilangkan total harga
            if (carts.length === 0) {
                removeClass(cartEmpty, "hidden");
                totalHarga.forEach((element) => {
                    element.remove();
                });
                removeClass(headerCart, "cart-filled");
            }

            // hapus cart
            shoppingCart.querySelector(`div[data-row='${id}']`).remove();

            // ubah harga total
            // ambil seluruh elements prices
            const prices = shoppingCart.querySelectorAll("[data-price]");

            let harga = 0;
            console.log(prices.length);
            for (let i = 0; i < prices.length; i++) {
                const price = prices[i];
                harga += parseInt(price.dataset.price);
            }
            console.log(harga / 2);
            // data price harus / 2 karena element double untuk handphone & laptop
            // hitung total harga + ppn 10 %
            harga = harga / 2 + harga / 2 / 10;
            harga = new Intl.NumberFormat("id").format(harga);
            console.log(harga);
            for (let i = 0; i < totalHarga.length; i++) {
                const element = totalHarga[i];
                const tagHarga = element.querySelectorAll("h6 b");
                tagHarga.forEach((element) => {
                    element.innerHTML = `IDR ${harga}`;
                });
            }
        });
    }
}
