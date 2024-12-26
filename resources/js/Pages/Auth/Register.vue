<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />
    <AuthenticationCard>
        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
            <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                <!-- Form -->
                <form class="row g-1 p-3 p-md-4" @submit.prevent="submit">
                    <div v-if="status" class="text-success bg-white text-center rounded p-2">
                        {{ status }}
                    </div>
                    <div class="col-12 text-center mb-1 mb-lg-5">
                        <h1>Create your account</h1>
                        <span>Free access to our app.</span>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="form-label">First name</label>
                            <TextInput id="name" v-model="form.first_name" type="text" required autofocus
                                autocomplete="name" placeholder="First name.." />
                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="form-label">Second name</label>
                            <TextInput id="name" v-model="form.last_name" type="text" required autofocus
                                autocomplete="name" placeholder="Last name.." />
                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Email address</label>
                            <TextInput id="email" v-model="form.email" type="email" required autocomplete="username"
                                placeholder="Email.." />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <TextInput id="password" v-model="form.password" type="password" required
                                autocomplete="new-password" placeholder="***" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Confirm password</label>
                            <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                                required autocomplete="new-password" placeholder="***" />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                    </div>
                    <div class="col-12" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and
                                    Conditions</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <!-- <a href="auth-signin.html" class="btn btn-lg btn-block btn-light lift text-uppercase"
                            alt="SIGNUP">SIGN UP</a> -->
                        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Register
                        </PrimaryButton>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <span class="text-muted">
                            <Link :href="route('login')" class="text-secondary">
                            Already registered?
                            </Link>
                        </span>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </AuthenticationCard>
</template>