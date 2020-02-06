<template>
<div class="section">
    <div class="container ">
        <div class="row">
            <div class="col">
                <img src="http://via.placeholder.com/620x620" alt="Product name">
            </div>
            <div class="col">
                <div class="row pr-5 pl-5">
                    <h1 class="title is-4">
                    {{ product.name }}
                    </h1>
                    <p v-if="product.description">
                        {{ product.description }}
                    </p>
                    <hr class="w-100">
                   <h5 class="mr-2"> 
                        <span class="badge badge-pill badge-light p-2 font-weight-bold">{{product.price}}</span>
                   </h5>
                   <h5 class="mr-2"> 
                        <span class="badge badge-pill badge-light p-2 font-weight-bold">out of stock</span>
                   </h5>
                </div>
                <div class="row pr-5 pl-5">
                    <form action="" class="col-12">
                        <!-- variations -->
                        <productVariation 
                            v-for="(variations, type) in product.variations" 
                            :type="type" 
                            :variations="variations" 
                            :key="type"
                            v-model="form.variation"
                            />
                            
                        <!-- Quantity -->
                        <div class="form-group col-md-6 mt-4 pl-0" v-if="form.variation">
                            <label for="inputState">Quantity</label>
                            <div class="row">
                                <select id="inputState" class="form-control col">
                                    <option selected>1</option>
                                </select>
                                <button type="submit" class="btn btn-primary col offset-2">Add to cart</button>
                            </div>
                        </div>

                    </form>
<!--                     <form action="#" @submit.prevent="add">
                        <ProductVariation v-for="(variations,type) in product.variations" :type="type" :key="type" :variations="variations"  v-model="form.variation" />
                        <div class="field has-addons" v-if="form.variation">
                            <div class="control">
                                <div class="select is-fullwidth" >
                                    <select v-model="form.quantity">
                                        <option :value="x" v-for="x in parseInt(form.variation.stock_count)" :key="x">{{ x }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control">
                                <button class="button is-info">Add To Cart</button>
                            </div>
                        </div>
                    </form> -->
                </div>  
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import ProductVariation from '@/components/products/ProductVariation'
    
    export default {
        data() {
            return {
                product: null,
                form: {
                    variation: '',
                    quantity: 1
                }
            }
        },
        components: {
            ProductVariation
        },
        async asyncData({params, app}) {
            let response = await app.$axios.$get(`products/${params.slug}`)

            return {
                product: response.data
            }
        }
    }
</script>