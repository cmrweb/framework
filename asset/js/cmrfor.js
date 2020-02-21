class Cmrfor extends HTMLElement {

    constructor() {
        super();
        console.log('constructor');
   
    }

    connectedCallback() {
        console.log('connectedCallback');
        //let shadom = this.attachShadow({mode:'close'})
        //shadom.innerHTML = this.innerHTML;
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