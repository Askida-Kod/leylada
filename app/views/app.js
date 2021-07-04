import UIkit from "uikit";
import Icons from "uikit/dist/js/uikit-icons";
UIkit.use(Icons);
import "../../assets/less/theme.less";
window.addEventListener("load", () => {
    var bodyElement = document.getElementById("isbody");
    bodyElement.style.display = "block";
    UIkit.use(Icons);

    var options = {
        cls: "uk-animation-fade",
        delay: 300,
        repeat: true,
    };
    UIkit.scrollspy(".uk-navbar", options);
    UIkit.scrollspy("footer", options);
    UIkit.scrollspy(".uk-section", options);
    UIkit.scrollspy(".tm-animation-item", options);
    UIkit.scrollspy(".uk-article", options);
    UIkit.scrollspy(".uk-navbar-container", options);
});

window.addEventListener("load", () => {
    const aElements = document.getElementsByTagName("a");

    for (let index = 0; index < aElements.length; index++) {
        const element = aElements[index];
        element.addEventListener("click", function (event) {
            if (event.target.href && !event.target.getAttribute("target")) {
                event.preventDefault();
                var bodyElement = document.getElementById("isbody");
                bodyElement.classList.add("uk-animation-reverse");
                bodyElement.classList.add("uk-animation-fade");
                setTimeout(() => {
                    window.location = event.target.href;
                }, 500);
            }
        });
    }
});

