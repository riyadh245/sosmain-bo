<template>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Expert Admin</small>
            </h1>
        </section>
        <!-- Main content -->
        <section
            class="content"
            style="height: auto !important; min-height: 0px !important;"
        >
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                {{ expertNum }}
                            </h3>
                            <p>Experts</p>
                        </div>

                        <a href="#" class="small-box-footer">
                            "Plus d'info"
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</template>
<script>
import {numberExpert} from "../api.js";

export default {
    name: "AdminDashboard",
    data() {
        return {
            expertNum: ""
        };
    },
    methods: {},
    async created() {

        this.expertNum = (await numberExpert()).data;
    }
};
</script>
