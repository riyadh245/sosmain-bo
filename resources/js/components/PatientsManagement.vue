<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste of Patients</h3>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Lastname</th>
                                <th>Forename</th>
                                <th>Date of birth</th>
                                <th>Social number</th>
                                <th>Picture</th>
                                <th>Advices</th>

                            </tr>
                            </thead>
                            <tbody>


                            <tr v-for="patient in patients.data" :key="patient.id">
                                <td>{{ patient.id }}</td>
                                <td>{{ patient.lastname }}</td>
                                <td>{{ patient.forename }}</td>
                                <td>{{ patient.date_of_birth }}</td>
                                <td>{{ patient.social_number }}</td>
                                <td>{{ patient.hic_picture }}</td>
                                <td>{{ patient.tm_advices }}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <pagination
                                    :data="patients"
                                    @pagination-change-page="getResults"
                                ></pagination>
                            </div>
                            <div class="card-tools">
                                <select name="pagin" @change="paginfunction($event)" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</template>
<script>
import {loadPatient} from '../api.js';

export default {
    name: 'UserManagement',
    data() {

        return {
            patients: {},
            pagin: "5",
            // editmode: true,
            form: new Form({
                lastname: "",
                forename: "",
                date_of_birth: "",
                social_number: "",
                hic_picture: "",
                tm_advices: "",


            }),
        };
    },
    methods: {
        loadPatient,
        paginfunction(event) {
            this.pagin = event.target.value

            Fire.$emit("AfterUpdateUser");

        },
        getResults(page = 1) {
            axios.get('all-patients/' + this.pagin + '?page=' + page)
                .then(response => {
                    this.patients = response.data;
                });
        },


    },
    async created() {
        // get the user info from data base
        this.patients = await loadPatient();


        Fire.$on("AfterUpdateUser", async () => {
            this.patients = await loadPatient(this.pagin);
        });


    },
    updated() {
        this.$nextTick(function () {
            var table = $("#datatable").DataTable({
                paging: false,
                retrieve: true,
                bInfo: false
            });
            $(".dataTables_filter input")
                .unbind()
                .keyup(function () {
                    var value = $(this).val();
                    if (value.length >= 3) {
                        table.search(value).draw();
                    } else (table.search('').draw())
                });
        });
    }
}


</script>
