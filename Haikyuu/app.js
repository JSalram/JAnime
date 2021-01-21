let user = localStorage.getItem("user");
let ul = document.querySelector("ul");
let wHaikyuu = localStorage.getItem("wHaikyuu");
let last = document.querySelector("a.last");

function printChapters() {
    let temp = 1;
    let c = 1;
    ul.innerHTML = `<h3 class='mt-3'>Temporada ${temp}<h3></h3>`;

    for (let i = 1; i <= 73; i++) {
        let li = document.createElement("li");
        let row = document.createElement("div");
        let a = document.createElement("a");
        let div = document.createElement("div");

        li.classList.add("list-group-item");
        row.classList.add("row");
        a.href = `https://haikyuu.top/temporada-${temp}/episodio-${c}/`;
        a.target = "_blank";
        a.textContent = `Capítulo ${i}`;
        a.classList.add("btn", "btn-link", "d-block", "text-left", "col-md-11", "col-10");

        watchedChap(i, li, a, div);
        div.addEventListener("click", function () {
            toggleWatch(i, div);
            setWatched();
        });

        let h3 = document.createElement("h3");
        if (i == 25 || i == 50 || i == 60) {
            c = 0;
            temp++;
            h3.innerHTML = `<h3 class='mt-3'>Temporada ${temp}<h3></h3>`;
        }

        row.appendChild(a);
        row.appendChild(div);
        li.appendChild(row);
        ul.appendChild(li);

        if (h3.textContent != "") {
            ul.appendChild(h3);
        }
        c++;
    }
}

function toggleWatch(i, element) {
    if (element.classList.contains("watch")) {
        element.classList.toggle("watched");
        wHaikyuu = i;
    } else {
        element.classList.toggle("watch");
        wHaikyuu = i - 1;
    }

    localStorage.setItem("wHaikyuu", wHaikyuu);

    printChapters();
}
function watchedChap(i, li, a, div) {
    if (i <= wHaikyuu) {
        li.classList.add("bg-success");
        a.classList.add("text-light");
        div.classList.add("watched");
        if (i == wHaikyuu) {
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
    xhttp.open("GET", "../php/watched.php?anime=Haikyuu&user=" + user + "&w=" + wHaikyuu, true);
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
