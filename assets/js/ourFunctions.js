class UploadImage {
    do() {
        this.inputShowWhenClicked()
        this.setBrightnessOpacityImageWhileHover()
    }

    inputShowWhenClicked() {
        DOM.onClick([event => {
            const clickedElement = event.target;
            const uploadImage = {
                input: DOM.$("#image"),
                button: {
                    container: DOM.$("#camera"),
                    icon: DOM.$("#iconCamera"),
                },
            }
            clickedElement == uploadImage.button.container || clickedElement == uploadImage.button.icon ? uploadImage.input.click() : "";
        }])
    }

    setBrightnessOpacityImageWhileHover() {
        DOM.onHover([event => {
            const hoveredElement = event.target;
            const uploadImage = {
                container: DOM.$("#containerImageInForm"),
                input: DOM.$("#image"),
                image: DOM.$("#imageToUpload"),
            }
            if (hoveredElement == uploadImage.container ||  hoveredElement === uploadImage.input || hoveredElement == uploadImage.image) {
                DOM.addClass(uploadImage.input, ["opacityAndFilterForImageInput"]);
                DOM.addClass(uploadImage.image, ["brightnessDown"]);
            } else {
                DOM.removeClass(uploadImage.input, ["opacityAndFilterForImageInput"]);
                DOM.removeClass(uploadImage.image, ["brightnessDown"]);
            }
        }])
    }
}

class ShortingWisata {
    constructor() {
        this.rekreasi = DOM.$("#wisataRekreasi");
        this.kuliner = DOM.$("#wisataKuliner");
        this.button = DOM.$("#shorting").children;
    }

    do() {
        for (let i = 0; i < this.button.length; i++) {
            DOM.onClick([this.button[i], event => {
                const clickedElement = event.target;
                switch (clickedElement) {
                    case this.button[0]:
                        this.show("all");
                        break;
    
                    case this.button[1]:
                        this.remove("wisataKuliner");
                        this.show("wisataRekreasi");
                        break;
    
                    case this.button[2]:
                        this.remove("wisataRekreasi");
                        this.show("wisataKuliner");
                        break;
                }
            }])
        }
    }

    show(wisata) {
        if (wisata === "all") {
            DOM.removeClassElements([DOM.$("#wisataRekreasi"), DOM.$("#wisataKuliner")], "d-none");
        } else {
            DOM.removeClass(DOM.$id(wisata), ["d-none"]);
        }

        this.buttonSetting(wisata)
    }

    remove(wisata) {
        DOM.addClass(DOM.$id(wisata), ["d-none"]);
    }

    buttonSetting(wisata) {
        for (let button of this.button) {
            DOM.removeClass(button, ["backgroundShorting"]);
        }

        switch(wisata) {
            case "wisataKuliner":
                DOM.addClass(this.button[2], ["backgroundShorting"]);
                break;

            case "wisataRekreasi":
                DOM.addClass(this.button[1], ["backgroundShorting"]);
                break;

            default:
                DOM.addClass(this.button[0], ["backgroundShorting"]);
                break;
        }
    }
}

class AnimationInputLabel {
    do() {
        this.add()
        this.remove()
    }

    add() {
        const input = {
            itSelf: DOM.$class("ourInput"),
            label: DOM.$class("ourLabel"),
        }
        for (let i = 0; i < input.itSelf.length; i++) {
            DOM.onFocus([input.itSelf[i], () => {
                if (input.itSelf[i].value == "" && !(input.label[i].classList.contains("labelMovingTop"))) {
                    DOM.addClass(input.label[i], ["labelMovingTop"]);
                }
            }])
            
            if (input.itSelf[i].value != "" && !(input.label[i].classList.contains("labelMovingTop"))){
                DOM.addClass(input.label[i], ["labelMovingTop"])
            } 
        }
    }

    remove() {
        const input = {
            itSelf: DOM.$class("ourInput"),
            label: DOM.$class("ourLabel"),
        }
        for (let i = 0; i < input.itSelf.length; i++) {
            DOM.onBlur([input.itSelf[i], () => {
                if (DOM.containClass(input.label[i], ["labelMovingTop"]) && input.itSelf[i].value == "") {
                    DOM.removeClass(input.label[i], ["labelMovingTop"]);
                }
            }])
        }
    }
}

