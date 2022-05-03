export class EditorModel {
    constructor() {
        this._name = '',
        this._alias = '',
        this._template = ''
    }

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

    get template(){
        return this._template;
    }

    set template(value) {
        this._template = value;
    }
}