<template>
    <v-layout row>
        <v-flex xs12 offset-sm3>
            <v-card class="chat-card">
                <v-list>
                    <v-subheader
                    >
                        Chat
                    </v-subheader>
                    <v-divider></v-divider>
                    <message-list :user="user" :all-messages="allMessages"></message-list>
                </v-list>
            </v-card>
        </v-flex>

        <div class="floating-div">
            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />
        </div>

        <v-footer style="width:100%"
            color="grey"
        >
            <v-layout row>

                <v-flex xs5 >
                    <v-text-field
                        rows=2
                        v-model="message"
                        label="Enter Message"
                        single-line
                        @keyup.enter="sendMessage"
                    ></v-text-field>
                </v-flex>

                <v-flex xs3>
                    <v-btn
                        @click="sendMessage"
                        dark class="mt-3 ml-2 white--text" small color="green">send</v-btn>
                </v-flex>
            </v-layout>
        </v-footer>
    </v-layout>
</template>

<script>
import { Picker } from 'emoji-mart-vue'
import MessageList from './_message-list.vue'
export default {
    props:['user','trade'],
    components:{
        Picker,
        MessageList
    },

    data () {
        return {
            message:null,
            emoStatus:false,
            myText:null,
            allMessages:[],
            token:document.head.querySelector('meta[name="csrf-token"]').content
        }
    },
    methods:{
        sendMessage(){
            //check if there message
            if(!this.message){
                return alert('Please enter message');
            }
            axios.post('/messages', {message: this.message,trade: this.trade}).then(response => {
                this.message=null;
                this.emoStatus=false;
                this.allMessages.push(response.data.message)
                setTimeout(this.scrollToEnd,100);
            });
        },
        fetchMessages() {
            axios.get('/messages/'+ this.trade).then(response => {
                this.allMessages = response.data;
            });
        },
        scrollToEnd(){
            const messagev = document.getElementById('messagev');
            messagev.scrollTo(0,99999);
        },
        onInput(e){
            if(!e){
                return false;
            }
            if(!this.message){
                this.message=e.native;
            }else{
                this.message=this.message + e.native;
            }
        },
        toggleEmo(){
            this.emoStatus= !this.emoStatus;
        }
    },
    mounted(){
    },
    created(){
        this.fetchMessages();
        setTimeout(this.scrollToEnd,100);
        Echo.private('chat.'+this.trade)
            .listen('MessageSent',(e)=>{
                this.allMessages.push(e.message)
                setTimeout(this.scrollToEnd,100);
            });
    }

}
</script>

<style scoped>
.chat-card{
    margin-bottom:10px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}
</style>
