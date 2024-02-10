import { createApp, reactive } from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App).use(router);

app.config.globalProperties.$ruta = reactive({ value: 'http://127.0.0.1:8000/api' });
if (localStorage.getItem('isLogged') == 'false') {
    app.config.globalProperties.$token = reactive({ value: 'null' });
} else {
    app.config.globalProperties.$token = reactive({ value: localStorage.getItem('Token') });
}

app.mount('#app');