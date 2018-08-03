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
                nearbyShops: this.shops,
            }
        },
        methods:{
            like(shop){
                axios.post(`/like/${shop.id}`)
                .then(()=>{
                    this.nearbyShops.splice(this.nearbyShops.indexOf(shop), 1);              
                })
            },
            dislike(shop){
                axios.post(`/dislike/${shop}`)
                .then(()=>{
                    this.nearbyShops.splice(this.nearbyShops.indexOf(shop), 1);
                })
            },
        },
}
</script>
