<template>
    <div class="container">
        <template>
            <div class="row">
                <div class="col-12">
                    <div class="col-12 mt-3">
                        <router-link to="/users" class="">
                            <button type="submit" class="btn btn-primary">
                                Back
                            </button>
                        </router-link>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Add New User</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="createUser">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                placeholder="Name"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has('name'),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="name"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="form.email"
                                                type="email"
                                                name="email"
                                                class="form-control"
                                                placeholder="Email Address"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has(
                                                            'email'
                                                        ),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="email"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="form.password"
                                                type="password"
                                                name="password"
                                                class="form-control"
                                                placeholder="Password"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has(
                                                            'password'
                                                        ),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="password"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            Create User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                name: "",
            }),
        };
    },
    methods: {
        createUser() {
            this.form
                .post("api/user")
                .then(() => {
                    alert("Successfully Added");
                    this.$router.replace("/users");
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
