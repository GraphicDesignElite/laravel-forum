<template>
    <span>
        <a href="#" class="btn btn-secondary btn-sm" v-on:click="reply">Reply Vue</a>
    </span>
</template>
<script>
import {mapGetters, mapActions } from 'vuex';

export default {
    name: 'reply-button',
    props: ['type', 'itemid'],
    data(){
        return {
            
        }
    },
    computed: {
        ...mapGetters(["uiSettings"])
    },
    methods: {
        ...mapActions(['toggleDisplayCommentBox']),
        reply: function(){
            this.toggleDisplayCommentBox();
        }
    }
}
</script>
