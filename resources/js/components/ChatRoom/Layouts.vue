<template>
    <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
        <div class="m-messenger__messages m-scrollable" id="chatbox">
            <ChatItem v-for="(v, i) in messages" :key="i" v-bind:data="v" v-bind:user_id="user_id"></ChatItem>
        </div>
        <div class="m-messenger__seperator"></div>
        <div class="m-messenger__form">
            <div class="m-messenger__form-controls">
                <input type="text" v-model="message" v-on:keyup.enter="sendMessage" name=""
                       class="m-messenger__form-input">
            </div>
            <div class="m-messenger__form-tools">
                <button type="button" v-on:click="sendMessage" class="m-messenger__form-attachment">
                    <i class="la la-send"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import ChatItem from './Item.vue'

    export default {
        name: "layouts",
        components: {
            ChatItem
        },
        props: ['user_id'],
        data() {
            return {
                messages: [],
                message: '',
                sending: false,
            }
        },
        methods: {
            async getMessages() {
                await axios.get('/api/messages')
                    .then((response) => {
                        this.messages = response.data.slice().reverse();
                    });
            },
            async sendMessage() {
                if(!this.message) {
                    alert(i18n.frontend.empty_chat);
                    return true;
                }
                if(!this.sending) {
                    this.sending = true;
                    await axios.post('/api/messages', {
                        content: this.message,
                        user_id: this.user_id,
                    })
                        .then(response => {
                            this.messages.push({
                                content: this.message,
                                user_id: this.user_id,
                            });
                            this.message = '';

                        });
                    this.bottomChat()
                    this.sending = false;
                }

            },
            bottomChat() {
                let container = this.$el.querySelector("#chatbox");
                container.scrollTop = container.scrollHeight;
            },
            i18n() {
                this.$el.querySelector(".m-messenger__form-input").placeholder = i18n.frontend.type_here;
            },
        },
        created() {
            this.getMessages();
            Echo.channel('chat-room')
                .listen('SendMessage', async (data) => {
                    await this.messages.push({
                        content: data.message.content,
                        user_id: data.message.user_id,
                        user: data.message.user,
                    });
                    this.bottomChat()
                })
        },
        mounted() {
            this.i18n()
        }
    }
</script>

<style scoped>

</style>
