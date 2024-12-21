<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />
    <AuthenticationCard>
        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
            <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                <!-- Form -->
                <form class="row g-1 p-3 p-md-4" @submit.prevent="submit">
                    <div class="col-12 text-center mb-1 mb-lg-5">
                        <h1>Sign in</h1>
                        <span>Free access to our app.</span>
                    </div>
                    <div class="col-12 text-center mb-4">
                        <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
                            <span class="d-flex justify-content-center align-items-center">
                                <img class="avatar xs me-2" src="admin/assets/images/google.svg"
                                    alt="Image Description">
                                Sign in with Google
                            </span>
                        </a>
                        <span class="dividers text-muted mt-4">OR</span>
                    </div>
                    <div v-if="status" class="text-success bg-white text-center rounded p-2">
                                    {{ status }}
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Email address</label>
                            <TextInput v-model="form.email" type="email"  placeholder="email.." required autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <div class="form-label">
                                <span class="d-flex justify-content-between align-items-center">
                                    Password
                                    <Link class="text-secondary" v-if="canResetPassword" :href="route('password.request')">Forgot Password?</Link>
                                </span>
                            </div>
                            <TextInput v-model="form.password" autocomplete="current-password" required type="password" placeholder="passcode..." />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Log in
                            </PrimaryButton>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <span class="">Don't have an account yet? 
                            <Link :href="route('register')" class="text-secondary">Sign up here</Link>
                            </span>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </AuthenticationCard>
</template>
