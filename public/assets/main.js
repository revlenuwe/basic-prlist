import { createApp } from 'vue'
import ProductEditForm from "./Components/ProductEditForm";

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

app.component('product-edit-form', ProductEditForm)

app.mount('#app')
