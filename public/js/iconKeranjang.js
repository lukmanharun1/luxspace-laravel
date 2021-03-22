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

// icon keranjang
const headerCart = document.getElementById("header-cart");
// ambil cookie mempunyai key cart jika tidak ada maka ilangkan warna pink di icon belanja
if (getCookie("cart") === "[]") {
    removeClass(headerCart, "cart-filled");
}
