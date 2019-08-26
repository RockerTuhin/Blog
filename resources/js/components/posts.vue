<template>
    <div class="post-preview">
        <a :href="slug">
          <h2 class="post-title">
            {{ title }}
          </h2>
          <h3 class="post-subtitle">
            {{ subtitle }}
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">{{ posted_by }}</a>

          {{ created_at }}

          <a href="" @click.prevent='likeIt'>
            <small>{{ likeCount }}</small>
            <i class="fas fa-thumbs-up" v-if="likeCount == 0"></i>
            <i class="fas fa-thumbs-up" style="color:red" v-else="likeCount > 0"></i>
          </a>              
        </p>
    </div>
</template>

<script>
    export default {

       data(){
            return {
                likeCount:0
            }
       },

       props:[
            'title','subtitle','created_at','postId','login','totalLikes','slug','posted_by'
       ],

       created(){
            this.likeCount = this.totalLikes;
       },

       methods:{

            likeIt()
            {
                if(this.login){
                    axios.post('savelike',{
                        id: this.postId
                    })
                    .then(response => {

                        if(response.data == 'deleted')
                            this.likeCount -= 1;
                        else
                            this.likeCount += 1;

                        console.log(response);

                    })
                }else{

                    window.location = 'login'

                }
                
            }

       }

    }
</script>
