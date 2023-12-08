const BASE_URL = `products`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    update(formValue) {
        return axios.post(`${BASE_URL}/update`, formValue);
    },
    delete(id) {
        return axios.delete(`${BASE_URL}/${id}`);
    },
    getItems(pageNo, pageSize, category_id, status, text) {
        return axios.get(`${BASE_URL}?page=${pageNo}&page_size=${pageSize}&text=${text}
        &category_id=${category_id !== null && category_id !== -1 ? category_id : ''}
        &status=${status !== null && status !== -1 ? status : ''}`);
    },
    getItem(id) {
        return axios.get(`${BASE_URL}/${id}`);
    },

    getAllItems() {
        return axios.get(`${BASE_URL}`);
    },
    togglePublished(id) {
        return axios.get(`${BASE_URL}/toggle-publish/${id}`);
    },
    getCategories() {
        return axios.get(`${BASE_URL}/categories`);
    },
}