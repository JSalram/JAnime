// Get function
import { getAnime } from "./animeList.js";

// Get Anime name
let path = window.location.pathname;
let page = path.split("/");
let anime = page[page.length - 2];

// Get Anime arrays
const chapters = getAnime(anime).chapters;
const seasons = getAnime(anime).seasons;

// Prepare vars
let user = localStorage.getItem("user");
let ul = document.querySelector("ul");
let w = localStorage.getItem(`w${anime}`);
let last = document.querySelector("a.last");

function printChapters() {
    let temp = 0;
    ul.innerHTML = "";

    for (let i = 1; i <= chapters.length; i++) {
        let li = document.createElement("li");
        let row = document.createElement("div");
        let a = document.createElement("a");
        let div = document.createElement("div");

        // Print seasons
        let h3 = document.createElement("h3");
        if (seasons.includes(i - 1)) {
            h3.innerHTML = `<h3 class='mt-2'>Temporada ${++temp}<h3></h3>`;
            console.log(temp);
            ul.appendChild(h3);
        }

        // Print chapter
        li.classList.add("list-group-item");
        row.classList.add("row");
        a.href = chapters[i - 1];
        a.target = "_blank";
        a.textContent = `Capítulo ${i - seasons[temp - 1]}`;
        a.classList.add("btn", "btn-link", "d-block", "text-left", "col-md-11", "col-10");

        // Check watched chapters
        watchedChap(i, li, a, div);
        div.addEventListener("click", function () {
            toggleWatch(i, div);
            setWatched();
        });

        // Append childs
        row.appendChild(a);
        row.appendChild(div);
        li.appendChild(row);
        ul.appendChild(li);
    }
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

    printChapters();
}
function watchedChap(i, li, a, div) {
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
function setWatched() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", `../php/watched.php?anime=${anime}&user=${user}&w=${w}`, true);
    xhttp.send();
}

printChapters();

// ====================================================== //

let goTop = document.querySelector("div.goTop");

var scrollTop = function () {
    var y = window.scrollY;
    if (y >= 500) {
        goTop.className = "goTop show";
    } else {
        goTop.className = "goTop hide";
    }
};

window.addEventListener("scroll", scrollTop);

goTop.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});
