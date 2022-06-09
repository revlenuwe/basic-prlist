import { createApp } from 'vue'
import ProductEditForm from "./Components/ProductEditForm";
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import RegisterForm from "./Components/RegisterForm";
import LoginForm from "./Components/LoginForm";

const app = createApp({
    /* Twig conflict
    delimiters: ['${', '}'],
    */
    data() {
        return {
            message: 'Test',
        }
    }
})

app.use(VueToast)

app.component('product-edit-form', ProductEditForm)
app.component('register-form', RegisterForm)
app.component('login-form', LoginForm)

app.mount('#app')
