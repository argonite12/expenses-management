<template>
    <div>
        <a class="btn btn-success float-left" href="/expense-management/expenses/create">Add</a>
        <h2 class="text-center">Expenses List</h2>        
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Date Entry</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="expense in expenses" :key="expense.id">
                <td>{{ expense.id }}</td>
                <td>{{ expense.name }}</td>
                <td>{{ expense.category }}</td>
                <td>{{ expense.amount }}</td>
                <td>{{ expense.date_entry }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-expenses', params: { id: expense.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteExpenses(expense.id)">Delete</button>
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
                expenses: []
            }
        },
        created() {
            this.axios
                .get('/api/expense-management/expenses/')
                .then(response => {
                    this.expenses = response.data;
                });
        },
        methods: {
            deleteExpenses(id) { 
                this.axios
                    .delete(`/api/expense-management/expenses/${id}`)
                    .then(response => {
                        let i = this.expenses.map(data => data.id).indexOf(id);
                        this.expenses.splice(i, 1)
                    });
            }
        }
    }
</script>