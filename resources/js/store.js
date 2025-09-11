import { defineStore } from "pinia";
import { axios } from "./axios";

export const useStore = defineStore("forms", {
    state: () => ({
        forms: {},
        formRows: {},
        formToRowIds: {},
        questions: {},

    }),
    getters: {
        objectForms: (state) => {
            return (id) => Object.values(state.forms).filter((form) => form.is_object).filter((form) => form.id != id);
        },
        questionList: (state) => {
            return Object.values(state.questions);
        },
        formFormRows: (state) => {
            return (formId) => {
                Object.values(state.formRows).filter((formRow) => formRow.form_id == formId)
                    .forEach((formRow) => {
                        if (state.formToRowIds[formRow.form_id] == undefined) {
                            state.formToRowIds[formRow.form_id] = [];
                        }
                        state.formToRowIds[formRow.form_id].push(formRow.id);
                    });
                return state.formToRowIds[formId];
            };
        },
    },
    actions: {
        async fetchForms() {
            const response = await axios.get("/formmaker/form");
            this.forms = response.data;
        },
        async fetchFormRows() {
            const response = await axios.get("/formmaker/form_row");
            this.formRows = response.data;
        },
        async fetchQuestions() {
            const response = await axios.get("/formmaker/question");
            this.questions = response.data;
        },
        addForm(form) {
            this.forms[form.id] = form;
        },
        updateForm(form) {
            this.forms[form.id] = form;
        },
        removeForm(id) {
            delete this.forms[id];
        },
        addQuestion(question) {
            this.questions[question.id] = question;
        },
        updateQuestion(question) {
            this.questions[question.id] = question;
        },
        removeQuestion(id) {
            delete this.questions[id];
        },
    },
});
