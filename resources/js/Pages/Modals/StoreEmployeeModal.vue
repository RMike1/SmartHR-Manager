<script setup>
import Layout from '@/Layouts/MainLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import ImageInput from '@/Components/ImageInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
defineOptions({
      layout: Layout
});
defineProps({
      'departments': Array,
      'jobtitles': Array,
      'showModal': Boolean,
});

const form = useForm({
      'employee_first_name': '',
      'employee_second_name': '',
      'employee_identity': '',
      'employee_email': '',
      'employee_phone': '',
      'department_id': '',
      'employee_passcode': '',
      'employee_description': '',
      'is_leader': false,
      'employee_image': '',
      'job_title_id': '',
      'joining_date': '',
});
const submit = () => {
      form.post(route('save.employee'), {
            // forceFormData:true,
            onSuccess: () => form.reset()
      });
};

</script>
<template>
      <form @submit.prevent="submit">
            <div class="modal fade"  id="addEmployeeModal"
      tabindex="-1"
      aria-labelledby="createprojectLabel"
      aria-hidden="true" :class="{ show: showModal }"
      :style="{ display: showModal ? 'block' : 'none' }">
                  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                              <div class="modal-header">
                                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Add Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                    <div class="deadline-form">
                                          <div class="row g-3 mb-3">
                                                <div class="col-sm-6">
                                                      <InputLabel for="employee_first_name" value="First Name" />
                                                      <TextInput type="text" v-model="form.employee_first_name"
                                                            placeholder="First Name.." id="employee_first_name"
                                                            autofocus autocomplete="firstName" />
                                                      <InputError class="mt-2"
                                                            :message="form.errors.employee_first_name" />
                                                </div>
                                                <div class="col-sm-6">
                                                      <InputLabel for="employee_second_name" value="Second Name" />
                                                      <TextInput type="text" v-model="form.employee_second_name"
                                                            placeholder="Second Name.." id="employee_second_name"
                                                            autofocus autocomplete="secondName" />
                                                      <InputError class="mt-2"
                                                            :message="form.errors.employee_second_name" />
                                                </div>
                                          </div>
                                          <div class="row g-3 mb-3">
                                                <div class="col-sm-6">
                                                      <InputLabel for="employee_identity" value="Employee ID" />
                                                      <TextInput type="text" v-model="form.employee_identity"
                                                            placeholder="Employee Id.." id="employee_identity" autofocus
                                                            autocomplete="employeeId" />
                                                      <InputError class="mt-2"
                                                            :message="form.errors.employee_identity" />
                                                </div>
                                                <div class="col-sm-6">
                                                      <InputLabel for="joining_date" value="Joining Date" />
                                                      <TextInput type="date" v-model="form.joining_date"
                                                            id="joining_date" autofocus />
                                                      <InputError class="mt-2" :message="form.errors.joining_date" />
                                                </div>
                                          </div>
                                          <div class="row g-3 mb-3">
                                                <div class="col">
                                                      <InputLabel for="employee_email" value="Email" />
                                                      <TextInput type="email" v-model="form.employee_email"
                                                            placeholder="Email.." id="employee_email" autofocus
                                                            autocomplete="employeeEmail" />
                                                      <InputError class="mt-2" :message="form.errors.employee_email" />
                                                </div>
                                                <div class="col">
                                                      <InputLabel for="employee_passcode" value="Passcode" />
                                                      <TextInput type="password" v-model="form.employee_passcode"
                                                            placeholder="Passcode" id="employee_passcode" autofocus />
                                                      <InputError class="mt-2"
                                                            :message="form.errors.employee_passcode" />
                                                </div>
                                          </div>
                                          <div class="row g-3 mb-3">
                                                <div class="col">
                                                      <InputLabel for="employee_phone" value="Phone" />
                                                      <TextInput type="text" v-model="form.employee_phone"
                                                            placeholder="Tel.." id="employee_phone" autofocus
                                                            autocomplete="employeePhone" />
                                                      <InputError class="mt-2" :message="form.errors.employee_phone" />
                                                </div>
                                                <div class="col">
                                                      <InputLabel value="Department" />
                                                      <select class="form-select" v-model="form.department_id">
                                                            <option disabled hidden selected>Select</option>
                                                            <option :value="department.id"
                                                                  v-for="(department, index) in departments"
                                                                  :key="index">{{ department.department_name }}</option>
                                                      </select>
                                                      <InputError class="mt-2" :message="form.errors.department_name" />
                                                </div>
                                          </div>
                                          <div class="row g-3 mb-3">
                                                <div class="col">
                                                      <InputLabel value="Position" />
                                                      <select class="form-select" v-model="form.job_title_id">
                                                            <option disabled hidden selected>Select</option>
                                                            <option v-for="(jobtitle, index) in jobtitles" :key="index"
                                                                  :value="jobtitle.id">
                                                                  {{ jobtitle.job_title_name }}</option>
                                                      </select>
                                                      <InputError class="mt-2" :message="form.errors.job_title_name" />
                                                </div>
                                                <div class="col">
                                                      <InputLabel value="Is Leader?" />
                                                      <div class="form-check">
                                                            <Checkbox v-model:checked="form.is_leader"
                                                                  name="is_leader" />
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                  Yes
                                                            </label>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="mb-3">
                                          <InputLabel for="employee_image" value="Employee Image" />
                                          <TextInput type="file" v-model="form.employee_image" id="employee_image" />
                                          <!-- <input  @input="form.employee_image=$event.target.files[0]" type="file"> -->
                                          <!-- <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                                {{ form.progress.percentage }}%
                                          </progress> -->
                                          <InputError class="mt-2" :message="form.errors.employee_image" />
                                    </div>
                                    <div class="mb-3">
                                          <InputLabel for="employee_description" value="Description (optional)" />
                                          <textarea class="form-control" v-model="form.employee_description"
                                                id="employee_description" rows="3"
                                                placeholder="Extra details about this Employee.."></textarea>
                                          <InputError class="mt-2" :message="form.errors.employee_description" />
                                    </div>
                              </div>
                              <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Done</button> -->
                                    <SecondaryButton data-bs-dismiss="modal" @click="form.cancel">
                                          Cancel
                                    </SecondaryButton>
                                    <PrimaryButton class="btn btn-primary" :class="{ 'opacity-25': form.processing }"
                                          :disabled="form.processing">
                                          <span v-if="form.processing">Saving...</span>
                                          <span v-else>Save</span>
                                    </PrimaryButton>
                              </div>
                        </div>
                  </div>
            </div>
      </form>
</template>