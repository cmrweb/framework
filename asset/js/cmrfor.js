class Cmrfor extends HTMLElement {

    constructor() {
        super();
        //console.log('constructor');
        this.style.display = "block";
        

    }

    connectedCallback() {
        //console.log('connectedCallback');
        //let shadom = this.attachShadow({mode:'close'})
        //shadom.innerHTML = this.innerHTML;
        // console.log(this.children);
        // for (let i = 0; i < this.children.length; i++) {
        //    console.log(this.children[i].parentNode)//.style.display = "block";   
        // }
    }

    disconnectedCallback() {
        console.log('disconnectedcallback');
    }

    attachedCallback() {

    }

    attributChangeCallback() {

    }
}
customElements.define("cmr-loop", Cmrfor);