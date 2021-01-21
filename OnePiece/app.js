let user = localStorage.getItem("user");
let ul = document.querySelector("ul");
let wOnePiece = localStorage.getItem("wOnePiece");
let last = document.querySelector("a.last");

function printChapters() {
    ul.innerHTML = "";

    for (let i = 1; i <= 951; i++) {
        let li = document.createElement("li");
        let row = document.createElement("div");
        let a = document.createElement("a");
        let div = document.createElement("div");

        li.classList.add("list-group-item");
        row.classList.add("row");
        a.href = `https://onepiecemovil.com/ver/${i}/`;
        a.target = "_blank";
        a.textContent = `Capítulo ${i}`;
        a.classList.add("btn", "btn-link", "d-block", "text-left", "col-md-11", "col-10");

        watchedChap(i, li, a, div);
        div.addEventListener("click", function () {
            toggleWatch(i, div);
            setWatched();
        });

        row.appendChild(a);
        row.appendChild(div);
        li.appendChild(row);
        ul.appendChild(li);
    }
}

function toggleWatch(i, element) {
    if (element.classList.contains("watch")) {
        element.classList.toggle("watched");
        wOnePiece = i;
    } else {
        element.classList.toggle("watch");
        wOnePiece = i - 1;
    }

    localStorage.setItem("wOnePiece", wOnePiece);

    printChapters();
}
function watchedChap(i, li, a, div) {
    if (i <= wOnePiece) {
        li.classList.add("bg-success");
        a.classList.add("text-light");
        div.classList.add("watched");
        if (i == wOnePiece) {
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
    xhttp.open("GET", "../php/.php?anime=OnePiece&user=" + user + "&w=" + wOnePiece, true);
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