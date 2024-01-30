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
                            <h4>Edit User Info</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="updateUser">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
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
                                            <input
                                                v-model="user.email"
                                                type="email"
                                                name="email"
                                                class="form-control"
                                                placeholder="Email Address"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            Save Changes
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
                    const { name, email } = response.data;
                    this.user.name = name;
                    this.user.email = email;
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
