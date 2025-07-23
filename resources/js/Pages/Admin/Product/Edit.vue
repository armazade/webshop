<template>
  <Head title="Edit Product" />

  <div>
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Product Details
    </h2>
  </div>

  <div class="py-12">
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
      <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
        <h1 class="text-2xl font-bold mb-4">Edit: {{ product.name }}</h1>
        <ProductUpdateForm :product="product" class="max-w-xl" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import ProductUpdateForm from '@/Components/ProductUpdateForm.vue'

const props = defineProps({
  product: Object,
});
</script>
