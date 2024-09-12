const go_back = document.querySelector("#go-back");

const history_back = () => {

    go_back.addEventListener("click", () => {

        history.back();
    });
};

if (go_back) {
    
    history_back();
}

