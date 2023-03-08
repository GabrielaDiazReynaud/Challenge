<template>
    <div class="generalContainer">
      <div class="headerTitleContainer">
        <h1 id="title">Task List</h1>
        <Form v-on:taskChange="getTasks()" :taskList="taskList"></Form>
      </div>
        <TaskListing v-on:reloadTasks="getTasks()" :taskList="taskList"></TaskListing>
 
    </div>
</template>

<script>
import Form from './Form.vue'
import TaskListing from './TaskListing.vue'
import axios from 'axios'
import { ref, unref} from 'vue'

export default{
  components:{
    Form,
    TaskListing
  },
  data:function(){
    return{
      taskList:[]
    }
  },
  methods:{
    getTasks(){
    axios.get('http://127.0.0.1:8000/api/tasks').then(
      response=>{
        this.taskList= response.data;
      }
    );
     },
},
created(){
    this.getTasks();
  }
}
</script>

<style scoped>
.generalContainer{
  width: 350px;
  margin: auto;
}
.headerTitleContainer{
  background: rgb(200, 200, 200);
  padding: 10px;
}
#title {
  text-align: center;
}
</style>