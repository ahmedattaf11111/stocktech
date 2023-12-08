import AdminGuestGuard from "../shared/guards/guest-admin-guard";
import AdminLogin from "../components/dashboard/login.vue";
import DashboardLayout from '../layouts/dashboard-layout';
import CategoryForm from '../components/dashboard/category/item-form';
import CategoryTable from '../components/dashboard/category/item-table';
import MediaManager from '../components/dashboard/media-manager/item-list';
import AuthenticatedAdminGuard from "../shared/guards/authenticated-admin-guard";
import BrandTable from '../components/dashboard/brand/item-table';
import BrandForm from '../components/dashboard/brand/item-form';
import StudentTable from '../components/dashboard/student/item-table';
import StudentForm from '../components/dashboard/student/item-form';
import ContactUsTable from '../components/dashboard/contact-us/item-table';

import GuardianTable from '../components/dashboard/guardian/item-table';
import GuardianForm from '../components/dashboard/guardian/item-form';

import EmployeeTable from '../components/dashboard/employee/item-table';
import EmployeeForm from '../components/dashboard/employee/item-form';
import SessionTable from '../components/dashboard/sessions/index';
import TestTable from '../components/dashboard/tests/index';
import Attendance from '../components/dashboard/attendance/index';
import Notifications from '../components/dashboard/notifications/index';
import Transaction from '../components/dashboard/transaction/index';
import SessionTrace from '../components/dashboard/session-trace/index';
import ContestTable from '../components/dashboard/contest/item-table';
import ContestForm from '../components/dashboard/contest/item-form';
import AboutForm from '../components/dashboard/about/item-form';
import SettingForm from '../components/dashboard/setting/item-form';

import TestRateTable from '../components/dashboard/test-rate/item-table';
import TestRateForm from '../components/dashboard/test-rate/item-form';

import GeneralRateTable from '../components/dashboard/general-rate/item-table';
import GeneralRateForm from '../components/dashboard/general-rate/item-form';


import RateTable from '../components/dashboard/rate/item-table';
import RateForm from '../components/dashboard/rate/item-form';

import PackageTable from '../components/dashboard/package/item-table';
import PackageForm from '../components/dashboard/package/item-form';

import EventTable from '../components/dashboard/event/item-table';
import EventForm from '../components/dashboard/event/item-form';

import SupervisorTable from '../components/dashboard/supervisor/item-table';
import SupervisorForm from '../components/dashboard/supervisor/item-form';

import BlogTable from '../components/dashboard/blog/item-table';
import BlogForm from '../components/dashboard/blog/item-form';

import EmployeePlatformTable from '../components/dashboard/employee-platform/item-table';
import EmployeePlatformForm from '../components/dashboard/employee-platform/item-form';



import StudentProfile from '../components/dashboard/student-profile/index';
import GuardianProfile from '../components/dashboard/guardian-profile/index';
import AccountItemTable from '../components/dashboard/account-item/item-table';
import AccountItemForm from '../components/dashboard/account-item/item-form';

import EmployeeTotalHours from '../components/dashboard/reports/employee-total-hours';
import AttendanceReport from '../components/dashboard/reports/attendances';
import SessionTraceTable from '../components/dashboard/reports/session-trace';
import BestStudentReport from '../components/dashboard/reports/best-students';
import ExpenseRevenueReport from '../components/dashboard/reports/expenses-revenues';
import TransactionReport from '../components/dashboard/reports/transaction-report';

export default [{
    path: "/admin",
    component: DashboardLayout,
    beforeEnter: [
        AuthenticatedAdminGuard
    ],

    children: [
        { path: "categories", component: CategoryTable },
        { path: "categories-form/:id", component: CategoryForm },
        { path: "media-manager", component: MediaManager, name: "media-manager" },
        { path: "brands", component: BrandTable },
        { path: "brands-form/:id", component: BrandForm },
        { path: "students", component: StudentTable, name: "student" },
        { path: "students-form/:id", component: StudentForm },
        { path: "guardians", component: GuardianTable, name: "guardian" },
        { path: "guardians-form/:id", component: GuardianForm },
        { path: "employees", component: EmployeeTable, name: "employee" },
        { path: "employees-form/:id", component: EmployeeForm },
        { path: "sessions", component: SessionTable, name: "session" },
        { path: "tests", component: TestTable, name: "test" },
        
        { path: "attendances", component: Attendance, name: "attendance" },
        { path: "notifications", component: Notifications, name: "notifications" },
        
        { path: "transaction", component: Transaction, name: "transaction" },
        { path: "session-traces", component: SessionTrace, name: "session-trace" },

        { path: "contests", component: ContestTable, name: "contest" },
        { path: "contests-form/:id", component: ContestForm },
        { path: "about-form", component: AboutForm, name: "admin-about" },
        { path: "setting-form", component: SettingForm, name: "admin-setting" },
        { path: "test-rates", component: TestRateTable, name: "test-rate" },
        { path: "test-rates-form/:id", component: TestRateForm },
        { path: "general-rates", component: GeneralRateTable, name: "general-rate" },
        { path: "general-rates-form/:id", component: GeneralRateForm },
        { path: "rates", component: RateTable, name: "rate" },
        { path: "rates-form/:id", component: RateForm },
        { path: "packages", component: PackageTable, name: "package" },
        { path: "packages-form/:id", component: PackageForm },
        { path: "student-profile", component: StudentProfile, name: "student-profile" },
        { path: "guardian-profile", component: GuardianProfile, name: "guardian-profile" },

        { path: "events", component: EventTable, name: "event" },
        { path: "events-form/:id", component: EventForm },

        { path: "platform-employees", component: EmployeePlatformTable, name: "platform-employees" },
        { path: "platform-employees-form/:id", component: EmployeePlatformForm },

        //Financial Account
        { path: "account-item", component: AccountItemTable, name: "account-item" },
        { path: "account-item-form/:id", component: AccountItemForm, },

        { path: "supervisor", component: SupervisorTable, name: "supervisor" },
        { path: "supervisor-form/:id", component: SupervisorForm, },

        { path: "blog", component: BlogTable, name: "admin-blog" },
        { path: "blogs-form/:id", component: BlogForm },

        //Reports
        { path: "employee-total-hours", component: EmployeeTotalHours, name: "employee-total-hours" },
        { path: "attendances-report", component: AttendanceReport, name: "attendances-report" },
        { path: "session-trace-report", component: SessionTraceTable, name: "session-trace-report" },
        { path: "best-student-report", component: BestStudentReport, name: "best-student-report" },
        { path: "expenses-revenues", component: ExpenseRevenueReport, name: "expenses-revenues" },
        { path: "transaction-report", component: TransactionReport, name: "transaction-report" },
        { path: "contact-us", component: ContactUsTable, name: "contact" },

    ]
},
{
    path: "/admin",
    beforeEnter: [AdminGuestGuard],
    children: [
        { path: "login", component: AdminLogin },
    ]
},
];