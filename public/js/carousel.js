const carouselId = document?.getElementById("carousel");
const carouselItems = carouselId?.getElementsByClassName("flex")[0];
const carouselContainer = carouselId?.getElementsByClassName("container")[0];

function carouselCalculateOffset() {
    const carouselOffset = carouselContainer.getBoundingClientRect().left;

    carouselItems.style.paddingLeft = `${carouselOffset - 16}px`;
    carouselItems.style.paddingRight = `${carouselOffset - 16}px`;
}

function slide(wrapper, items) {
    let posX1 = 0,
        posX2 = 0,
        posInitial,
        posFinal,
        threshold = 100,
        itemToShow = 4,
        slides = items.getElementsByClassName("card"),
        slideLength = slides.length,
        slideSize = items.getElementsByClassName("card")[0].offsetWidth,
        index = 0,
        allowShift = true;

    wrapper.classList.add("loaded");

    items.onmousedown = dragStart;

    items.addEventListener("touchstart", dragStart);
    items.addEventListener("touchend", dragEnd);
    items.addEventListener("touchmove", dragAction);

    items.addEventListener("transitionend", checkIndex);

    function dragStart(e) {
        e = e || window.event;
        e.preventDefault();
        posInitial = items.offsetLeft;

        if (e.type == "touchstart") {
            console.log(e.touches);
            posX1 = e.touches[0].clientX;
        } else {
            posX1 = e.clientX;
            document.onmouseup = dragEnd;
            document.onmousemove = dragAction;
        }
    }

    function dragAction(e) {
        e = e || window.event;
        if (e.type == "touchmove") {
            posX2 = posX1 - e.touches[0].clientX;
            posX1 = e.touches[0].clientX;
        } else {
            posX2 = posX1 - e.clientX;
            posX1 = e.clientX;
        }

        items.style.left = `${items.offsetLeft - posX2}px`;
    }

    function dragEnd() {
        posFinal = items.offsetLeft;

        if (posFinal - posInitial < -threshold) {
            shiftSlide(1, "drag");
        } else if (posFinal - posInitial > threshold) {
            shiftSlide(-1, "drag");
        } else {
            items.style.left = posInitial + "px";
        }
        document.onmouseup = null;
        document.onmousemove = null;
    }

    function shiftSlide(direction, action) {
        addClass(items, "transition-all duration-200");

        if (allowShift) {
            if (!action) {
                posInitial = items.offsetLeft;
            }

            if (direction == 1) {
                items.style.left = `${posInitial - slideSize}px`;
                index++;
            } else if (direction == -1) {
                items.style.left = `${posInitial + slideSize}px`;
                index--;
            }
        }

        allowShift = false;
    }

    function checkIndex() {
        setTimeout(() => {
            removeClass(items, "transition-all duration-200");
        }, 200);
        if (index == -1) {
            items.style.left = -(slideLength * slideSize) + "px";
            index = slideLength - 1;
        }

        if (index == slideLength - itemToShow) {
            items.style.left =
                -((slideLength - itemToShow - 1) * slideSize) + "px";
            index = slideLength - itemToShow - 1;
        }

        if (index == slideLength || index == slideLength - 1) {
            items.style.left = "0px";
            index = 0;
        }

        allowShift = true;
    }
}
if (carouselId) {
    slide(carouselId, carouselItems);
    window.addEventListener("load", carouselCalculateOffset);
    window.addEventListener("resize", carouselCalculateOffset);
}

const cards = document.querySelectorAll(".card");
const links = document.querySelectorAll(".relative.px-4.card .stretched-link");

links.forEach(function (link) {
    link.addEventListener("mouseover", function (e) {
        const iconDetail = e.target.parentElement.querySelector(
            ".absolute.inset-0.rounded-xl"
        );
        if (iconDetail.classList.contains("hidden")) {
            iconDetail.classList.remove("hidden");
            iconDetail.classList.add("flex");
        }
    });

    link.addEventListener("mouseleave", function (e) {
        const iconDetail = e.target.parentElement.querySelector(
            ".absolute.inset-0.rounded-xl"
        );
        if (!iconDetail.classList.contains("hidden")) {
            iconDetail.classList.add("hidden");
            iconDetail.classList.remove("flex");
        }
    });
});
