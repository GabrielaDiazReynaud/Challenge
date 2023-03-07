<template>
    <div>
        <h1>Lista de Tarea</h1>
        <h2>{{ taskList[0] }}</h2>
    </div>
</template>

<script>
import axios from 'axios'
import { ref, unref} from 'vue'

export default{
  setup() {
  const taskList = ref([]);
  taskList.value.push(1);

  function getTasks(){
    axios.get('http://127.0.0.1:8000/api/tasks').then(
      response=>{
        console.log(response);
      }
    );
  }
  getTasks();
    return {
      taskList
    }
  },

}
</script>