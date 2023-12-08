const BASE_URL = `test-rates`;
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
    getStudents(employeeId) {
        return axios.get(`${BASE_URL}/students/${employeeId}`);
    },
    getTests(employeeId) {
        return axios.get(`${BASE_URL}/tests/${employeeId}`);
    },
}