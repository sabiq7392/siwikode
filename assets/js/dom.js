let STORAGE = [];

if (isStorageExist()) {
    const getDataInStorage = localStorage.getItem("dom");
    let theDataParsed = JSON.parse(getDataInStorage);

    theDataParsed != null ? STORAGE = theDataParsed : "";

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
if(DOM.$("#show")) {
    const showHidePassword = new ShowHidePassword()
    showHidePassword.do();
}

// ===== Upload Photo User =====
if (DOM.$("#image")) {
    const uploadImage = new UploadImage()
    uploadImage.do()
}

// ==================== Dropdown =========================
if (DOM.$("#menuNavbarDropdown")) {
    menuNavbarDropdown()
}

// ==================== Animation Create Menu =========================
if (DOM.$("#createButtonFloating")) {
    animationCreateMenu()
}

// ==================== Logout Button =========================
if (DOM.$("#buttonLogout")) {
    clearLocalStorageWhenLogout()
}

// ==================== Toggled =========================
if (DOM.$("#sidebarWrapper")) {
    const sidebarMove = new SidebarMove()
    sidebarMove.do()
}

// ==================== Shorting Wisata =========================
if (DOM.$("#shorting")) {
    const shortingWisata = new ShortingWisata()
    shortingWisata.do()
}

// ==================== Animation Input Label for Form Login & Registration =========================
if (DOM.$class(".ourInput")) {
    const animationInputLabel = new AnimationInputLabel()
    animationInputLabel.do()
}

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