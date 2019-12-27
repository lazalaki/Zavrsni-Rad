import ApiService from './api.service';

const ManagerService = {

    async createManager(managerForm) {
        return await ApiService.post('managers/create', managerForm)
    },

    async getManagers() {
        return await ApiService.get('/managers/without-shop')
    }

    
}

export default ManagerService;