import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { createApp, h, toRaw } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Layout from './Layouts/GuestLayout.vue';

import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const page = ref(usePage());
console.log('page', page);

const value = ref(page.value);
console.log('page.value', value);

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
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
})
