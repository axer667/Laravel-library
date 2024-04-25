import './bootstrap';
import { createApp } from 'vue';
import IncrementCounter from './components/IncrementCounter.vue';
import FormRegistration from "./components/FormRegistration.vue";
import FormLogin from "./components/FormLogin.vue";
import User from "./components/User.vue";
console.log('Hello, employees app!');

const app = createApp({});

app.component('form-registration', FormRegistration);
app.component('form-login', FormLogin);
app.component('user', User);

app.mount('#app');
