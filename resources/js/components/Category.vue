<template>
    <div>
        <a class="btn btn-success float-left" href="/expense-management/category/create">Add</a>

        <h2 class="text-center">Category List</h2>        
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories" :key="category.id">
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
                <td>{{ category.description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-category', params: { id: category.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteCategory(category.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                categories: []
            }
        },
        created() {
            this.axios
                .get('/api/expense-management/category/')
                .then(response => {
                    this.categories = response.data;
                });
        },
        methods: {
            deleteCategory(id) { 
                this.axios
                    .delete(`/api/expense-management/category/${id}`)
                    .then(response => {
                        let i = this.categories.map(data => data.id).indexOf(id);
                        this.categories.splice(i, 1)
                    });
            }
        }
    }
</script>