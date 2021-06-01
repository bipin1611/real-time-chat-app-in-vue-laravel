<template>
    <div class="col-5 px-0">
        <div class="bg-white">

            <div class="bg-gray px-4 py-2 bg-light">
                <p class="h5 mb-0 py-1">Recent</p>
            </div>
            <div class="messages-box">
                <div class="list-group rounded-0" v-for="(user, index) in users" :key="index">

                    <a class="list-group-item list-group-item-action rounded-0" @click="setActive(index, user)" 
                    :class="[(isActive === index) ? 'active text-white' : '' ]">
                        <div class="media"><img :src="'https://placeimg.com/640/480/tech?u=' + user.email" alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h6 class="mb-0">{{ user.name }}</h6><small class="small font-weight-bold">25 Dec</small>
                                </div>
                                <p class="font-italic mb-0 text-small">Last Seen</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    
    name: "Users",
    data(){
        return{
            users: [],
            authuser: window.App.user,
            isActive: 0
        };
    },

    created(){
        this.fetchUser();
    },

    methods:{
        fetchUser(){
            axios.get('/users').
                then(response => {
                    this.users = response.data
            })
        },

        setActive(index, user) {
            this.isActive = index;
            this.$root.$emit('userupdated', user);
        },
    }
}
</script>

<style scoped>

</style>
