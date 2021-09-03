<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="col-md-6">
            
                <form @submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" v-model="myuser.username">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="myuser.fname">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="myuser.lname">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" v-model="myuser.email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="myuser.password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" v-model="myuser.role_id">
                            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                myuser: {},
                roles: {}
            }
        },
        created() {
            this.axios
                .get(`/api/user-management/user/${this.$route.params.id}`)
                .then((res) => {
                    this.myuser = res.data;
                });
            this.axios
                .get('/api/user-management/role')
                .then((res) => {
                    this.roles = res.data;
                });
        },
        methods: {
            updateUser() {
                this.axios
                    .patch(`/api/user-management/user/${this.$route.params.id}`, this.myuser)
                    .then((res) => {
                        this.$router.push({ name: 'user' });
                    }).catch(error => {
                        if (error.response.status == 422){
                            
                            var list=[];
                            $.each(error.response.data.errors, function(key, value) {
                                list.push(value);
                            });

                            alert(list.join("\n"));
                            
                        }
                    });
            }
        }        
    }
</script>