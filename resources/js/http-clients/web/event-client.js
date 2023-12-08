const BASE_URL = `web-events`;
export default {
    getEvents(limit) {
        return axios.get(`${BASE_URL}?limit=${limit}`);
    },
    getItems(pageNo, pageSize) {
        return axios.get(`${BASE_URL}?page=${pageNo}&page_size=${pageSize}`);
    },
}