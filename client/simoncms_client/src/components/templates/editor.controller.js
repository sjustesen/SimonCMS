export class TemplateEditorController {
    constructor(host) {
        ((this.host = host)).addController(this);
        self = this;
        self.submit_btn = document.querySelector('#btnSaveTemplate');
    }

    saveTemplate() {
        setTimeout(() => {
            self.submit_btn.classList.remove("button--loading");    

        }, 3000);
        console.dir('We\'re pretend-saving...');

    }

    bindEvents() {
        self.submit_btn.addEventListener('click', function(e) {
            if (!self.submit_btn.classList.contains('button--loading')) {
                self.submit_btn.classList.add("button--loading");
            } else {
                self.submit_btn.classList.remove("button--loading");    
            }
            self.saveTemplate();
        });
        }


}