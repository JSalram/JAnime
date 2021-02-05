// LOGIN //
const dropdown = document.querySelector("nav .dropdown");
async function login() {
    let log = await fetch("./php/dropdown.php");
    let rp = await log.text();
    dropdown.innerHTML = rp;

    const user = document.querySelector("a.user");

    // LOCALSTORAGE //
    localStorage.setItem("user", user.innerText.toLowerCase());

    let watched = document.querySelectorAll("div.watched");

    watched.forEach((element) => {
        let data = element.innerText.split(":");
        localStorage.setItem(data[0], data[1]);
    });
}
login();
