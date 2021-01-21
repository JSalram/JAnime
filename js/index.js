let user = document.querySelector("div.user");

localStorage.setItem("user", user.innerText.toLowerCase());

let watched = document.querySelectorAll("div.watched");

watched.forEach((element) => {
    let data = element.innerText.split(":");
    localStorage.setItem(data[0], data[1]);
});
