<template>
    <div class="m-messenger__wrapper" v-if="user_id === data.user_id">
        <div class="m-messenger__message m-messenger__message--out">
            <div class="m-messenger__message-body">
                <div class="m-messenger__message-arrow"></div>
                <div class="m-messenger__message-content">
                    <div class="m-messenger__message-text">
                        {{ data.content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-messenger__wrapper" v-else>
        <div class="m-messenger__message m-messenger__message--in">
            <div class="m-messenger__message-pic">
                <img v-bind:src="data.user.avatar" alt="avatar"/>
            </div>
            <div class="m-messenger__message-body">
                <div class="m-messenger__message-arrow"></div>
                <div class="m-messenger__message-content">
                    <div class="m-messenger__message-username">
                        {{ data.user.fullname }}
                    </div>
                    <div class="m-messenger__message-text">
                        {{ data.content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "item",
        data() {
            return {}
        },
        mounted() {

        },
        props: ['data', 'user_id'],
    }
</script>

<style scoped>

</style>
