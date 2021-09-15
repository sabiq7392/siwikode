class Dom {
    $id(element) {return document.getElementById(element)}

    $class(element) {return document.getElementsByClassName(element)}

    $tag(element) {return document.getElementsByTagName(element)}

    $(element) {return document.querySelector(element)}

    /*
        DOM.id("shorting")
        DOM.$("#shorting") 
        if your using variable in DOM.$:
            DOM.$(`#${shorting}`)
        Recommended if using variable or paramater/argument:
            !!dont use DOM.$ instead DOM.id, .class, .tag!!
    */

    // --------------------------------------------------------
    // == For a element & multiple class ==
    addClass(element, classList) {    
        for (let i in classList) {
            element.classList.add(classList[i], )
        }
    }

    removeClass(element, classList) {
        for (let i in classList) {
            element.classList.remove(classList[i], );
        }
    }

    toggleClass(element, classList) {
        for (let i in classList) {
            element.classList.toggle(classList[i], );
        }
    }

    containClass(element, classList) {
        for (let i in classList) {
            return element.classList.contains(classList[i], );
        }
    }

    // == For multiple elements & a class ==
    addClassElements(element, classList) {
        for (let i in element) {
            element[i].classList.add(classList)
        }
    }

    removeClassElements(element, classList) {
        for (let i in element) {
            element[i].classList.remove(classList)
        }
    }

    toggleClassElements(element, classList) {
        for (let i in element) {
            element[i].classList.toggle(classList)
        }
    }

    containsClassElements(element, classList) {
        for (let i in element) {
            element[i].classList.contains(classList)
        }
    }

    /*
        DOM.removeClass, addClass, toggleClass, containClass
        DOM.~(DOM.id("shorting"), ["textUnderline", "yellow"]).
        -----

        DOM.moreAddClass([DOM.id("shorting"), DOM.id("wisataRekreasi")], "yellow")
    */

    // --------------------------------------------------------
    onClick(element) {
        switch (element.length) {
            case 1:
                document.addEventListener("click", element[0])
                break;

            case 2:
                element[0].addEventListener("click", element[1])
                break;

            default:
                element[0].addEventListener("click", element[1], element[2])
                break
        }
    }

    onFocus(element) {
        switch (element.length) {
            case 1:
                document.addEventListener("focus", element[0])
                break;

            case 2:
                element[0].addEventListener("focus", element[1])
                break;

            default:
                element[0].addEventListener("focus", element[1], element[2])
                break
        }
    }

    onBlur(element) {
        switch (element.length) {
            case 1:
                document.addEventListener("blur", element[0])
                break;

            case 2:
                element[0].addEventListener("blur", element[1])
                break;

            default:
                element[0].addEventListener("blur", element[1], element[2])
                break
        }
    }

    onHover(element) {
        switch (element.length) {
            case 1:
                document.addEventListener("mouseover", element[0])
                break;

            case 2:
                element[0].addEventListener("mouseover", element[1])
                break;

            default:
                element[0].addEventListener("mouseover", element[1], element[2])
                break
        }
    }

    /*
        HOW TO USE
        DOM.onClick([(event) => {
            ~ Your Code
        }])

        DOM.onClick([DOM.$("#shorting"), (event) => {
            ~ Your Code
        }])

        DOM.onClick([DOM.$("#shorting"), (event) => {
            ~ Your Code
        }, true])
    */
}
const DOM = new Dom();