<template>
    <div class="card overflow-hidden">
      <nuxt-link :to="link">  
        <img src="http://via.placeholder.com/450x300" alt="Productname">
      </nuxt-link>
      <div class="card-body">
        <h5>
            <nuxt-link :to="link" class="card-title">{{product.name}}</nuxt-link>
        </h5>
        <p class="card-text">{{product.description}}</p>
        <h5 class="mr-2">
            <span class="badge badge-pill badge-light p-2 font-weight-bold">{{product.price}}</span>
        </h5>
        <nuxt-link  :to="link" class="btn btn-primary">Add to Cart</nuxt-link>
      </div>
    </div>
</template>

<script>
    export default {
        props: {
            product: {
                required: true,
                type: Object
            }
        },
        computed: {
            link() {
                return {
                    name: 'products-slug', 
                    params: { 
                        slug: this.product.slug
                    } 
                };
            }
        }
    }
</script>