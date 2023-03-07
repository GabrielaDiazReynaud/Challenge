<template>
    <div>
       <div v-for="(taskIndv,index) in taskList" :key="index">
        <Item :taskIndv="taskIndv" :taskList="taskList" class="item"></Item>
    </div>
    </div>
</template>
<script>
import Item from './Item.vue'
export default {
    props:['taskList'],
    components:{
        Item
    }
}
</script>

<style scoped>
    .item{
        background: rgb(228, 227, 227);
        padding:5px;
        margin-top: 5px;
    }
</style>