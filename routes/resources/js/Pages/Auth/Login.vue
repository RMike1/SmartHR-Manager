<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

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
                                                src="admin/assets/images/authentication/facebook.svg" alt="img"> <span>Sign
                                                In
                                                with
                                                Facebook</span></button>
                                        <button type="button"
                                            class="btn mt-2 flex items-center justify-center gap-2 text-theme-bodycolor dark:text-themedark-bodycolor bg-theme-bodybg dark:bg-themedark-bodybg border border-theme-border dark:border-themedark-border hover:border-primary-500 dark:hover:border-primary-500"><img
                                                src="admin/assets/images/authentication/google.svg" alt="img">
                                            <span>Sign In with Google</span>
                                        </button>
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
                                <h4 class="text-center font-medium mb-4">Login with your email</h4>
                                <div class="mb-3">
                                    <TextInput type="email" v-model="form.email" class="form-control" placeholder="Email Address" required/>
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>
                                <div class="mb-4">
                                    <TextInput type="password" v-model="form.password" class="form-control" id="floatingInput1" placeholder="Password"/>
                                        <InputError class="mt-2" :message="form.errors.password" />
                                </div>
                                <div class="flex mt-1 justify-between items-center flex-wrap">
                                    <div class="form-check">
                                        <Checkbox v-model:checked="form.remember" name="remember" />    
                                        <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                                    </div>
                                    <h6 class="font-normal text-primary-500 mb-0">
                                        <Link v-if="canResetPassword" :href="route('password.request')">Forgot Password?
                                        </Link>
                                    </h6>
                                </div>
                                <div class="mt-4">
                                    <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">Login</PrimaryButton>
                                </div>
                                <div class="flex justify-between items-end flex-wrap mt-4">
                                    <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                                    <Link :href="route('register')" class="text-primary-500">Create Account</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
</template>
