<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <div class="col-sm-3">Name</div>
                        <div class="col-sm-9" id="name">{{ user.name }}</div>
                    </div>
                    <div class="form-group row border-bottom">
                        <div class="col-sm-3">Email</div>
                        <div class="col-sm-9" id="email">{{ user.email }}</div>
                    </div>
                    <button type="button" @click="logout" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: ""
        };
    },
    mounted() {
        axios.get("/api/user").then(response => {
            this.user = response.data;
        })
        .catch(error => {
            if (error.response.status === 401) {
                localStorage.removeItem("auth");
                this.$router.push("/login");
            }
            console.log(error);
        });
    },
    methods: {
        logout() {
            axios
                .post("api/logout")
                .then(response => {
                    console.log(response);
                    localStorage.removeItem("auth");
                    this.$router.push("/login");
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>