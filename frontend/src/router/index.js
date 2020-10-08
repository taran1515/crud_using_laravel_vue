import Vue from 'vue'
import VueRouter from "vue-router";
import PostList from "@/components/PostList";
import PostDetail from "@/components/PostDetail";
import UserDetail from "@/components/UserDetail";
import Import from "@/components/Import";


Vue.use(VueRouter)


const routes = [{
        path: "/",
        name: "PostList",
        component: PostList
    },
    {
        path: "/post/:id/",
        name: "Detail",
        component: PostDetail
    },
    {
        path: "/user/:id/",
        name: "UserDetail",
        component: UserDetail
    },
    {
        path: "/import/",
        name: "Import",
        component: Import

    }


];

const router = new VueRouter({
    base: '',
    mode: 'history',
    routes
})

export default router;