const searchCategory = document.getElementById("search_category");
const tbody = document.getElementsByTagName("tbody")[0];
// search category di change
searchCategory.addEventListener("change", function (category) {
    const valueCategory = category.target.value;
    if (valueCategory === "all_data_rooms") {
        fetch("/dashboard/ajax/all-data-rooms")
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
    } else {
        fetch(`/dashboard/ajax/${valueCategory}`)
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
});

// search by name product & price
const searchNamePrice = document.querySelector("span input");
searchNamePrice.addEventListener("keyup", function () {
    const valueProductPrice = this.value;
    const valueCategory = searchCategory.value;
    if (valueCategory === "all_data_rooms") {
        fetch(`/dashboard/ajax/all-data-rooms/${valueProductPrice}`)
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
            });
    } else {
        fetch(`/dashboard/ajax/${valueCategory}/${valueProductPrice}`)
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
            });
    }
});
