let STORAGE = [];

if (isStorageExist()) {
    const getDataInStorage = localStorage.getItem("dom");
    let theDataParsed = JSON.parse(getDataInStorage);

    theDataParsed != null ? STORAGE = theDataParsed : "";

    // if(theDataParsed != null) {
    //     STORAGE = theDataParsed;
    // }

    const storedDOM = {
        sidebar: {
            container: DOM.$("#sidebarWrapper"),
            button: {
                container: DOM.$("#toggleButtonSidebar"),
                icon: DOM.$("#toggleSidebarIcon")
            },
        },
        pageContent: DOM.$("#page-content-wrapper"),
    }

    if (storedDOM.sidebar) {
        for (storage of STORAGE) {
            storedDOM.sidebar.container.className = storage.sidebar.container;
            storedDOM.sidebar.button.container.className = storage.sidebar.button.container;
            storedDOM.sidebar.button.icon.className = storage.sidebar.button.icon;
            storedDOM.pageContent.className = storage.pageContent;
        } 
    } 
}

// ====== Show Hide Password ======
if(DOM.$("#showLogin") || DOM.$("#showRegistration")) {
    document.addEventListener("click", event => {
        clickedElement = event.target;
        switch (clickedElement) {
            case DOM.$("#showLogin"):
                showHidePassword(
                    "showLogin", 
                    "passwordLogin", 
                    "repeatPasswordLogin" /*HIDDEN*/ , 
                    "mataLogin", 
                    "butaLogin"
                );
                break;
            
            case DOM.$("#showRegistration"):
                showHidePassword(
                    "showRegistration", 
                    "passwordRegistration", 
                    "repeatPasswordRegistration", 
                    "mataRegistration", 
                    "butaRegistration"
                );
                break;
    
            default:
                false;
                break;
        }
    });
}

// ===== Upload Photo User =====
if (DOM.$("#camera")) {
    const uploadPhoto = {
        input: DOM.$("#image"),
        button: {
            container: DOM.$("#camera"),
            icon: DOM.$("#iconCamera"),
        },
    }
    document.addEventListener("click", event => {
        clickedElement = event.target;

        clickedElement == uploadPhoto.button.container || clickedElement == uploadPhoto.button.icon ? uploadPhoto.input.click() : "";
    });
}

// ==================== Dropdown =========================
if (DOM.$("#menuNavbarDropdown")) {
    const dropdown = {
        button: DOM.$("#buttonNavbarDropdown"),
        menu: DOM.$("#menuNavbarDropdown")
    }

    document.addEventListener("click", (event) => {
        clickedElement = event.target;

        if (clickedElement == dropdown.button || clickedElement == dropdown.button.firstElementChild) {
            DOM.toggleClass(dropdown.button, ["animationButtonNavbarDropdown"])
            DOM.toggleClass(dropdown.menu, ["navbarDropdownStyle"]);
        }
    });
}

// ==================== Animation Create Menu =========================
if (DOM.$("#createButtonFloating")) {
    const animationCreateMenu = {
        button: {
            container: DOM.$("#createButtonFloating"),
            itSelf: DOM.$("#createButtonFloating").children,
        },
        triggered: DOM.$("#floatingElement"),
    }
    
    document.addEventListener("click", event => {
        clickedElement = event.target;
        for (let i in animationCreateMenu.button.itSelf) {
            if (clickedElement == animationCreateMenu.button.container || clickedElement == animationCreateMenu.button.itSelf[i]) {
                DOM.addClass(animationCreateMenu.triggered, ["d-grid"]);
            }
        }
        if (clickedElement == animationCreateMenu.triggered && animationCreateMenu.triggered.classList.contains("d-grid")) {
            DOM.removeClass(animationCreateMenu.triggered, ["d-grid"]);
        }
    });
}

// ==================== Logout Button =========================
if (DOM.$("#buttonLogout")) {
    DOM.$("#buttonLogout").addEventListener("click", () => {
        localStorage.removeItem("dom")
    });
}

