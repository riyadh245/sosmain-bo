<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Centers</h3>

                        <div class="card-tools">
                            <button
                                class="btn btn-success float-right"
                                @click="newModalCenter"
                            >
                                Add new Center <i class="fas fa-plus"></i>
                            </button>


                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Website</th>
                                <th>Adress</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="center in centers.data"
                                :key="center.id"
                            >
                                <td>{{ center.id }}</td>
                                <td>{{ center.title }}</td>
                                <td>{{ center.website }}</td>
                                <td>{{ center.address }}</td>
                                <td>{{ center.longitude }}</td>
                                <td>{{ center.latitude }}</td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-primary"
                                        @click="UpdatemodelCenter(center)"
                                    >
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-danger"
                                        @click="
                                                deleteCenter(form, center.id)
                                            "
                                    >
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
                                    :data="centers"
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
            id="addNewCenter"
            tabindex="-1"
            aria-labelledby="addNewCenterLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            v-show="editmode"
                            class="modal-title"
                            id="addNewCenterLabel"
                        >
                            Update Center's Info
                        </h5>
                        <h5
                            v-show="!editmode"
                            class="modal-title"
                            id="addNewCenterLabel"
                        >
                            Add New Center
                        </h5>

                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form
                        @submit.prevent="
                            editmode ? updateCenter(form) : createCenter(form)
                        "
                    >
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input
                                    v-model="form.title"
                                    type="text"
                                    name="title"
                                    placeholder="Title"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('title')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="title"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input
                                    v-model="form.website"
                                    type="text"
                                    name="website"
                                    placeholder="Website"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('website')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="website"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input
                                    v-model="form.address"
                                    type="text"
                                    name="address"
                                    placeholder="Address"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('address')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="address"
                                ></has-error>
                            </div>

                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input
                                    v-model="form.longitude"
                                    type="text"
                                    name="longitude"
                                    placeholder="Longitude"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'longitude'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="longitude"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">latitude</label>
                                <input
                                    v-model="form.latitude"
                                    type="text"
                                    name="latitude"
                                    placeholder="Latitude"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'latitude'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="latitude"
                                ></has-error>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button
                                v-show="editmode"
                                type="submit"
                                class="btn btn-success"
                            >
                                Update
                            </button>
                            <button
                                v-show="!editmode"
                                type="submit"
                                class="btn btn-primary"
                            >
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {
    loadCenter,
    deleteCenter,
    updateCenter,
    createCenter
} from "../api.js";

export default {
    name: "CenterManagement",
    data() {
        return {
            centers: {},
            editmode: true,
            pagin: " 5",

            // editmode: true,
            form: new Form({
                id: "",
                title: "",
                logo: "",
                website: "",
                address: "",
                longitude: "",
                latitude: "",
                created_at: ""
            })
        };
    },
    methods: {
        loadCenter,
        deleteCenter,
        updateCenter,
        createCenter,
        paginfunction(event) {
            this.pagin = event.target.value;

            Fire.$emit("AfterUpdateCenter");
        },
        getResults(page = 1) {
            axios
                .get("all-centers/" + this.pagin + "?page=" + page)
                .then(response => {
                    this.centers = response.data;
                });
        },

        newModalCenter() {
            this.editmode = false;
            this.form.reset();
            $("#addNewCenter").modal("show");
        },
        UpdatemodelCenter(center) {
            this.editmode = true;
            this.form.reset();
            $("#addNewCenter").modal("show");
            this.form.fill(center);
        }
    },
    async created() {
        // get the center info from data base
        this.centers = await loadCenter();

        Fire.$on("AfterUpdateCenter", async () => {
            this.centers = await loadCenter(this.pagin);
        });
    },
    async updated() {
        this.$nextTick(function () {
            var table = $("#datatable").DataTable({
                paging: false,
                retrieve: true,
                bInfo : false
            });
            $(".dataTables_filter input")
                .unbind()
                .keyup(function () {
                    var value = $(this).val();
                    if (value.length >= 3) {
                        this.table.search(value).draw();
                    } else (table.search('').draw())
                });

        });

    },

};
</script>
