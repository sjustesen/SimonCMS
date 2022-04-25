export class TemplateEditorController {
    constructor(host) {
        ((this.host = host)).addController(this);
        this.submit_btn = document.querySelector('#btnSaveTemplate');

    }

    saveTemplate() {
        setTimeout(() => {
            this.submit_btn.classList.remove("button--loading");    

        }, 3000);
        console.dir('We\'re pretend-saving...');

    }

    bindEvents() {
        this.submit_btn.addEventListener('click', () => {
            if (!this.submit_btn.classList.contains('button--loading')) {
                this.submit_btn.classList.add("button--loading");
            } else {
                this.submit_btn.classList.remove("button--loading");    
            }
            this.saveTemplate();
        });
        }


}