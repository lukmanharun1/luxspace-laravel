const searchCategory = document.getElementById("search_category");
const tbody = document.getElementsByTagName("tbody")[0];

function httpRequest(url) {
    fetch(url)
        .then((response) => response.text())
        .then((success) => {
            if (success) {
                tbody.innerHTML = success;
            } else {
                tbody.innerHTML = `
            <tr>
                <td colspan="8">Data rooms not found</td>
            </tr>`;
            }
        })
        .catch((responseError) => console.log(responseError));
}
// search category di change
searchCategory.addEventListener("change", function (category) {
    const valueCategory = category.target.value;
    if (valueCategory === "all_data_rooms") {
        httpRequest("/dashboard/ajax/all-data-rooms");
    } else {
        httpRequest(`/dashboard/ajax/${valueCategory}`);
    }
});

// search by name product & price
const searchNamePrice = document.querySelector("span input");
searchNamePrice.addEventListener("keyup", function () {
    const valueProductPrice = this.value;
    const valueCategory = searchCategory.value;
    if (valueCategory === "all_data_rooms") {
        httpRequest(`/dashboard/ajax/all-data-rooms/${valueProductPrice}`);
    } else {
        httpRequest(`/dashboard/ajax/${valueCategory}/${valueProductPrice}`);
    }
});
