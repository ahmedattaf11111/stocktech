const BASE_URL = `attendances`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    getItems(pageNo, pageSize, text, session_id, same_employee) {
        return axios.get(`${BASE_URL}?page=${pageNo}
        &page_size=${pageSize}
        &text=${text}
        &session_id=${session_id??''}
        &same_employee=${same_employee??''}
        `)


    },
    getEmployees() {
        return axios.get(`${BASE_URL}/employees`);
    },

    getAllSessions() {
        return axios.get(`${BASE_URL}/all-sessions`);
    },

    getStudents() {
        return axios.get(`${BASE_URL}/students`);
    },
    getSessions(empId) {
        return axios.get(`${BASE_URL}/sessions/${empId}`);
    },
}