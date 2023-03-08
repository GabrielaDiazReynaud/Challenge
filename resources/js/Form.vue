<template>
    <div>
        <div class="mb-3 formStyle">
            <label for="exampleInputEmail1" class="form-label">Tarea</label>
            <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                v-model="item.task"
            />
            <button @click="addTask()" class="btn btn-primary">Agregar</button>
        </div>

        <div class="d-grid gap-2">
            <button  @click="deleteSelectedTasks()" class="btn btn-primary">Eliminar Tareas Terminadas</button>
            <button class="btn btn-primary">Eliminar Todas Tareas</button>
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
                    console.log(response.status);
                    if (response.status == 200) {
                        this.item.task = "";
                    }
                });
        },
        deleteSelectedTasks() {
            axios
                .delete("http://127.0.0.1:8000/api/tasksDeleteSelected")
                .then((response) => {
                    this.taskList = response.data;
                });
        },
    },
};
</script>

<style scoped>
.formStyle {
    display: flex;
    justify-content: center;
    align-items: center;
}
input {
    padding: 5px;
    margin: 5px;
}
</style>
