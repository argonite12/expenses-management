<template>
    <div>
        <h3 class="text-center">Create Role</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addRole">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="role.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="role.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                role: {}
            }
        },
        methods: {
            addRole() {
                this.axios
                    .post('/api/user-management/role', this.role)
                    .then(response => (
                        this.$router.push({ name: 'role' })
                    ))
                    .catch(error => {
                        if (error.response.status == 422){
                            
                            var list=[];
                            $.each(error.response.data.errors, function(key, value) {
                                list.push(value);
                            });

                            alert(list.join("\n"));
                            
                        }
                    })
                    .finally(() => this.loading = false)
            }
        }
    }
</script>