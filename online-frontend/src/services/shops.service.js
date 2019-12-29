import ApiService from './api.service';

const ShopService = {

    async createShop(shopForm) {
        return await ApiService.post('shops/create', shopForm)
    },

    async getShops() {
        return await ApiService.get('/shops')
    },
    async getShopById(id) {
        return await ApiService.get('/shops/' + id);
    },
    async getMore(offset) {
        return await ApiService.get('/shops-more?offset=' + offset);
    }
}

export default ShopService;




    