// ==================== Toggled =========================
if (DOM.$("#sidebarWrapper")) {
    const toggled = {
        sidebar: {
            container: DOM.$("#sidebarWrapper"),
            button: {
                container: DOM.$("#toggleButtonSidebar"),
                icon :DOM.$("#toggleSidebarIcon"),
            },
        },
        pageContent: DOM.$("#page-content-wrapper"),
    }
    
    document.addEventListener("click", (event) => {
        clickedElement = event.target;
        if (clickedElement == toggled.sidebar.button.container || clickedElement == toggled.sidebar.button.icon) {
            DOM.toggleClassElements(
                [
                    toggled.sidebar.container, 
                    toggled.sidebar.button.container,
                    toggled.sidebar.button.icon,
                    toggled.pageContent,
                ],
                "toggled"
            );
    
            const storeDOMClass = {
                sidebar: {
                    container: toggled.sidebar.container.className,
                    button: {
                        container: toggled.sidebar.button.container.className,
                        icon: toggled.sidebar.button.icon.className,
                    },
                },
                pageContent: toggled.pageContent.className,
            }       

            STORAGE.push(storeDOMClass);
            updateDataToStorage();
    
            DOM.containClass(toggled.sidebar.container, "toggled") === false ? localStorage.removeItem("dom") : false;
        }
    })
}

// ==================== Shorting Wisata =========================
if (DOM.$("#shorting")) {
    const wisata = {
        rekreasi: new Wisata("wisataRekreasi"),
        kuliner: new Wisata("wisataKuliner"),
        all: new Wisata(["wisataRekreasi", "wisataKuliner"]),
        button: DOM.$("#shorting").children,
    }

    for (let i = 0; i < wisata.button.length; i++) {
        wisata.button[i].addEventListener("click", event => {
            clickedElement = event.target;
            switch (clickedElement) {
                case wisata.button[0]:
                    wisata.all.showAll();
                    break;

                case wisata.button[1]:
                    wisata.kuliner.hide();
                    wisata.rekreasi.show();
                    break;

                case wisata.button[2]:
                    wisata.rekreasi.hide();
                    wisata.kuliner.show();
                    break;
            }
        });
    }
}

// ==================== Animation Input Label for Form Login & Registration =========================
// ===== Add  ======
if (DOM.$class(".ourInput")) {
    const input = {
        itSelf: DOM.$class("ourInput"),
        label: DOM.$class("ourLabel"),
    }

    for (let i = 0; i < input.itSelf.length; i++) {
        input.itSelf[i].addEventListener("focus", () => {
            if (input.itSelf[i].value == "" && !(input.label[i].classList.contains("labelMovingTop"))) {
                DOM.addClass(input.label[i], ["labelMovingTop"]);
            }
        });
    
        // if input have value label go up 
        if (input.itSelf[i].value != "" && !(input.label[i].classList.contains("labelMovingTop"))){
            DOM.addClass(input.label[i], ["labelMovingTop"])
        } 
    }

    //===== Remove ======
    for (let i = 0; i < input.itSelf.length; i++) {
        input.itSelf[i].addEventListener("blur", () => {
            if (input.label[i].classList.contains("labelMovingTop") && input.itSelf[i].value == "") {
                DOM.removeClass(input.label[i], ["labelMovingTop"]);
            }
        });
    }
}
// ========================= HOVER ELEMENT =======================
document.addEventListener("mouseover", (event) => {
    hoveredElement = event.target;

    const containerImageInForm = document.getElementById("containerImageInForm");
    const imageToUpload = document.getElementById("imageToUpload");
    const inputImageInForm = document.getElementById("image");
    if (inputImageInForm) {
        if (hoveredElement == containerImageInForm || hoveredElement == imageToUpload || hoveredElement == inputImageInForm) {
            inputImageInForm.classList.add("opacityAndFilterForImageInput");
            imageToUpload.classList.add("brightnessDown")
        } else {
            inputImageInForm.classList.remove("opacityAndFilterForImageInput");
            imageToUpload.classList.remove("brightnessDown");
        }
    }
});

// ===================== FUNCTION ====================

function isStorageExist() {
    if(typeof(Storage) === undefined) {
        alert("Your browser doesn't support Local Storage, try another browser such as Mozilla Firefox or Google Chrome or update your browser");
        return false;
    } 
    return true;
}

function updateDataToStorage() {
    let convertToString = JSON.stringify(STORAGE);
    localStorage.setItem("dom", convertToString);
}

function showHidePassword(show, password, repeatPassword, mata, buta) {
    if (DOM.$id(show).checked == true) {
        DOM.$id(password).setAttribute("type", "text");
        DOM.$id(repeatPassword).setAttribute("type", "text");
        DOM.$id(mata).style.opacity = "0";
        DOM.$id(buta).style.opacity = "1";

    } else {
        DOM.$id(password).setAttribute("type", "password");
        DOM.$id(repeatPassword).setAttribute("type", "password");
        DOM.$id(mata).style.opacity = "1";
        DOM.$id(buta).style.opacity = "0";
    }
}