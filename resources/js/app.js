import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import {createPinia} from "pinia";
import {authPlugin} from "./utils/pinia";

InertiaProgress.init()

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.config.globalProperties.$route = window.route;
        app.provide('auth', {user: props.initialPage.props.auth, login: false});
        app.provide('cart', {

        })

        const pinia = createPinia();
        app.use(pinia)
        pinia.use(authPlugin)

        app.mount(el);
    },
})
