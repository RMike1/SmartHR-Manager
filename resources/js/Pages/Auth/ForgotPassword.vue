<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" @submit.prevent="submit">
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <img src="admin/assets/images/forgot-password.svg" class="w240 mb-4" alt="" />
                                    <h1>Forgot password?</h1>
                                    <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
                                </div>
                                <div v-if="status" class="text-success bg-white text-center rounded p-2">
                                    {{ status }}
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <TextInput
                                        v-model="form.email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="email.."
                                    />
                                    <InputError class="mt-2" :message="form.errors.email" />
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Submit
                                    </PrimaryButton>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">
                                        <Link :href="route('login')" class="text-secondary">Back to Sign in</Link>
                                    </span>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div>
                    </div>
    </AuthenticationCard>
    </template>
