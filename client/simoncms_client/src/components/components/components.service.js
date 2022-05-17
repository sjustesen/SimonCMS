import { ComponentModel } from "./components.model";

export class ComponentsService {

    async list() {
        console.dir(`Listing components`)
        let config = { 
            method: 'GET',
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }
        
        return await fetch(`/admin/api/components/list`, config)
            .then(response => response.json())
            .then(data => {
                let model = new ComponentModel();
                model.name = data.name;
                model.alias = data.alias;
                model.status = data.status;
                return model;
            });
    }
    
}

