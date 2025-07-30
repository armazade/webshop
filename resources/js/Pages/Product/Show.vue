<template>
    <Head :title="product.name" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">{{ product.name }}</h1>

                    <div class="p-4 border rounded shadow">
                        <p class="text-gray-700">{{ product.description }}</p>
                        <p class="text-gray-700">€ {{ product.price }}</p>
                    </div>
                    <Link
                        :href="route('products.index')"
                        class="inline-block mb-6 text-sm text-indigo-600 hover:underline"
                    >
                        ← Back to Products
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    product: Object,
})
</script>

