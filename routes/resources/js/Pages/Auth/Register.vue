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
    name: '',
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
    <form @submit.prevent="submit">
        <div class="auth-main relative">
            <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
                <div
                    class="auth-form flex items-center justify-center grow flex-col min-h-screen bg-cover relative p-6 bg-[url('../images/authentication/img-auth-bg.jpg')] dark:bg-none dark:bg-themedark-bodybg">
                    <div class="card sm:my-12 w-full max-w-[480px] shadow-none">
                        <div class="card-body !p-10">
                            <div class="text-center">
                                <AuthenticationCardLogo />
                                <div class="grid my-4">
                                    <button type="button"
                                        class="btn mt-2 flex items-center justify-center gap-2 text-theme-bodycolor dark:text-themedark-bodycolor bg-theme-bodybg dark:bg-themedark-bodybg border border-theme-border dark:border-themedark-border hover:border-primary-500 dark:hover:border-primary-500"><img
                                            src="admin/assets/images/authentication/facebook.svg" alt="img"> <span>Sign In
                                            with
                                            Facebook</span></button>
                                    <button type="button"
                                        class="btn mt-2 flex items-center justify-center gap-2 text-theme-bodycolor dark:text-themedark-bodycolor bg-theme-bodybg dark:bg-themedark-bodybg border border-theme-border dark:border-themedark-border hover:border-primary-500 dark:hover:border-primary-500"><img
                                            src="admin/assets/images/authentication/google.svg" alt="img">
                                        <span>Sign In with Google</span></button>
                                </div>
                            </div>
                            <div class="relative my-5">
                                <div aria-hidden="true" class="absolute flex inset-0 items-center">
                                    <div class="w-full border-t border-theme-border dark:border-themedark-border">
                                    </div>
                                </div>
                                <div class="relative flex justify-center"><span
                                        class="px-4 bg-theme-cardbg dark:bg-themedark-cardbg">OR</span>
                                </div>
                            </div>
                            <h4 class="text-center font-medium mb-4">Sign up with your work email.</h4>
                            <div class="mb-3">
                                <TextInput v-model="form.name" type="text" class="form-control"
                                    required autofocus autocomplete="name" placeholder="Names.."/>
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="mb-3">
                                <TextInput type="email" v-model="form.email" class="form-control" placeholder="Email Address" required autofocus autocomplete="username"/>
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="mb-3">
                                <TextInput type="password" v-model="form.password" class="form-control" placeholder="Password" autocomplete="new-password" required autofocus />
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>
                            <div class="mb-4">
                                <TextInput type="password" v-model="form.password_confirmation" class="form-control" placeholder="Confirm Password" autocomplete="new-password" required autofocus />
                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
                            </div>
                            <div class="mt-4">
                                <PrimaryButton  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Sign up</PrimaryButton>
                                </div>
                            <div class="flex justify-between items-end flex-wrap mt-4">
                                <h6 class="f-w-500 mb-0">Already have an Account?</h6>
                                <Link :href="route('login')" class="text-primary-500">Login here</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
