const BASE_URL = `reports`;
export default {
    getTotalHoursReport(start, end, employee_id) {
        return axios.get(`${BASE_URL}/total-hours?
        start=${start ?? ''}
        &end=${end ?? ''}
        &employee_id=${employee_id ?? ''}
        `);
    },
    getAttendancesReport(start, end, item_id, type) {
        return axios.get(`${BASE_URL}/attendances?
        start=${start ?? ''}
        &end=${end ?? ''}
        &type=${type ?? ''}
        &item_id=${item_id ?? ''}
        `);
    },
    getTotalExpensesRevenues(start, end) {
        return axios.get(`${BASE_URL}/total-expenses-revenues?
        start=${start ?? ''}
        &end=${end ?? ''}`);
    },
    getExpensesRevenues(page, pageSize, start, end, account_item_id) {
        return axios.get(`${BASE_URL}/expenses-revenues?
        page=${page}
        &page_size=${pageSize}
        &start=${start ?? ''}
        &end=${end ?? ''}
        &account_item_id=${account_item_id ?? ''}`);
    },
    getSessionTrace(start, end, employee_id) {
        return axios.get(`${BASE_URL}/session-traces?
        start=${start ?? ''}
        &end=${end ?? ''}
        &employee_id=${employee_id ?? ''}`);
    },

    getBestStudentsReport(limit) {
        return axios.get(`${BASE_URL}/best-students?limit=${limit ?? ''}`);
    },

    getEmployees() {
        return axios.get(`${BASE_URL}/employees`);
    },
    getAccountItems() {
        return axios.get(`${BASE_URL}/account-items`);
    },
    
    getStudents() {
        return axios.get(`${BASE_URL}/students`);
    },
}