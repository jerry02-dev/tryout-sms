<template>
    <div class="container">
        <br />
        <br />
        <br />
        <div class="container bootstrap snippets bootdey mt-8">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-dark panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm">Users</p>
                            <i class="fa fa-users fa-5x"></i>
                            <hr />
                            <p class="h2 text-thin">254,487</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-danger panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm">
                                Courses
                            </p>
                            <i class="fa fa-comment fa-5x"></i>
                            <hr />
                            <p class="h2 text-thin">873</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-primary panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm">Events</p>
                            <i class="fa fa-shopping-cart fa-5x"></i>
                            <hr />
                            <p class="h2 text-thin">2,423</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
