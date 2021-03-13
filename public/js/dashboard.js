const searchCategory = document.getElementById("search_category");

// search category di change
searchCategory.addEventListener("change", function (category) {
    const valueCategory = category.target.value;
    const tbody = document.getElementsByTagName("tbody")[0];
    if (valueCategory === "all_data_rooms") {
        fetch("/dashboard/ajax/all-data-rooms")
            .then((response) => {
                if (response.ok && response.status === 200) {
                    response.text();
                }
            })
            .then((response) => {
                tbody.innerHTML = response;
            })
            .catch((responseError) => console.log(responseError));
    } else {
        fetch(`/dashboard/ajax/${valueCategory}`)
            .then((response) => {
                if (response.ok && response.status === 200) {
                    response.text();
                }
            })
            .then((response) => {
                if (response) {
                    tbody.innerHTML = response;
                } else {
                    tbody.innerHTML = "";
                }
            })
            .catch((responseError) => console.log(responseError));
    }
});

// search by name product & price
const searchNamePrice = document.querySelector("span input");
searchNamePrice.addEventListener("keyup", function () {
    const valueNamePrice = this.value;
    const valueCategory = searchCategory.value;
    console.log(valueCategory);
});
