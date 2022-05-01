export class DoctypeModel {
    constructor() {
        this.name = '',
        this.alias = '',
        this.template = {
            name: '',
            alias: ''
        },
        this.fields = [];
    }

    // ES5 style setters

    getModel() { return this }
    setModel() {
        // TODO... 
    }
    
    getFields() { return this.fields };
    setFields(fields) { this.fields = fields }
}