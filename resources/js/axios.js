import axios from "axios";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["X-CSRF-TOKEN"] = window.Laravel.csrfToken;

axios.defaults.baseURL = "/";

export {axios};
