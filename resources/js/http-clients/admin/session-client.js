const BASE_URL = `sessions`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    delete(id) {
        return axios.delete(`${BASE_URL}/${id}`);
    },
    getItems() {
        return axios.get(`${BASE_URL}`);
    },
    getEmployees() {
        return axios.get(`${BASE_URL}/employees`);
    },
}