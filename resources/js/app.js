

require('./bootstrap');

window.Vue = require('vue');



Vue.component('posts', require('./components/posts.vue').default);

let url = window.location.href;

pageNumber = url.split('=')[1];


const app = new Vue({

    el: '#app',

    data:{
    	blog:{}
    },

    mounted(){


    	axios.post('getallposts',{

    		'page': pageNumber,

    	})
		.then(response => {
		    this.blog = response.data.data;
		    console.log(response);
		})


    }
});
