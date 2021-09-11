<template>
    <div>
        <h2 class="text-center">Mişteriler</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Email</th>
                <th>GSM No</th>
                <th>Departman</th>
                <th>Doğum Tarihi</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers" :key="customer.id">
                <td>{{ customer.id }}</td>
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.gsm_no }}</td>
                <td>{{ customer.department.name }}</td>
                <td>{{ customer.birthday|formatDateAsBirthday}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteCustomer(customer.id)">Sil</button>
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
                customers: []
            }
        },
        created() {
            this.axios
                .get('/api/customer')
                .then(response => {
                    this.customers = response.data;
                });

            this.axios.
            get('https://api.openweathermap.org/data/2.5/weather?id=2643743&appid=67b35b09092cac3bc15204a89a039317')
            .then(response => {
                console.log(response);
            })
        },
        methods: {
            deleteCustomer(id) { 
                this.axios
                    .delete(`/api/customer/${id}`)
                    .then(response => {
                        let i = this.customers.map(data => data.id).indexOf(id);
                        this.customers.splice(i, 1)
                    });
            }
        }
    }
</script>