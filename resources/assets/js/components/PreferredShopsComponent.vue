<template>
    <div class="row">
        <div v-for="shop in preferredShops" :key="shop.id" class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <h4>{{shop.name}}</h4>
                <img v-bind:src="shop.picture" >
                <div class="caption">
                    <p>
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
        props: ['preferred'],
        data(){
            return {
                preferredShops: this.preferred,
            }
        },
        methods:{
            dislike(shop){
                // Method : POST, URL EXAMPLE : www.domain.com/dislike/1
                axios.post(`/dislike/${shop.id}`)
                .then(()=>{
                    // find the index of the current liked shop and remove it from the nearbyShops array
                    this.preferredShops.splice(this.preferredShops.indexOf(shop), 1);
                })
            },
        },
}
</script>
