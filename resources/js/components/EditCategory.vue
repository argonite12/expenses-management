<template>
    <div>
        <h3 class="text-center">Edit Category</h3>
        <div class="row">
            <div class="col-md-6">
            
                <form @submit.prevent="updateCategory">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="category.description">
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
                category: {}
            }
        },
        created() {
            this.axios
                .get(`/api/expense-management/category/${this.$route.params.id}`)
                .then((res) => {
                    this.category = res.data;
                });
        },
        methods: {
            updateCategory() {
                this.axios
                    .patch(`/api/expense-management/category/${this.$route.params.id}`, this.category)
                    .then((res) => {
                        this.$router.push({ name: 'category' });
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