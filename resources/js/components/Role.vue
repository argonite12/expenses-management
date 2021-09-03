<template>
    <div>
        <a class="btn btn-success float-left" href="/user-management/role/create">Add</a>

        <h2 class="text-center">Role List</h2>        
 
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
            <tr v-for="role in roles" :key="role.id">
                <td>{{ role.id }}</td>
                <td>{{ role.name }}</td>
                <td>{{ role.description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-role', params: { id: role.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteRole(role.id)">Delete</button>
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
                roles: []
            }
        },
        created() {
            this.axios
                .get('/api/user-management/role/')
                .then(response => {
                    this.roles = response.data;
                });
        },
        methods: {
            deleteRole(id) { 
                this.axios
                    .delete(`/api/user-management/role/${id}`)
                    .then(response => {
                        let i = this.roles.map(data => data.id).indexOf(id);
                        this.roles.splice(i, 1)
                    });
            }
        }
    }
</script>