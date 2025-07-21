<template>
    <Head title="Products" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Products</h1>

                    <ul class="space-y-4">
                        <li
                            v-for="product in products"
                            :key="product.id"
                            class="p-4 border rounded shadow"
                        >
                            <Link
                                :href="route('products.show', product.id)"
                                class="block"
                            >
                                <h2 >
                                    {{ product.name }}
                                </h2>
                                <p class="text-gray-700">{{ product.description }}</p>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    products: Array
});
</script>
