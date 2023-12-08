const BASE_URL = `transactions`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    getItems(pageNo, pageSize, text, account_item_id) {
        return axios.get(`${BASE_URL}?page=${pageNo}
        &page_size=${pageSize}
        &text=${text}
        &account_item_id=${account_item_id ?? ''}`)
    },
    getEmployees() {
        return axios.get(`${BASE_URL}/employees`);
    },
    getStudents() {
        return axios.get(`${BASE_URL}/students`);
    },
    getAccountItems() {
        return axios.get(`${BASE_URL}/account-items`);
    },
}