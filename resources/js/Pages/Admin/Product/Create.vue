<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import {Head, useForm} from '@inertiajs/vue3'

const form = useForm({
    name: '',
    description: '',
    price: '',
    image: null,
})

const submit = () => {
    form.post(route('admin.products.store'), {
        forceFormData: true,
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Create Product" />

        <form @submit.prevent="submit" class="max-w-xl mx-auto space-y-6 mt-10">
            <div>
                <InputLabel for="name" value="Product Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />

                <textarea
                    id="description"
                    v-model="form.description"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    rows="4"
                ></textarea>

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div>
                <InputLabel for="price" value="Price in euros"/>

                <input
                    id="price"
                    min="0"
                    v-model="form.price"
                    step="10.00"
                    type="number"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                />

                <InputError :message="form.errors.price" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="image" value="Product Image"/>
                <input id="image" type="file" @change="e => form.image = e.target.files[0]"/>
                <InputError :message="form.errors.image" class="mt-2"/>
            </div>

            <div class="flex justify-end">
                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Create Product
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
