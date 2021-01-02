import axios from 'axios'

var api = axios.create({
    baseURL: '/',
    timeout: 20000
})


export const loadExpert = async (pagin = 5) => await axios.get("/all-experts/" + pagin).then((data) => (data.data));
export const numberCenter = async () => await axios.get("/number-center").then((data) => (data));

export const numberDoctor = async () => await axios.get("/number-doctor").then((data) => (data));
export const numberExpert = async () => await axios.get("/number-expert").then((data) => (data));
export const numberPatient = async () => await axios.get("/number-patient").then((data) => (data));


export const loadUsers = async (pagin = 5) => await axios.get("/all-doctors/" + pagin).then((data) => (data.data));


export const updateUser = (form) => {

    form.put('/user/' + form.id)
        .then(() => {
            // hide the modal after we update a user

            $("#UpdateUser").modal("hide");

            swal.fire("Updated!", "User Information has been Updated.", "success");

            Fire.$emit("AfterUpdateUser");
            // end of progress bar with a success

        })


}

export const deleteUser = (form, id) => {
    swal.fire({


        title: "Are you sure you want to delete this Users?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            //send ajax request to the server
            form.put('/delete-user/' + id)
                .then(() => {

                    swal.fire("Deleted!", "Your User has been deleted.", "success");

                    Fire.$emit("AfterUpdateUser");

                }).catch(() => {
                swal.fire("Failed!", "Ther was something wrong.", "warning");

            });
        }
    })
}

export const approuved = (form, id) => {

    form.put('/approved/' + id)
        .then(() => {
            Fire.$emit("AfterUpdateUser");

        });

}
export const validated = (form, id) => {

    form.put('/validated/' + id)
        .then(() => {
            Fire.$emit("AfterUpdateUser");

        });

}
export const inactivated = (form, id) => {

    form.put('/inactivated/' + id)
        .then(() => {
            Fire.$emit("AfterUpdateUser");

        });

}

export const loadPatient = async (pagin = 5) => await axios.get("/all-patients/" + pagin).then((data) => data.data);

export const loadCenter = async (pagin = 5) => await axios.get("/all-centers/" + pagin).then((data) => data.data);

export const updateCenter = (form) => {

    form.put('/update-center/' + form.id)
        .then(() => {
            // hide the modal after we update a user

            $("#addNewCenter").modal("hide");

            swal.fire("Updated!", "Center Information has been Updated.", "success");

            Fire.$emit("AfterUpdateCenter");
            // end of progress bar with a success

        })


}

export const deleteCenter = (form, id) => {
    swal.fire({


        title: "Are you sure you want to delete this Center?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            //send ajax request to the server
            form.put('/delete-center/' + id)
                .then(() => {

                    swal.fire("Deleted!", "The Center has been deleted.", "success");

                    Fire.$emit("AfterUpdateCenter");

                }).catch(() => {
                swal.fire("Failed!", "There was something wrong.", "warning");

            });
        }
    })
}

export const createCenter = (form) => (
    form.post("create-center")
        .then(() => {
            // make a emit to the method AfterCreate to fire a event (fire was declared as a global variable in app.js we can use it in all our files)
            Fire.$emit("AfterCreate");

            // hide the modal after we create a user
            $("#addNewCenter").modal("hide");

            //the msg we displey after adding a user successfully
            toast.fire({
                icon: "success",
                title: "Center Created successfully"
            });
            Fire.$emit("AfterUpdateCenter");
        }).catch(() => {
        swal.fire("Failed!", "There was something wrong.", "warning");

    })
)
