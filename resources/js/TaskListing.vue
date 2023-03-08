<template>
    <div class="scrollContainer">
        <div  v-for="(taskIndv, index) in taskList" :key="index">
            <Item
                v-on:taskChange="$emit('reloadTasks')"
                :taskIndv="taskIndv"
                :taskList="taskList"
                class="item"
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
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    padding-top: 2.5rem;
    padding-bottom: 2.5rem;
    margin: 0.75rem;
    background-color: rgb(238, 238, 238);
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
</style>
