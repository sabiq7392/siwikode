class Dom {
    $id(element) {
        return document.getElementById(element);
    }

    $class(element) {
        return document.getElementsByClassName(element);
    }

    $tag(element) {
        return document.getElementsByTagName(element);
    }

    $(element) {
        return document.querySelector(element);
    }

    /*
        DOM.id("shorting")
        DOM.$("#shorting") 
        if your using variable in DOM.$:
            DOM.$(`#${shorting}`)
        Recommended if using variable or paramater/argument:
            !!dont use DOM.$ instead DOM.id, .class, .tag!!
    */

    // --------------------------------------------------------

    addClass(element, classList) {    
        for (let i in classList) {
            element.classList.add(classList[i], )
        }
        // For a element & multiple class
    }

    addClassElements(element, classList) {
        for (let i = 0; i < element.length; i++) {
            element[i].classList.add(classList)
        }
        // For multiple elements & a class
    }

    removeClass(element, classList) {
        for (let i in classList) {
            element.classList.remove(classList[i], );
        }
        // For a element & multiple class
    }

    removeClassElements(element, classList) {
        for (let i = 0; i < element.length; i++) {
            element[i].classList.remove(classList)
        }
        // For multiple elements & a class
    }

    toggleClass(element, classList) {
        for (let i in classList) {
            element.classList.toggle(classList[i], );
        }
        // For a element & multiple class
    }

    toggleClassElements(element, classList) {
        for (let i = 0; i < element.length; i++) {
            element[i].classList.toggle(classList)
        }
        // For multiple elements & a class
    }

    containClass(element, classList) {
        for (let i in classList) {
            element.classList.contains(classList[i], );
        }
    }

    /*
        DOM.removeClass, addClass, toggleClass, containClass
        DOM.~(DOM.id("shorting"), ["textUnderline", "yellow"]).
        -----

        DOM.moreAddClass([DOM.id("shorting"), DOM.id("wisataRekreasi")], "yellow")
    */

    // --------------------------------------------------------
    onClick(event) {
        null.addEventListener("click", event);
    }

    onFocus(event) {
        document.addEventListener("focus", event);
    }

    onBlur(event) {
        document.addEventListener("blur", event);
    }

    onHover(event) {
        document.addEventListener("mouseover", event);
    }


}

const DOM = new Dom();

// DOM.$("#shorting").DOM.onClick(event => {console.log(event.target)});
