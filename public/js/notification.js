const notification = document.querySelector(".absolute[data-message]");
const notificationMessage = notification.getElementsByTagName("h3")[0];
notificationMessage.innerHTML = notification.dataset.message;
setTimeout(() => {
    notificationMessage.classList.add("hidden");
}, 3000);
