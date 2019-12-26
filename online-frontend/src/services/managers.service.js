import ApiService from './api.service';

const ManagerService = {
    async getManagers() {
        return await ApiService.get('/managers/without-shop')
    }
}

export default ManagerService;