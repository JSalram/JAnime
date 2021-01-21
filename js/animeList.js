function getAnime(anime) {
    let chapters = [];

    switch (anime) {
        case "OnePiece":
            for (let i = 1; i <= 950; i++) {
                chapters.push(`https://onepiecemovil.com/ver/${i}/`);
            }
            break;
        case "CodeGeass":
            let chaps = [
                "9LpxVKxC#NaBAaXwDxAE7RM3-_zmROn_Dqog9FsJrfVKhabzuKyA",
                "hThTgazT#GyfjNUsP5s3jWjbojEwVx04pk91_SazH9LlBHaWJVwI",
                "sH41hQCZ#eUH8EHWKuGnNwf9yYU_blDG89AFIAVGjsK7M2x7g4fg",
                "5H4D1SZR#cRVTlX6oCos8aikrXjuPzj_pzLoKOpFWPWGb1CPmaz4",
                "UahkDLxI#d23T9Rn3XqozQ-Cia-mIyiskztxGJYV0EBGldWqzsww",
                "FDpWWJQb#LVjDYSnGuYVuoUQXQ4Dyf3hg32RvhIZfIGKEPy8thpk",
                "QK5UlZAS#Q-9uiEWTQBQ6YJX24yAnwlyoqqVH21b8LPDhn-zLgNI",
                "dH40kT6a#Gxqz1Wx0bVLebI38aXv9FkjbzPYi3Jmegia-AFt_wuM",
                "Me5QSbpA#cuvnajQHNddukPBvv8wmCSSb4xwXZXTTckBLorMRYwI",
                "RbxSjLCR#cjijqkYjNgyE9BrJeKge3i47c-pS48odw4508h8YwJ4",
                "pH4gSJrA#Q4SApzF6YXKfOiV89f2URxDgeuYPMldr3EL_KaOuIHQ",
                "Ye4mnbgL#JZ1h-XLkLMZL0w2-dZ2DG3P9gl47tO9NH9WyoU7XAic",
                "YWoiETwA#Y0cWcCcvrJ4fsVd4sYV7wnn-xhQpfdPwXN0OF-79WpU",
                "0D5EkZjR#CJEsUXWZRjTD6MYarqUCwykjUltVpLFHtqge8v1b_0A",
                "kSxkRRaC#aePrrCrDDkxtbl1hfmbSLG_yGRlyYiDKKmoYfUA5WWo",
                "MGxSQJhK#CXFdM1v-JR2d_IwFwSXpnlAwB5l_e_or2-TE4flYo7c",
                "YO5wyLbY#NLK2-mRD9YYrdP5Khb_H5hvFKURYr2b2USD1D613Vi4",
                "VDpkiZSJ#BaRv5z6rSUz9yw14xd5CL1Y6iZdcaxFK44hxEfoIkf4",
                "gHpWEbaR#BmMFOw_KNVt7i11DT7CGqjGbGllSlBC1bxdgFQvTW8Q",
                "oWo2wBSA#KcKwiW2Jq3YE5XGCP0Z_Hmr0AghXZX7NBCLmsSfq8XU",
                "obxC3Raa#Ibw9_0zewqATiORkn7O_d2v-FrZzHNrYNvBqT_boIDs",
                "oChUCDZJ#X6b1pE_kb-vACJg-gFjzrHUNe_1VY2znoyUIdvd6xEk",
                "gf5A1bSR#CNvgyU9kKPUzpYPbGjwrOzV1DHIPJSA0LCKMByUCjy4",
                "1bpyxDqD#DUohXi3ZHEL1FtG0zzzjrCSKEtkxZYWbnDnJjZ5M6Pw",
                "lXxAFRLI#bJ3-uH-8kQRKFrAWH4zftgHLbdFWZ6SCeQZB0WajPYw",
            ];
            chaps.forEach((url) => {
                chapters.push(`https://mega.nz/embed/${url}/`)
            });
            break;
    }
    return chapters;
}

export { getAnime };
