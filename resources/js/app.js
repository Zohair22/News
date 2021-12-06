import { createApp, h } from 'vue'
import {app, createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from "@inertiajs/progress";
import Layout from "./Shared/Layout";

createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;
        if (page.layout === undefined){
            page.layout = Layout;
        }
        return page;
    },
    setup({ el, App, props, plugin}) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link)
            .component('Head', Head)
            .mount(el)
    },
    title: (title) => `${title}` ?? 'News'
});
InertiaProgress.init({
    delay: 250,
    color: 'teal',
    includeCSS: true,
    showSpinner: true,
})




