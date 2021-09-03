<template>
    <div>
        <a class="btn btn-success float-left" href="/user-management/user/create">Add</a>
        <h2 class="text-center">User List</h2>        
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="users in user" :key="users.id">
                <td>{{ users.id }}</td>
                <td>{{ users.username }}</td>
                <td>{{ users.fname }} {{ users.lname }}</td>
                <td>{{ users.email }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-user', params: { id: users.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteUser(users.id)">Delete</button>
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
                user: []
            }
        },
        created() {
            this.axios
                .get('/api/user-management/user/')
                .then(response => {
                    this.user = response.data;
                });
        },
        methods: {
            deleteUser(id) { 
                this.axios
                    .delete(`/api/user-management/user/${id}`)
                    .then(response => {
                        let i = this.user.map(data => data.id).indexOf(id);
                        this.user.splice(i, 1)
                    });
            }
        }
    }
</script>