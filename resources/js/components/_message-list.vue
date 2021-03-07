<template>
    <div id="messagev" @load="this.scrollToEnd" style="height: 400px;overflow-y: scroll">
        <v-list
            class="p-3 align-center"
            style="display: flex"
            v-for="(message, index) in allMessages"
            :key="index"
        >

                    <div v-if="user.id===message.user_id" class="ml-auto">
                        <v-flex>
                            <span class="small font-italic">{{message.user.username}}</span>
                        </v-flex>

                        <div v-if="message.message" class="text-message-container">
                            <v-chip :color="(user.id===message.user_id)?'#cff':'#2cf'" text-color="white">
                                {{message.message}}
                            </v-chip>
                        </div>

                        <div class="image-container">
                            <img v-if="message.image"  :src="'/storage/'+message.image" alt="">
                        </div>

                        <v-flex class="caption font-italic pt-1" style="font-size:10px">
                            {{message.created_at}}
                        </v-flex>
                    </div>


                    <div v-else class="mr-auto">
                        <v-flex>
                            <span class="small font-italic">{{message.user.username}}</span>
                        </v-flex>

                        <div v-if="message.message" class="text-message-container">
                            <v-chip :color="(user.id===message.user_id)?'#cff':'#2cf'" text-color="white">
                                {{message.message}}
                            </v-chip>
                        </div>

                        <div class="image-container">
                            <img v-if="message.image"  :src="'/storage/'+message.image" alt="">
                        </div>

                        <v-flex class="caption font-italic pt-1" style="font-size:10px">
                            {{message.created_at}}
                        </v-flex>
                    </div>

        </v-list>

    </div>
</template>

<script>
export default {
    props:['user','allMessages'],
    methods: {
        scrollToEnd(){
            const messagev=document.getElementById('messagev');
            messagev.scrollTo(0,99999);
        },
    },
}
</script>

<style scoped>
.chat-card{
    margin-bottom:140px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}
</style>
