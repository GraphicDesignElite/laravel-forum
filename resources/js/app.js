/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../node_modules/summernote/dist/summernote-bs4');

window.Vue = require('vue');

import store from '../js/store'
import Tooltip from './directives/Tooltip';
import CommentBox from './components/CommentBox';
import UpvoteButton from './components/UpvoteButton';
import ReplyButton from './components/ReplyButton';

const app = new Vue({
    store,
    el: '#app',
    components: {
        UpvoteButton,
        CommentBox,
        ReplyButton
    },
    directives: {
        Tooltip
    },
    data: {
        uiCreateComment: false
    },
    methods: {
        toggleCreateComment: function(){
            this.uiCreateComment = !this.uiCreateComment;
        }
    }
});
