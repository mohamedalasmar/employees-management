<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-grey-800">Edit Employee</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Employee
                            <router-link
                                :to="{ name: 'EmployeeIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="updateEmployee">
                                <div class="form-group row">
                                    <label
                                        for="first_name"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                        >First Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            v-model="form.first_name"
                                            id="first_name"
                                            type="text"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="last_name"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                        >Last Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            v-model="form.last_name"
                                            id="last_name"
                                            type="text"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="middle_name"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                        >Middle Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="middle_name"
                                            v-model="form.middle_name"
                                            type="text"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="country"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                    >
                                        Country Name
                                    </label>
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.country_id"
                                            @change="getStates()"
                                            name="country"
                                            id="country"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="country in countries"
                                                :key="country.id"
                                                :value="country.id"
                                            >
                                                {{ country.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="state"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                    >
                                        State Name
                                    </label>
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.state_id"
                                            @change="getCities()"
                                            name="state"
                                            id="state"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="state in states"
                                                :key="state.id"
                                                :value="state.id"
                                            >
                                                {{ state.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="city"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                    >
                                        City Name
                                    </label>
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.city_id"
                                            name="city"
                                            id="city"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="city in cities"
                                                :key="city.id"
                                                :value="city.id"
                                            >
                                                {{ city.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="department"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                    >
                                        Department Name
                                    </label>
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.department_id"
                                            name="department"
                                            id="department"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="department in departments"
                                                :key="department.id"
                                                :value="department.id"
                                            >
                                                {{ department.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="zip_code"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                        >Zip Code</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            v-model="form.zip_code"
                                            id="zip_code"
                                            type="text"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="address"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                        >Address</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            v-model="form.address"
                                            id="address"
                                            type="text"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="birth_date"
                                        id="birth_date"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                    >
                                        Birth Date
                                    </label>
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.birth_date"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="date_hired"
                                        id="date_hired"
                                        class="
                                            col-md-4 col-form-label
                                            text-md-right
                                        "
                                    >
                                        Hired Date
                                    </label>
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.date_hired"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Update Employee
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";
import Datepicker from "vuejs-datepicker";
export default {
    components: {
        Datepicker,
    },
    data() {
        return {
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birth_date: null,
                date_hired: null,
            },
        };
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getEmployee();
    },
    methods: {
        getEmployee() {
            axios
                .get("/api/employees/" + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data;
                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then((response) => {
                    this.countries = response.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getStates() {
            axios
                .get("/api/employees/" + this.form.country_id + "/states")
                .then((response) => {
                    this.states = response.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getCities() {
            axios
                .get("/api/employees/" + this.form.state_id + "/cities")
                .then((response) => {
                    this.cities = response.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then((response) => {
                    this.departments = response.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        storeEmployee() {
            axios
                .post("/api/employees", {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    middle_name: this.form.middle_name,
                    address: this.form.address,
                    zip_code: this.form.zip_code,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    department_id: this.form.department_id,
                    birth_date: this.format_date(this.form.birth_date),
                    date_hired: this.format_date(this.form.date_hired),
                })
                .then((response) => {
                    this.$router.push({ name: "EmployeeIndex" });
                });
        },
                updateEmployee() {
            axios
                .put("/api/employees/" + this.$route.params.id, {
                    first_name: this.form.first_name,
                    middle_name: this.form.middle_name,
                    last_name: this.form.last_name,
                    address: this.form.address,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    department_id: this.form.department_id,
                    zip_code: this.form.zip_code,
                    birth_date: this.format_date(this.form.birth_date),
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(response => {
                    this.$router.push({ name: "EmployeeIndex" });
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        },
    },
};
</script>

<style></style>
