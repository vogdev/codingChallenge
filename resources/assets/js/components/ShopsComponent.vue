<template>
    <div class="row">
        <div v-for="shop in nearbyShops" :key="shop.id" class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <h4>{{shop.name}}</h4>
                <img v-bind:src="shop.picture" >
                <div class="caption">
                    <p>
                        <button  @click="like(shop)" class="btn btn-success" role="button">Like</button> 
                        <button  @click="dislike(shop)" class="btn btn-danger" role="button">Dislike</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
    export default {
        props: ['shops'],
        data(){
            return {
                // converting this.shops object to an array
                nearbyShops: Object.values(this.shops),
            }
        },
        methods:{
            like(shop){
                // Method : POST, URL EXAMPLE : www.domain.com/like/1
                axios.post(`/like/${shop.id}`)
                .then(()=>{
                    // find the index of the current liked shop and remove it from the nearbyShops array
                    this.nearbyShops.splice(this.nearbyShops.indexOf(shop), 1);              
                })
            },
            dislike(shop){
                // Method : POST, URL EXAMPLE : www.domain.com/dislike/1
                axios.post(`/dislike/${shop.id}`)
                    // find the index of the current disLiked shop and remove it from the nearbyShops array
                .then(()=>{
                    this.nearbyShops.splice(this.nearbyShops.indexOf(shop), 1);
                })
            },
        },
}
</script>
