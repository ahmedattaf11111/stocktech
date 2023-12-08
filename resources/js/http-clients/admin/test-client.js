const BASE_URL = `tests`;
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
    getTestTypes() {
        return axios.get(`${BASE_URL}/types`);
    },
}