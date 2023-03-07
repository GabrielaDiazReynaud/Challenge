<template>
    <div>
        <div class="mb-3 formStyle">
            <label for="exampleInputEmail1" class="form-label"
                >Tarea</label
            >
            <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
            />
            <button class="btn btn-primary">Agregar</button>
        </div>
       

        <div class="d-grid gap-2">
            <button class="btn btn-primary">Eliminar Tareas Terminadas</button>
            <button class="btn btn-primary">Eliminar Todas Tareas</button>
        </div>
    </div>
</template>
<script>
export default {};
</script>

<style scoped>
 .formStyle{
    display:flex;
    justify-content: center;
    align-items: center;
 }
</style>
