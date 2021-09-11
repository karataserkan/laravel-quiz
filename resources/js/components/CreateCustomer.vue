<template>
    <div>
        <h3 class="text-center">Müşteri Ekle</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCustomer" :class="['needs-validation']">
                    <div :class="['form-group']">
                        <label>İsim</label>
                        <input :class="['form-control', allerrors.name ? 'is-invalid' : '']" type="text" v-model="customer.name">
                        <span v-if="allerrors.name" :class="['invalid-feedback']">{{ allerrors.name[0] }}</span>
                    </div>
                    <div :class="['form-group']">
                        <label>E-posta</label>
                        <input :class="['form-control', allerrors.email ? 'is-invalid' : '']" type="email" v-model="customer.email">
                        <span v-if="allerrors.email" :class="['invalid-feedback']">{{ allerrors.email[0] }}</span>
                    </div>
                    <div :class="['form-group']">
                        <label>GSM No</label>
                        <input :class="['form-control', allerrors.gsm_no ? 'is-invalid' : '']" type="tel" v-mask="'(###)-###-####'" v-model="customer.gsm_no" masked="false" placeholder="(___)-___-____">
                        <span v-if="allerrors.gsm_no" :class="['invalid-feedback']">{{ allerrors.gsm_no[0] }}</span>
                    </div>
                    <div :class="['form-group']">
                        <label>Doğum Tarihi</label>
                        <b-form-datepicker :class="['form-control mb-2', allerrors.birthday ? 'is-invalid' : '']" id="example-datepicker" v-model="customer.birthday" locale="tr" :max="max" placeholder="Doğum tarihini seçiniz"></b-form-datepicker>
                        <span v-if="allerrors.birthday" :class="['invalid-feedback']">{{ allerrors.birthday[0] }}</span>
                    </div>
                    <div :class="['form-group']">
                        <label>Departman</label>
                        <select :class="['form-control', allerrors.department_id ? 'is-invalid' : '']" v-model="customer.department_id">
                          <option disabled value="">Departman Seçin</option>
                          <option v-for="department in departments" v-bind:value="department.id">{{department.name}}</option>
                        </select>
                        <span v-if="allerrors.department_id" :class="['invalid-feedback']">{{ allerrors.department_id[0] }}</span>
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <img :src="imgcode">
                            <button type="button" class="btn btn-danger reload"  @click="reloadCaptcha" id="reload">
                                ↻
                            </button>
                        </div>
                    </div>
                    <div :class="['form-group']">
                        <label>Doğrulama</label>
                        <input :class="['form-control', allerrors.captcha ? 'is-invalid' : '']" type="text" v-model="customer.captcha">
                        <span v-if="allerrors.captcha" :class="['invalid-feedback']">{{ allerrors.captcha[0] }}</span>
                    </div>
                    <input type="hidden" v-model="customer.key">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                customer: {},
                departments: [],
                max:new Date(),
                allerrors: [],
                invalid : false,
                imgcode : '',
            }
        },
        created() {
            this.axios
                .get('/api/department')
                .then(response => {
                    this.departments = response.data;
                });
            this.reloadCaptcha();
        },
        methods: {
            addCustomer() {
                this.axios
                    .post('/api/customer', this.customer)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(error => {
                        this.allerrors = error.response.data.errors;
                        this.invalid = true;
                        this.reloadCaptcha();
                    })
                    .finally(() => this.loading = false)
            },
            reloadCaptcha(){
                this.axios
                .get('/captcha/api/math')
                .then(response => {
                    this.imgcode = response.data.img;
                    this.customer.key=response.data.key;
                });
            }
        }
    }
</script>