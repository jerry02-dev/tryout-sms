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
                            <h4>View User Info</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label
                                                for="password"
                                                class="col-form-label"
                                                >Name</label
                                            >
                                            <input
                                                readonly
                                                v-model="user.name"
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                placeholder="Name"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label
                                                for="password"
                                                class="col-form-label"
                                                >Email Account</label
                                            >
                                            <input
                                                readonly
                                                v-model="user.email"
                                                type="email"
                                                name="email"
                                                class="form-control"
                                                placeholder="Email Address"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label
                                                for="password"
                                                class="col-form-label"
                                                >Date Created</label
                                            >
                                            <input
                                                readonly
                                                v-model="user.created_at"
                                                type="text"
                                                name="email"
                                                class="form-control"
                                                placeholder=""
                                            />
                                        </div>
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
            user: {
                name: "",
                email: "",
                _method: "patch",
            },
        };
    },
    mounted() {
        this.showUser();
    },
    methods: {
        showUser() {
            axios
                .get(`/api/user/${this.$route.params.id}`)
                .then((response) => {
                    const { name, email, created_at } = response.data;
                    this.user.name = name;
                    this.user.email = email;
                    this.user.created_at = created_at;
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        updateUser() {
            axios
                .post(`/api/user/${this.$route.params.id}`, this.user)
                .then((response) => {
                    alert("Successfully Updated");
                    this.$router.replace("/users");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
