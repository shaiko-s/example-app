import '../css/app.css';
import './bootstrap';

import { createInertiaApp, Head, Link, usePage } from '@inertiajs/vue3';
import { createApp, h, computed } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Layout from './Layouts/GuestLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
      const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
      let page = pages[`./Pages/${name}.vue`]
      page.default.layout = name.startsWith('Public/') ? undefined : (page.default.layout || Layout)
      return page
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
})
