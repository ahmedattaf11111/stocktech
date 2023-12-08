const BASE_URL = `web-blogs`;
export default {
    getBlogs(limit) {
        return axios.get(`${BASE_URL}?limit=${limit}`);
    },
    getItems(pageNo, pageSize) {
        return axios.get(`${BASE_URL}?page=${pageNo}&page_size=${pageSize}`);
    },
    getLatestBlogs(limit) {
        return axios.get(`${BASE_URL}/latest?limit=${limit}`);
    },
    getItem(id) {
        return axios.get(`${BASE_URL}/${id}`);
    },

}