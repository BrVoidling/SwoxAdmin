import { defineStore } from "pinia";
import { axios } from "./axios";

export const useStore = defineStore("forms", {
    state: () => ({
        forms: {},
        formToRowIds: {},
        questions: [],
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        async fetchForms() {
            const response = await axios.get("/formmaker/form");
            this.forms = response.data;
        },
        addFrom(form) {
            this.forms[form.id] = form;
        },
        updateForm(form) {
            this.forms[form.id] = form;
        },
        removeForm(id) {
            delete this.forms[id];
        },
    },
});
