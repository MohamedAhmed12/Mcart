<template>
  <div class="section">
      <div class="container">
        <div class="row">
            <div class="col-4" v-for="product in products" :key="product.slug">
              <product :product="product" />
            </div>
        </div>
      </div>
  </div>
</template>
<script>
  import Product from '@/components/products/Product'
  
  export default {
    data() {
        return {
            products: []
        }
    },
    components: {
      Product
    },
    async asyncData({params, app}) {
        let response = await app.$axios.$get(`products?category=${params.slug}`)
        return {
            products: response.data
        }
    }
  }
</script>