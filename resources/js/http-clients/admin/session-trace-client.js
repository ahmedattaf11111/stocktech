const BASE_URL = `session-traces`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    getItems(pageNo, pageSize, text, session_id, student_id) {
        return axios.get(`${BASE_URL}?page=${pageNo}
        &page_size=${pageSize}
        &text=${text}
        &session_id=${session_id ?? ''}
        &student_id=${student_id ?? ''}`)
    },
    getEmployees() {
        return axios.get(`${BASE_URL}/employees`);
    },
    getStudents(empId) {
        return axios.get(`${BASE_URL}/students/${empId}`);
    },
    getAllStudents() {
        return axios.get(`${BASE_URL}/students`);
    },
    getSessions(empId) {
        return axios.get(`${BASE_URL}/sessions/${empId}`);
    },
    getAllSessions() {
        return axios.get(`${BASE_URL}/sessions`);
    },
}