<template>
    <div>
        <h3 class="text-center">Edit Role</h3>
        <div class="row">
            <div class="col-md-6">
            
                <form @submit.prevent="updateRole">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="roles.name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="roles.description">
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
                roles: {}
            }
        },
        created() {
            this.axios
                .get(`/api/user-management/role/${this.$route.params.id}`)
                .then((res) => {
                    this.roles = res.data;
                });
        },
        methods: {
            updateRole() {
                this.axios
                    .patch(`/api/user-management/role/${this.$route.params.id}`, this.roles)
                    .then((res) => {
                        this.$router.push({ name: 'role' });
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