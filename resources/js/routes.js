import Customers from './components/Customers.vue';
import CreateCustomer from './components/CreateCustomer.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Customers
    },
    {
        name: 'create',
        path: '/create',
        component: CreateCustomer
    }
];