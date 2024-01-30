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
                            <h4>Add New Course</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="createCourse">
                                <div class="row">
                                    <input
                                        v-model="form.user_id"
                                        hidden
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        placeholder=""
                                    />
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="form.title"
                                                type="text"
                                                name="title"
                                                class="form-control"
                                                placeholder="Title"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has(
                                                            'title'
                                                        ),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="title"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="form.description"
                                                type="text"
                                                name="description"
                                                class="form-control"
                                                placeholder="Description"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has(
                                                            'description'
                                                        ),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="description"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            Create Course
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
            loggedUser: document
                .querySelector("meta[name='user']")
                .getAttribute("content"),
            form: new Form({
                title: "",
                description: "",
                user_id: document
                    .querySelector("meta[name='user']")
                    .getAttribute("content"),
            }),
        };
    },
    methods: {
        createCourse() {
            this.form
                .post("api/course")
                .then(() => {
                    alert("Successfully Added");
                    this.$router.replace("/courses");
                    this.$Progress.finish();
                })
                .catch(() => {});
        },
    },
    mounted() {
        console.log("Component mounted.");
        console.log(this.loggedUser);
    },
};
</script>
