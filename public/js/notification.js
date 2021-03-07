const notification = document.getElementsByClassName("notification")[0];
// jika ada class notification
if (notification) {
    const modalWrapperClassNames = "fixed inset-0 bg-black opacity-35";
    const modalWrapper = document.createElement("div");
    const modalOverlay = document.createElement("div");
    const isiModalContent = notification.dataset.notification;
    modalOverlay.addEventListener("click", function () {
        modalWrapper.remove();
    });

    addClass(
        modalWrapper,
        "fixed inset-0 z-40 flex items-center justify-center w-100 min-h-screen"
    );

    addClass(modalOverlay, modalWrapperClassNames);
    const modalContent = document.createElement("div");
    modalContent.innerHTML = isiModalContent;
    addClass(modalContent, "bg-white p-0 md:p-6 z-10");
    modalWrapper.append(modalOverlay);
    modalWrapper.append(modalContent);
    document.body.append(modalWrapper);
}
