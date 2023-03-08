<template>
    <div class="scrollContainer">
        <div  v-for="(taskIndv, index) in taskList" :key="index">
            <Item
                v-on:taskChange="$emit('reloadTasks')"
                :taskIndv="taskIndv"
                :taskList="taskList"
                class="item m-2 px-5 py-5"
            ></Item>
        </div>
    </div>
</template>
<script>
import Item from "./Item.vue";
export default {
    props: ["taskList"],
    components: {
        Item,
    },
};
</script>

<style scoped>
.scrollContainer {
    height: 450px;
    overflow-y: scroll;
}
.item {
    background-color: rgb(238, 238, 238);
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
</style>
