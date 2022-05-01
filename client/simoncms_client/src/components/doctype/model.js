export class DoctypeModel {
    constructor() {
        this._name = '';
        this._alias = '';

        this._template = {
            name: '',
            alias: ''
        };

        this._fields = [];
    }

    // ES5 style setters
    get name(){
        return this._name;
    }

    set name(value) {
        this._name = value;
    }
    
    get alias(){
        return this._alias;
    }

    set alias(value) {
        this._alias = value;
    }

    getModel() { return this }
    setModel() {
        // TODO... 
    }
    
    getFields() { return this._fields };
    setFields(fields) { this._fields = fields }
}
