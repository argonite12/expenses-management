//User
import User from './components/User.vue';
import CreateUser from './components/CreateUser.vue';
import EditUser from './components/EditUser.vue';
//Role
import Role from './components/Role.vue';
import CreateRole from './components/CreateRole.vue';
import EditRole from './components/EditRole.vue';
//Category
import Category from './components/Category.vue';
import CreateCategory from './components/CreateCategory.vue';
import EditCategory from './components/EditCategory.vue';
 
export const routes = [
    {
        name: 'user',
        path: '/user-management/user',
        component: User
    },
    {
        name: 'create-user',
        path: '/user-management/user/create',
        component: CreateUser
    },
    {
        name: 'edit-user',
        path: '/user-management/user/edit/:id',
        component: EditUser
    },

    // ROLE

    {
        name: 'role',
        path: '/user-management/role',
        component: Role
    },
    {
        name: 'create-role',
        path: '/user-management/role/create',
        component: CreateRole
    },
    {
        name: 'edit-role',
        path: '/user-management/role/edit/:id',
        component: EditRole
    },


    // CATEGORY
    {
        name: 'category',
        path: '/expense-management/category',
        component: Category
    },
    {
        name: 'create-category',
        path: '/expense-management/category/create',
        component: CreateCategory
    },    
    {
        name: 'edit-category',
        path: '/expense-management/category/edit/:id',
        component: EditCategory
    }
];