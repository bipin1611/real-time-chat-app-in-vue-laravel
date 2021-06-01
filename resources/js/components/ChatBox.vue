<template>
    <div class="col-7 px-0">
        <div v-if="isLoaded">
            <div class="px-4 py-2 chat-box bg-white" >
            
                <div v-for="message in messages" :key="message.id">

                    <!-- Send Message-->
                    <div class="media w-50 ml-auto mb-3" v-if="message.sender_user_id == authuser.id">
                        <div class="media-body">
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white" v-text="message.body"></p>
                            </div>
                            <p class="small text-muted">{{ time(message.created_at) }}</p>
                        </div>
                    </div>


                    <!-- Received Message-->
                    <div class="media w-50 mb-3" v-else>
                        <div class="media-body ml-3">
                            <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted" v-text="message.body"></p>
                            </div>
                            <p class="small text-muted">{{ time(message.created_at) }}</p>
                        </div>
                    </div>

                </div>


            </div>

            <!-- Typing area -->

            <form @submit.prevent="addMsg" class="bg-light" id="toBttom">

                <div class="input-group">

                    <input type="text" placeholder="Type a message" aria-describedby="button-addon2" 
                    class="form-control rounded-0 border-0 py-4 bg-light" v-model="msg">

                    <div class="input-group-append">
                        <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>

        </div>

        <div v-else>
            <div class="col-12 px-0" style="margin-top: 230px; text-align: center">
                <p class="small text-muted" style="colors :white;">Loading...</p>
            </div>
        </div>
        
    </div>


</template>

<script>
import moment from 'moment'

export default {
    name: "ChatBox",
    data(){
        return{
            isLoaded: false, 
            user:'',
            msg: '',
            authuser: window.App.user,
            messages: [],
        };
    },

    watch:{
        user(){
            this.fetchMsg();
            this.refreshChannel();
        }
    },

    mounted(){
        this.$root.$on('userupdated', msg =>{
            this.changedUser(msg);
        });
    },

    created(){
        this.fetchUser();
    },


    methods:{

        time(date){
            var oneDate = moment(date, 'YYYY-MM-DD');
            return oneDate.fromNow();
        },

        refreshChannel(){
            window.Echo.private('received.'+ this.user.id).listen('ChatMassge', e => {

                if(this.authuser.id === e.msg.receiver_user_id){
                    this.messages.push(e.msg);
                }
            });
        },

        fetchUser(){
            this.isLoaded = false;
            axios.get('/user').then(response => {
                this.user = response.data;
                this.isSelected = true;

                this.isLoaded = true;
            });
        },

        fetchMsg(){
            this.isLoaded = false;
            axios.get('/chat/' + this.user.id).then(response => {
                this.messages = [];
                this.messages = response.data;


                this.isLoaded = true;

            });
            
        },

        addMsg(){
            axios.post('/chat/' + this.user.id,{ 'body': this.msg} ).then(response => {
                this.messages.push(response.data);
                this.msg = '';
            });
        },

        changedUser(user){
            this.user = user;
            this.isSelected = true;
        }
    }
}
</script>

<style scoped>
</style>
