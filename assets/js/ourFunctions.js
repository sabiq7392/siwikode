class Wisata {
    constructor(wisata) {
        this.wisata = wisata;
        this.shortingButton = DOM.$("#shorting").children
    }

    showAll() {
        for (let myWisata of this.wisata) {
            DOM.removeClass(DOM.$id(myWisata), ["d-none"]);
        }
        for (let i = 0; i < this.shortingButton.length; i++) {
            DOM.removeClass(this.shortingButton[i], ["textUnderline"]);
            DOM.addClass(this.shortingButton[0], ["textUnderline"]);
        }
    }

    show() {
        DOM.removeClass(DOM.$id(this.wisata), ["d-none"]);

        switch(this.wisata) {
            case "wisataKuliner":
                DOM.addClass(this.shortingButton[2], ["textUnderline"]);
                break;

            case "wisataRekreasi":
                DOM.addClass(this.shortingButton[1], ["textUnderline"]);
                break;

            default:
                DOM.addClass(this.shortingButton[0], ["textUnderline"]);
                break;
        }
    }

    hide() {
        DOM.addClass(DOM.$id(this.wisata), ["d-none"]);

        for (let myShortingButton of this.shortingButton) {
            DOM.removeClass(myShortingButton, ["textUnderline"]);
        }
    }
}