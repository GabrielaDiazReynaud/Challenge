<template>
    <div class="generalContainer">
        <h1 id="title">Lista De <span>Quehaceres</span></h1>
        <div class="headerTitleContainer">
            <Form v-on:taskChange="getTasks()" :taskList="taskList"></Form>
        </div>
        <TaskListing
            v-on:reloadTasks="getTasks()"
            :taskList="taskList"
        ></TaskListing>
    </div>
</template>

<script>
import Form from "./Form.vue";
import TaskListing from "./TaskListing.vue";
import axios from "axios";
import { ref, unref } from "vue";

export default {
    components: {
        Form,
        TaskListing,
    },
    data: function () {
        return {
            taskList: [],
        };
    },
    methods: {
        getTasks() {
            axios.get("http://127.0.0.1:8000/api/tasks").then((response) => {
                this.taskList = response.data;
            });
        },
    },
    created() {
        this.getTasks();
    },
};
</script>

<style scoped>
.generalContainer {
    width: 350px;
    margin: auto;
    margin-top: 20px;
}
.headerTitleContainer {
    background: rgb(238, 238, 238);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    padding-top: 2.5rem;
    padding-bottom: 2.5rem;
    margin: 0.75rem;
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
}
#title {
    font-weight: 900;
    font-size: 3rem;
    line-height: 1;
    text-align: center;
}
span {
    color: #2563eb;
}
</style>
