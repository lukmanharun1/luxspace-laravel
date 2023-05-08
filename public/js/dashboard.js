const searchCategory = document.getElementById("search_category");
const tbody = document.getElementsByTagName("tbody")[0];

async function httpRequest(url) {
    const response = await fetch(url);
    const text = await response.text();
    tbody.innerHTML = text ?? `<tr><td colspan="8">Data rooms not found</td></tr>`;
}

// search category di change
searchCategory.addEventListener("change", function (category) {
    const valueCategory = category.target.value;
    if (valueCategory === "all_data_categories") {
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
    if (valueCategory === "all_data_categories") {
        httpRequest(`/dashboard/ajax/all-data-rooms/${valueProductPrice}`);
    } else {
        httpRequest(`/dashboard/ajax/${valueCategory}/${valueProductPrice}`);
    }
});
