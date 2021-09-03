<template>
    <div>
        <h3 class="text-center">Create Category</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCategory">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="category.description">
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
                category: {}
            }
        },
        methods: {
            addCategory() {
                this.axios
                    .post('/api/expense-management/category', this.category)
                    .then(response => (
                        this.$router.push({ name: 'category' })
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