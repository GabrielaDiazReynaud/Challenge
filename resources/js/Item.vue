<template>
    <div class="item">
        <input type="checkbox" @change="updateSelected()" v-model="taskIndv.selected "/>
        <span :class="[taskIndv.selected ? 'done' :'textStyle']">{{taskIndv.task}}</span>
    </div>
</template>
<script>
export default{
    props:['taskIndv']
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