const BASE_URL = `contests`;
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
    getItems(pageNo, pageSize, text) {
        return axios.get(`${BASE_URL}?page=${pageNo}&page_size=${pageSize}&text=${text}`);
    },
    getItem(id) {
        return axios.get(`${BASE_URL}/${id}`);
    },

    getAllItems() {
        return axios.get(`${BASE_URL}`);
    },

    getEmployees() {
        return axios.get(`${BASE_URL}/employees`);
    },
    getStudents() {
        return axios.get(`${BASE_URL}/students`);
    },
    getContestTypes() {
        return axios.get(`${BASE_URL}/types`);
    },
}