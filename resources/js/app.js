/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../node_modules/summernote/dist/summernote-bs4');

window.Vue = require('vue');


import Tooltip from './directives/Tooltip.js';
import UpvoteButton from './components/UpvoteButton';

const app = new Vue({
    el: '#app',
    components: {
        UpvoteButton
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
