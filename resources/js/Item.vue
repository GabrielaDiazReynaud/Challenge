<template>
    <div class="item">
        <input type="checkbox" @change="updateSelected()" v-model="taskIndv.selected "/>
        <span :class="[taskIndv.selected ? 'done' :'textStyle']">{{taskIndv.task}}</span>
    </div>
</template>
<script>
import axios from 'axios';

export default{
    props:['taskIndv','taskList'],
    methods:{
    updateSelected(){
        console.log(`/taskChange/${this.taskIndv.id}`)
      axios.put(`http://127.0.0.1:8000/api/taskChange/${this.taskIndv.id}`).then(response=>{
        console.log(response.data)
      });
     },
}
}
</script>
<style scoped>
.done{
    text-decoration: line-through;
    color:gray;
}
.textStyle{
    width: 100%;
    margin-left:20px;
}
.item{
    display: flex;
    justify-content:center;
    align-items: center;
}
</style>