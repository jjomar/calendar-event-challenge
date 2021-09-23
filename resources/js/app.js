import router from "./router";
import { createApp } from "vue";
import Main from "./layouts/Main.vue";

const app = createApp(Main)

app.use(router);
app.mount('#app');