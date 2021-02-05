// Get function
import { getAnime } from "./animeList.js";

// Get Anime name
let path = window.location.pathname;
let page = path.split("/");
let anime = page[page.length - 2];

// Get Anime arrays
const chapters = getAnime(anime).chapters;
const seasons = getAnime(anime).seasons;
const embed = getAnime(anime).embed;

// Prepare vars
let user = localStorage.getItem("user");
let ul = document.querySelector("ul");
let modal = document.querySelector("#modal .modal-body");
let modalTitle = document.querySelector("#modal .modal-title");
let closeModal = document.querySelector("#modal button");
let w = localStorage.getItem(`w${anime}`);
let last = document.querySelector("a.last");

function print() {
    let temp = 0;
    ul.innerHTML = "";

    for (let i = 1; i <= chapters.length; i++) {
        let li = document.createElement("li");
        let row = document.createElement("div");
        let b = document.createElement("button");
        let eye = document.createElement("div");

        // Print seasons
        let h3 = document.createElement("h3");
        if (seasons.includes(i - 1)) {
            h3.innerHTML = `<h3 class='mt-2'>Temporada ${++temp}<h3></h3>`;
            ul.appendChild(h3);
        }

        // Print chapter
        li.classList.add("list-group-item");
        row.classList.add("row");
        b.textContent = `Capítulo ${i - seasons[temp - 1]}`;
        b.classList.add("btn", "btn-link", "d-block", "text-left", "col-md-11", "col-10");
        b.setAttribute("data-bs-toggle", "modal");
        b.setAttribute("data-bs-target", `#modal`);

        // Scraping(!) chapter
        b.addEventListener("click", () => {
            watch(chapters[i - 1]);
            modalTitle.innerHTML = `Capítulo ${i}`;
        });

        // Check watched chapters
        setWatched(i, li, b, eye);
        eye.addEventListener("click", function () {
            toggleWatch(i, eye);
            sendWatched();
        });

        // Append childs
        row.appendChild(b);
        row.appendChild(eye);
        li.appendChild(row);
        ul.appendChild(li);
    }
}

async function watch(url) {
    let episode;
    if (!embed) {
        let html = await fetch(`../../php/scraping.php?url=${url}`);
        episode = await html.text();
    } else {
        episode = url;
    }

    modal.innerHTML = `<iframe
    width="100%"
    src=${episode}
    frameborder="0"
    allowfullscreen
    ></iframe>`;
}

print();

// ====================================================== //

async function sendWatched() {
    await fetch(`../../php/watched.php?anime=${anime}&user=${user}&w=${w}`);
}
function toggleWatch(i, element) {
    if (element.classList.contains("watch")) {
        element.classList.toggle("watched");
        w = i;
    } else {
        element.classList.toggle("watch");
        w = i - 1;
    }

    localStorage.setItem(`w${anime}`, w);

    print();
}
function setWatched(i, li, a, div) {
    if (i <= w) {
        li.classList.add("bg-success");
        a.classList.add("text-light");
        div.classList.add("watched");
        if (i == w) {
            last.addEventListener("click", () => {
                li.scrollIntoView({ block: "start", behavior: "smooth" });
            });
        }
    } else {
        li.style.background = "lightblue";
        a.classList.add("text-dark");
        div.classList.add("watch");
    }
}

closeModal.addEventListener("click", () => {
    modal.innerHTML = "";
});

// ====================================================== //

const goTop = document.querySelector("div.goTop");

window.addEventListener("scroll", () => {
    var y = window.scrollY;
    if (y >= 500) {
        goTop.className = "goTop show";
    } else {
        goTop.className = "goTop hide";
    }
});

goTop.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});
