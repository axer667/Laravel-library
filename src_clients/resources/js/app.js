import './bootstrap';
import { createApp } from 'vue';

console.log('Hello, clients app!');

//const app = createApp({});
//import ExampleComponent from './components/ExampleComponent.vue';
//app.component('example-component', ExampleComponent);

//app.mount('#app');


import App from './App.vue';
import router from './router';

createApp(App).use(router).mount("#app");