class ShowHidePassword {
    do() {
        DOM.onClick([(event) => {
            const clickedElement = event.target;
            if (clickedElement === DOM.$("#show")) {
                if (DOM.$("#show").checked == true) {
                    this.show("password", "repeatPassword", "mata", "buta");
                } else {
                    this.hide("password", "repeatPassword", "mata", "buta");
                } 
            }
        }])
    }

    show(password, repeatPassword, mata, buta) {
        DOM.$id(password).setAttribute("type", "text");
        DOM.$id(repeatPassword).setAttribute("type", "text");
        DOM.$id(mata).style.opacity = "0";
        DOM.$id(buta).style.opacity = "1";
    }

    hide(password, repeatPassword, mata, buta) {
        DOM.$id(password).setAttribute("type", "password");
        DOM.$id(repeatPassword).setAttribute("type", "password");
        DOM.$id(mata).style.opacity = "1";
        DOM.$id(buta).style.opacity = "0";
    }
}

class SidebarMove {
    constructor() {
        this.toggled = {
            sidebar: {
                container: DOM.$("#sidebarWrapper"),
                button: {
                    container: DOM.$("#toggleButtonSidebar"),
                    icon : DOM.$("#toggleSidebarIcon"),
                },
            },
            pageContent: DOM.$("#page-content-wrapper"),
        }
    }

    do() {
        DOM.onClick([(event) => {
            const clickedElement = event.target;
            if (clickedElement == this.toggled.sidebar.button.container || clickedElement == this.toggled.sidebar.button.icon) {
                this.setElementToggled()
                if (DOM.containClass(this.toggled.sidebar.container, ["toggled"])) {
                    this.whenRefreshPageContentStill()
                } else {
                    this.clearDataLocalStorage()
                }
            }
        }]);
    }

    setElementToggled() {
        DOM.toggleClassElements(
            [
                this.toggled.sidebar.container, 
                this.toggled.sidebar.button.container,
                this.toggled.sidebar.button.icon,
                this.toggled.pageContent,
            ],
            "toggled"
        );
    }

    whenRefreshPageContentStill() {
        const storeData = {
            sidebar: {
                container: DOM.$("#sidebarWrapper").className,
                button: {
                    container: DOM.$("#toggleButtonSidebar").className,
                    icon: DOM.$("#toggleSidebarIcon").className,
                },
            },
            pageContent: DOM.$("#page-content-wrapper").className,
        }
        STORAGE.push(storeData);
        updateDataToStorage(); 
    }

    clearDataLocalStorage() {
        localStorage.removeItem("dom")
    }
}

function clearLocalStorageWhenLogout() {
    DOM.onClick([DOM.$("#buttonLogout"), () => {
        localStorage.removeItem("dom");
    }]);
}

function animationCreateMenu() {
    DOM.onClick([event => {
        const clickedElement = event.target;
        const animationCreateMenu = {
            button: {
                container: DOM.$("#createButtonFloating"),
                itSelf: DOM.$("#createButtonFloating").children,
            },
            triggered: DOM.$("#floatingElement"),
        }
        for (let i in animationCreateMenu.button.itSelf) {
            if (clickedElement == animationCreateMenu.button.container || clickedElement == animationCreateMenu.button.itSelf[i]) {
                DOM.addClass(animationCreateMenu.triggered, ["d-grid"]);
            }
        }
        if (clickedElement == animationCreateMenu.triggered && animationCreateMenu.triggered.classList.contains("d-grid")) {
            DOM.removeClass(animationCreateMenu.triggered, ["d-grid"]);
        }
    }])
}

function menuNavbarDropdown() {
    DOM.onClick([event => {
        const clickedElement = event.target;
        const dropdown = {
            button: DOM.$("#buttonNavbarDropdown"),
            menu: DOM.$("#menuNavbarDropdown"),
        }
        if (clickedElement == dropdown.button || clickedElement == dropdown.button.firstElementChild) {
            DOM.toggleClass(dropdown.button, ["animationButtonNavbarDropdown"]);
            DOM.toggleClass(dropdown.menu, ["navbarDropdownStyle"]);
        }
    }])
}