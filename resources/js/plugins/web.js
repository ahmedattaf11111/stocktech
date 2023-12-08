import AuthLayout from '../layouts/auth-layout';
import WebLayout from '../layouts/web-layout';
import Register from '../components/auth/register';
import Login from '../components/auth/login';
import ForgetPassword from '../components/auth/forget-password';
import ResetPassword from '../components/auth/reset-password';
import EmailVerification from '../components/web/email-verification';
import Profile from '../components/web/profile';
import Home from '../components/web/home';
import BlogDetails from '../components/web/blog-details';
import Blogs from '../components/web/blogs';
import About from '../components/web/about';

import Events from '../components/web/events';


import Chat from '../components/web/chat';
import AuthenticatedGuard from "../shared/guards/authenticated-guard";
import GuestGuard from "../shared/guards/guest-guard";
export default [
    {
        path: "",
        redirect: "/home"
    },
    {
        path: "",
        component: WebLayout,
        beforeEnter: [
            GuestGuard
        ],
        children: [
            { path: "register", component: Register },
            { path: "login", component: Login },
        ]
    },
    {
        path: "",
        component: WebLayout,
        children: [
            { path: "home", component: Home, name: "home" },
            { path: "blogs/:id", component: BlogDetails, name: "blog" },
            { path: "blogs", component: Blogs, name: "blogs" },
            { path: "about", component: About, name: "about" },
        ]
    },
    {
        path: "",
        component: WebLayout,
        children: [
        ]
    },
    {
        path: "",
        component: WebLayout,
        children: [
            { path: "events", component: Events, name: "events" },
        ]
    },

    {
        path: "",
        component: WebLayout,
        beforeEnter: [
            AuthenticatedGuard
        ],
        children: [
            { path: "chat", component: Chat },
            { path: "verify-email", component: EmailVerification },
            { path: "profile", component: Profile },
        ]
    },

];