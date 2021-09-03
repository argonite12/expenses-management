<template>
    <div>
        <h3 class="text-center">Edit Expenses</h3>
        <div class="row">
            <div class="col-md-6">
            
                <form @submit.prevent="updateExpenses">
                    <div class="form-group">
                        <label>Name</label>
                        <select class="form-control" v-model="myexpense.user_id">
                            <option v-for="user in users" :key="user.id" :value="user.id" >{{ user.fname }} {{ user.lname }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" v-model="myexpense.category_id">
                            <option v-for="cats in category" :key="cats.id" :value="cats.id">{{ cats.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" v-model="myexpense.amount">
                    </div>
                    <div class="form-group">
                        <label>Date Entry</label>
                        <input type="date" class="form-control" v-model="myexpense.date_entry">
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
                myexpense: {},
                users: {},
                category: {}
            }
        },
        created() {
            this.axios
                .get(`/api/expense-management/expenses/${this.$route.params.id}`)
                .then((res) => {
                    this.myexpense = res.data;
                });
            this.axios
                .get('/api/expense-management/category/')
                .then(response => {
                    this.category = response.data;
                });
            this.axios
                .get('/api/user-management/user/')
                .then(response => {
                    this.users = response.data;
                });
        },
        methods: {
            updateExpenses() {
                this.axios
                    .patch(`/api/user-management/user/${this.$route.params.id}`, this.myexpense)
                    .then((res) => {
                        this.$router.push({ name: 'expenses' });
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