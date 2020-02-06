<template>
   <div class="mt-3">
        <!-- title with variation type-->
        <label class="font-weight-bold">
            {{type}}
        </label>
        <!-- select -->
        <select :value="selectedVariationId" class="form-control" @change="changed($event, type)">
            <option selected>Please Choose</option>
            <option v-for="variation in variations" :key="variation.id" :value="variation.id" :disabled="!variation.in_stock">
                <!-- variation name -->
                {{variation.name}}
                <!-- variation price -->
                <template v-if="variation.price_varies">
                    ({{variation.price}})
                </template>
                <template v-if="!variation.in_stock">
                    (Out Of Stock)
                </template>
            </option>
        </select>
   </div>
</template>

<script>
    export default {
        props: {
            type: {
                required: true,
                type: String
            },
            variations: {
                required: true,
                type: Array
            },
            value: {
                required: false,
                default: ''
            }
        },
        methods: {
            changed(event) {
                // used in vue to to make this component act like normal dropdown
                this.$emit('input', this.findVariation(event.target.value))
            },
            findVariation (id) {
                let variation = this.variations.find( variation => variation.id == id)

                if ( typeof variation == 'undefined' ) {
                    return null;
                }

                return variation
            }
        },
        computed: {
            selectedVariationId() {
                if ( !this.findVariation(this.value.id) ) {
                    return 'Please Choose'
                }

                return this.value.id
            }
        }
    }
</script>