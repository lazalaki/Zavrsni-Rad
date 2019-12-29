import ApiService from './api.service'

const ArticlesService = {

    async createArticles(articleForm, id) {
        return await ApiService.post('/articles/create/' + id, articleForm)
    },

    async getArticles() {
        return await ApiService.get('/articles')
    }
}

export default ArticlesService