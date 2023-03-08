<template>
    <div>
        <div class="mb-3 d-flex justify-content-center align-items-center">
            <label for="taskinput" class="form-label">Tarea</label>
            <input
                type="text"
                class="m-2 p-1"
                id="taskinput"
                aria-describedby="taskHelp"
                v-model="item.task"
            />
            <button @click="addTask()" class="btn btn-success">Agregar</button>
        </div>

        <div class="d-grid gap-2">
            <button  @click="deleteSelectedTasks()" class="btn btn-primary">Eliminar Tareas Terminadas</button>
            <button @click="deleteAllTasks()" class="btn btn-dark">Eliminar Todas Las Tareas</button>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data: function () {
        return {
            item: {
                task: "",
            },
        };
    },
    methods: {
        addTask() {
            if (this.item.task === "") {
                return;
            }
            axios
                .post("http://127.0.0.1:8000/api/addTask", {
                    task: this.item.task,
                })
                .then((response) => {
                    if (response.status == 200) {
                        this.item.task = "";
                        this.$emit('taskChange');
                    }
                });
               
        },
        deleteSelectedTasks() {
            axios
                .delete("http://127.0.0.1:8000/api/tasksDeleteSelected")
                .then((response) => {
                    this.$emit('taskChange');
                });
        },

        deleteAllTasks() {
            axios
                .delete("http://127.0.0.1:8000/api/tasksAll")
                .then((response) => {
                    this.$emit('taskChange');
                });
        },
    },
};
</script>


