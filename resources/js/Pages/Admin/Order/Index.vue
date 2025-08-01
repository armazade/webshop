<template>
    <Head title="Orders"/>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Orders</h1>

                    <ul class="space-y-4">
                        <li
                            v-for="order in orders"
                            :key="order.id"
                            class="p-4 border rounded shadow"
                        >
                            <h2 class="text-lg font-semibold">Order #{{ order.id }}</h2>
                            <p class="text-gray-700">Status: {{ order.status }}</p>
                            <p class="text-gray-700">Total: € {{ order.total_price }}</p>

                            <div class="mt-2">
                                <p class="font-medium">Shipping Address:</p>
                                <p class="text-gray-700">
                                    {{ order.street }} {{ order.house_number }},<br>
                                    {{ order.postal_code }} {{ order.city }}, {{ order.country }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Head} from '@inertiajs/vue3'

defineProps({
    orders: Array
});
</script>
