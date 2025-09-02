import { defineStore } from "pinia";

export const useStore = defineStore("forms", {
    state: () => ({
        forms: [],
        formToRowIds: {},
        questions: [],
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        addFrom(form) {
            this.forms.push(form);
        },
        updateForm(form) {
            this.forms = this.forms.map((f) => {
                if (f.id === form.id) {
                    return form;
                }
                return f;
            });
        },
        removeForm(id) {
            this.forms = this.forms.filter((f) => f.id !== id);
        },
    },
});
