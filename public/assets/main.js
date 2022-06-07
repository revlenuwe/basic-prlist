import { createApp } from 'vue'

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

app.mount('#app')