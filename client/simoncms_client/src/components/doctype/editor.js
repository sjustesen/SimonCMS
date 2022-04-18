import { LitElement, css, html } from "lit";

export default class DoctypeEditor extends LitElement {
    constructor() {
        super();
    }

    registerEventListeners() {

        // event for the save-button
        
        document.querySelector('#btnSaveDoctype').addEventListener('click', (e) => {
            e.preventDefault();
            console.dir('Doctype saving...')
        })

         // event for the addfield-button
       
        document.querySelector('#btnAddField').addEventListener('click', (e) => {
            e.preventDefault();
            const clonedNodes = document.querySelector('#newfields_template').cloneNode(true);
            document.querySelector('#newfields_container').appendChild(clonedNodes);
        });

        // event for adding a new tab

        document.querySelector('#btnAddTab').addEventListener('click', (e) => {
            e.preventDefault();

            let doctypeTabArray = document.querySelector('#dtTabs');
            let listElement = document.createElement('li');
            listElement.setAttribute('class', 'newtab')
            
            let newTabElement = document.createElement('input');
            newTabElement.type = 'text';
            newTabElement.placeholder = 'Tab name';
            newTabElement.setAttribute('class', 'uk-input uk-form-small');
            
            newTabElement.addEventListener('keyup', (e) => {
                e.preventDefault();
                if (e.key == 'Enter') {
                   listElement.innerHTML = `<a href="#">${e.currentTarget.value}</a>`
                   newTabElement.setAttribute('style', 'display: none;');
                  }
            });

            listElement.remove(newTabElement);
            listElement.appendChild(newTabElement);
            doctypeTabArray.prepend(listElement);
        })
    }

    connectedCallback() {
        super.connectedCallback();
        this.registerEventListeners();
    }

    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('simoncms-doctypeeditor', DoctypeEditor)