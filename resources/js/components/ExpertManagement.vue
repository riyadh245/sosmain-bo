<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste of Experts</h3>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Forname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Rpps</th>
                                <th> Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr v-for="user in users.data" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.username }}</td>
                                <td>{{ user.forename }}</td>
                                <td>{{ user.lastname }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.phone_number }}</td>
                                <td>{{ user.rpps_number }}</td>
                                <td>{{ user.status }}</td>

                                <td>
                                    <a href="#" v-if="user.status === 'in registration'" class="btn btn-success"
                                       @click="approuved(form,user.id)">Approuve</a>
                                    <a href="#" v-if="user.status === 'Registred'|| user.status ==='InActivated' "
                                       class="btn btn-success" @click="validated(form,user.id)">Validated</a>

                                    <a href="#" v-if="user.status === 'Validated'" class="btn btn-success"
                                       @click="inactivated(form,user.id)">InActivated</a>
                                    <a href="#" v-if="user.status === 'Deleted'" class="btn btn-success"
                                       @click="approuved(form,user.id)">Approuve</a>

                                </td>
                                <td>
                                    <!-- <a href="#" class="btn btn-primary" @click="UpdatemodelFaq(faq)"> Edit </a> -->
                                    <a href="#" class="btn btn-primary" @click="updatemodelUser(user)"> Edit </a>
                                </td>
                                <td>
                                    <!-- <a href="#" class="btn btn-primary" @click="UpdatemodelFaq(faq)"> Edit </a> -->
                                    <a href="#" class="btn btn-primary" @click="showmodelUser(user)"> View </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger" v-if="user.status ==='InActivated' "
                                       @click="deleteUser(form,user.id)">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <pagination
                                    :data="users"
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
        <!-- Modal -->
        <div
            class="modal fade"
            id="UpdateUser"
            tabindex="-1"
            aria-labelledby="UpdateUserLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UpdateUserLabel">Update Expert Info</h5>


                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="updateUser(form)">
                        <div class="modal-body">


                            <div class="form-group">
                                <label for=""> Username</label>
                                <input
                                    v-model="form.username"
                                    type="text"
                                    name="username"
                                    placeholder="UserName"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('username') }"
                                />
                                <has-error :form="form" field="username"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Forname</label>
                                <input
                                    v-model="form.forename"
                                    type="text"
                                    name="forename"
                                    placeholder="Forename"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('forename') }"
                                />
                                <has-error :form="form" field="forename"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input
                                    v-model="form.lastname"
                                    type="text"
                                    name="lastname"
                                    placeholder="Lastname"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('lastname') }"
                                />
                                <has-error :form="form" field="lastname"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input
                                    v-model="form.email"
                                    type="text"
                                    name="email"
                                    placeholder="Email"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('email') }"
                                />
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Phone number</label>
                                <input
                                    v-model="form.phone_number"
                                    type="text"
                                    name="phone_number"
                                    placeholder="Phone Number"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('phone_number') }"
                                />
                                <has-error :form="form" field="phone_number"></has-error>
                            </div>
                            <div class="form-group">
                                <label for=""> Rpps number</label>
                                <input
                                    v-model="form.rpps_number"
                                    type="text"
                                    name="rpps_number"
                                    placeholder="Rpps number"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('rpps_number') }"
                                />
                                <has-error :form="form" field="rpps_number"></has-error>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- new model to show the user -->
        <div
            class="modal fade"
            id="ShowUser"
            tabindex="-1"
            aria-labelledby="ShowUserLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ShowUserLabel">Show Docteur Info</h5>


                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <div class="form-group">
                            <label for=""> Id : {{ form.id }}</label>

                            <has-error :form="form" field="id"></has-error>
                        </div>
                        <div class="form-group">
                            <label for=""> Username : {{ form.username }}</label>

                            <has-error :form="form" field="username"></has-error>
                        </div>
                        <div class="form-group">
                            <label for=""> Forname : {{ form.forename }}</label>

                            <has-error :form="form" field="username"></has-error>
                        </div>
                        <div class="form-group">
                            <label for=""> lastname : {{ form.lastname }}</label>

                            <has-error :form="form" field="username"></has-error>
                        </div>

                        <div class="form-group">
                            <label for=""> Email : {{ form.email }}</label>

                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <label for=""> Phone Number : {{ form.phone_number }}</label>

                            <has-error :form="form" field="phone_number"></has-error>
                        </div>
                        <div class="form-group">
                            <label for=""> Rpps : {{ form.rpps_number }}</label>

                            <has-error :form="form" field="rpps_number"></has-error>
                        </div>

                        <div class="col-4 ">
                            <img :src="getpicture()" width="170xp" height="170px"/>

                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {loadExpert, inactivated, updateUser, deleteUser, approuved, validated} from '../api.js';

export default {
    name: "ExpertManagement",
    data() {
        return {
            users: {},
            pagin: "5",
            // editmode: true,
            form: new Form({
                id: "",
                username: "",
                forename: "",
                lastname: "",
                email: "",
                status: "",
                phone_number: "",
                rpps_number: "",

            }),
        };
    },
    methods: {
        loadExpert,
        updateUser,
        deleteUser,
        approuved,
        validated,
        inactivated,
        getpicture() {
            return "../images/profile_img.png";

        },
        showmodelUser(user) {

            this.form.reset();
            $("#ShowUser").modal("show");
            this.form.fill(user);

        },
        paginfunction(event) {
            this.pagin = event.target.value

            Fire.$emit("AfterUpdateUser");

        },
        getResults(page = 1) {
            axios.get('all-experts/' + this.pagin + '?page=' + page)
                .then(response => {
                    this.users = response.data;
                });
        },
        updatemodelUser(user) {

            this.form.reset();
            $("#UpdateUser").modal("show");
            this.form.fill(user);

        },

    },
    async created() {
        // get the user info from data base

        this.users = await loadExpert()

        Fire.$on("AfterUpdateUser", async () => {
            this.users = await loadExpert(this.pagin);
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
