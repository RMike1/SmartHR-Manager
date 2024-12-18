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
    <form @submit.prevent="submit">
        <div class="auth-main relative">
            <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
                <div
                    class="auth-form flex items-center justify-center grow flex-col min-h-screen bg-cover relative p-6 bg-[url('../images/authentication/img-auth-bg.jpg')] dark:bg-none dark:bg-themedark-bodybg">
                    <div class="card sm:my-12 w-full max-w-[480px] shadow-none">
                        <div class="card-body !p-10">
                            <AuthenticationCardLogo />
                            <div class="flex justify-between items-end mb-4">
                                <h3 class="mb-0"><b>Forgot Password</b></h3>
                                <Link :href="route('login')" class="text-primary-500">Back to Login</Link>
                            </div>
                            <div class="mb-3">
                                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ status }}
                                </div>
                                <label class="form-label">Email Address</label>
                                <TextInput id="floatingInput" v-model="form.email" type="email" class="form-control"
                                    required autofocus autocomplete="username" placeholder="Email Address" />
                                <InputError class="mt-2" :message="form.errors.email" />

                            </div>
                            <p class="mt-4 text-sm text-muted">Do not forgot to check SPAM box.</p>
                            <div class="grid mt-3">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Send Password Reset Email
                                </PrimaryButton>
                                <!-- <button type="button" class="btn btn-success" id="btn-success-ac">Success</button> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
