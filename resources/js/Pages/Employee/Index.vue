<script setup>
import { computed, ref } from 'vue';
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import StoreEmployeeModal from '../Modals/StoreEmployeeModal.vue';
import Layout from '@/Layouts/MainLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import ImageInput from '@/Components/ImageInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Checkbox from '@/Components/Checkbox.vue';
defineOptions({
      layout: Layout
});
const props = defineProps({
      'departments': Array,
      'jobtitles': Array,
      'employees': Array,
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
      'id':'',
});
const showModal = ref(false);
const editMode = ref('create');
const modalTitle = computed(() => (editMode.value === 'create' ? 'Add Employee' : 'Edit Employee'));
const modalSubMission = computed(() => (editMode.value === 'create' ? 'submit' : 'update'));
const buttonSubMission = computed(() => (editMode.value === 'create' ? 'Save' : 'Update'));
const buttonProcessingSubMission = computed(() => (editMode.value === 'create' ? 'Saving...' : 'Updating...'));
const selectedEmployee = ref(null);
const openModal = (emp) => {
      form.clearErrors();
      selectedEmployee.value = props.employees.find(employee => employee.id == emp);
      if (selectedEmployee.value) {
            editMode.value = 'edit';
            showModal.value = true;
            form.employee_first_name = selectedEmployee.value.employee_first_name || '';
            form.employee_second_name = selectedEmployee.value.employee_second_name || '';
            form.employee_identity = selectedEmployee.value.employee_identity || '';
            form.employee_email = selectedEmployee.value.employee_email || '';
            form.employee_phone = selectedEmployee.value.employee_phone || '';
            form.department_id = selectedEmployee.value.department_id || '';
            form.employee_passcode = selectedEmployee.value.employee_passcode || '';
            form.employee_description = selectedEmployee.value.employee_description || '';
            form.job_title_id = selectedEmployee.value.job_title_id || '';
            form.joining_date = selectedEmployee.value.joining_date || '';
            form.id = selectedEmployee.value.id;
            form.is_leader = selectedEmployee.value.is_leader ? true : false;
            form.employee_image = selectedEmployee.value.employee_image || null ;
      } else {
            form.reset();
            showModal.value = true;
            editMode.value = 'create';
      }
};

const change = (e) =>{
      form.employee_image=e.target.files[0];
      form.preview=URL.createObjectURL(e.target.files[0]);
}

const closeModal = () => {
      showModal.value = false;
};
const deleteEmp = (emp) => {
      if (confirm('sure to delete this?')) {
            router.delete(route('employee.delete', emp));
      }
}
const submit = () => {
      form.post(route('save.employee', {errorBag: 'createEmployee'}), {
            // forceFormData:true,
            onSuccess: () => {
                  form.reset();
                  closeModal();
            },
      });
};
const update = () => {
      form.put(route('update.employee',selectedEmployee.value), {
            // forceFormData:true,
            onSuccess: () => {
                  form.reset();
                  closeModal();
            },
      });
};

</script>
<template>

      <Head>
            <title>Projects</title>
      </Head>
      <!-- Body: Body -->
      <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                  <div class="row clearfix">
                        <div class="col-md-12">
                              <div class="card border-0 mb-4 no-bg">
                                    <div
                                          class="card-header py-3 px-0 d-sm-flex align-items-center  justify-content-between border-bottom">
                                          <h3 class=" fw-bold flex-fill mb-0 mt-sm-0">Employee</h3>

                                          <button class="btn btn-dark me-1 mt-1 w-sm-100" @click.prevent="openModal">
                                                <i class="icofont-plus-circle me-2 fs-6"></i>Add Employee
                                          </button>

                                          <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle mt-1  w-sm-100"
                                                      type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                      aria-expanded="false">
                                                      Status
                                                </button>
                                                <ul class="dropdown-menu  dropdown-menu-end"
                                                      aria-labelledby="dropdownMenuButton2">
                                                      <li><a class="dropdown-item" href="#">All</a></li>
                                                      <li><a class="dropdown-item" href="#">Task Assign Members</a></li>
                                                      <li><a class="dropdown-item" href="#">Not Assign Members</a></li>
                                                </ul>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div><!-- Row End -->
                  <div
                        class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4">
                        <div class="col" v-for="(employee, index) in employees" :key="index">
                              <div class="card teacher-card">
                                    <div class="card-body d-flex">
                                          <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                          <img :src="employee.employee_image ? ('storage/' + employee.employee_image) : ('storage/avatars/default.jpg')" class="avatar xl rounded-circle img-thumbnail shadow-sm"/>

                                                <!-- <div v-if="selectedEmployee?.employee_image">
                                                      <img :src="`/storage/${selectedEmployee.employee_image}`" alt="Employee Image" class="img-thumbnail" />
                                                      <p>Current Image</p>
                                                      </div>
                                                      <TextInput v-model="form.employee_image" label="Upload New Image" type="file" /> -->

                                                <div
                                                      class="about-info d-flex align-items-center mt-3 justify-content-center">
                                                      <div class="followers me-2">
                                                            <i class="icofont-tasks color-careys-pink fs-4"></i> <b />
                                                            <span class="">04</span>
                                                      </div>
                                                      <div class="star me-2">
                                                            <i class="icofont-star text-warning fs-4"></i> <b />
                                                            <span class="">4.5</span>
                                                      </div>
                                                      <div class="own-video">
                                                            <i class="icofont-data color-light-orange fs-4"></i> <b />
                                                            <span class="">04</span>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                                <h6 class="mb-0 mt-2  fw-bold d-block fs-6">
                                                      {{ employee.employee_first_name }} {{ employee.employee_second_name}}</h6>
                                                <span class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">
                                                      {{ employee.jobtitle.job_title_name }}</span>
                                                <div class="video-setting-icon mt-3 pt-3 border-top">
                                                      <p>{{ employee.employee_description }}</p>
                                                </div>
                                                <button href="task.html" class="btn btn-dark me-1 btn-sm mt-1">
                                                      <i class="icofont-plus-circle me-2 fs-6"></i>
                                                      Add Task</button>
                                                <!-- <a href="task.html" class="btn btn-dark me-1 btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>First Task</a> -->
                                                <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1">
                                                      <i class="icofont-invisible me-2 fs-6"></i>
                                                      Profile</a>
                                          </div>
                                          <div>
                                                <button @click.prevent="openModal(employee.id)" type="button"
                                                      class="btn btn-dark me-1 btn-sm mt-1" title="Edit Employee">
                                                      <i class="icofont-edit fs-6"></i></button>
                                                <button @click="deleteEmp(employee.id)" type="button"
                                                      class="btn btn-danger me-1 btn-sm mt-1" title="Edit Employee">
                                                      <i class="icofont-trash fs-6"></i></button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Modal Members-->
      <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div class="inviteby_email">
                                    <div class="input-group mb-3">
                                          <input type="email" class="form-control" placeholder="Email address"
                                                id="exampleInputEmail2" aria-describedby="exampleInputEmail2">
                                          <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                                    </div>
                              </div>
                              <div class="members_list">
                                    <h6 class="fw-bold ">Employee </h6>
                                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                                          <li class="list-group-item py-3 text-center text-md-start">
                                                <div
                                                      class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                                      <div class="no-thumbnail mb-2 mb-md-0">
                                                            <img class="avatar lg rounded-circle"
                                                                  src="admin/assets/images/xs/avatar2.jpg" alt="">
                                                      </div>
                                                      <div class="flex-fill ms-3 text-truncate">
                                                            <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                                            <span class="text-muted">rachel.carr@gmail.com</span>
                                                      </div>
                                                      <div class="members-action">
                                                            <span class="members-role ">Admin</span>
                                                            <div class="btn-group">
                                                                  <button type="button"
                                                                        class="btn bg-transparent dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="icofont-ui-settings  fs-6"></i>
                                                                  </button>
                                                                  <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="#"><i
                                                                                          class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#"><i
                                                                                          class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a>
                                                                        </li>
                                                                  </ul>
                                                            </div>
                                                      </div>
                                                </div>
                                          </li>
                                          <li class="list-group-item py-3 text-center text-md-start">
                                                <div
                                                      class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                                      <div class="no-thumbnail mb-2 mb-md-0">
                                                            <img class="avatar lg rounded-circle"
                                                                  src="admin/assets/images/xs/avatar3.jpg" alt="">
                                                      </div>
                                                      <div class="flex-fill ms-3 text-truncate">
                                                            <h6 class="mb-0  fw-bold">Lucas Baker<a href="#"
                                                                        class="link-secondary ms-2">(Resend
                                                                        invitation)</a></h6>
                                                            <span class="text-muted">lucas.baker@gmail.com</span>
                                                      </div>
                                                      <div class="members-action">
                                                            <div class="btn-group">
                                                                  <button type="button"
                                                                        class="btn bg-transparent dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Members
                                                                  </button>
                                                                  <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                              <a class="dropdown-item" href="#">
                                                                                    <i
                                                                                          class="icofont-check-circled"></i>
                                                                                    Member
                                                                                    <span>Can view, edit, delete,
                                                                                          comment on and save
                                                                                          files</span>
                                                                              </a>

                                                                        </li>
                                                                        <li>
                                                                              <a class="dropdown-item" href="#">
                                                                                    <i class="fs-6 p-2 me-1"></i>
                                                                                    Admin
                                                                                    <span>Member, but can invite and
                                                                                          manage team members</span>
                                                                              </a>
                                                                        </li>
                                                                  </ul>
                                                            </div>
                                                            <div class="btn-group">
                                                                  <button type="button"
                                                                        class="btn bg-transparent dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="icofont-ui-settings  fs-6"></i>
                                                                  </button>
                                                                  <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="#"><i
                                                                                          class="icofont-delete-alt fs-6 me-2"></i>Delete
                                                                                    Member</a></li>
                                                                  </ul>
                                                            </div>
                                                      </div>
                                                </div>
                                          </li>
                                          <li class="list-group-item py-3 text-center text-md-start">
                                                <div
                                                      class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                                      <div class="no-thumbnail mb-2 mb-md-0">
                                                            <img class="avatar lg rounded-circle"
                                                                  src="admin/assets/images/xs/avatar8.jpg" alt="">
                                                      </div>
                                                      <div class="flex-fill ms-3 text-truncate">
                                                            <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                                            <span class="text-muted">una.coleman@gmail.com</span>
                                                      </div>
                                                      <div class="members-action">
                                                            <div class="btn-group">
                                                                  <button type="button"
                                                                        class="btn bg-transparent dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Members
                                                                  </button>
                                                                  <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                              <a class="dropdown-item" href="#">
                                                                                    <i
                                                                                          class="icofont-check-circled"></i>
                                                                                    Member
                                                                                    <span>Can view, edit, delete,
                                                                                          comment on and save
                                                                                          files</span>
                                                                              </a>
                                                                        </li>
                                                                        <li>
                                                                              <a class="dropdown-item" href="#">
                                                                                    <i class="fs-6 p-2 me-1"></i>
                                                                                    Admin
                                                                                    <span>Member, but can invite and
                                                                                          manage team members</span>
                                                                              </a>
                                                                        </li>
                                                                  </ul>
                                                            </div>
                                                            <div class="btn-group">
                                                                  <div class="btn-group">
                                                                        <button type="button"
                                                                              class="btn bg-transparent dropdown-toggle"
                                                                              data-bs-toggle="dropdown"
                                                                              aria-expanded="false">
                                                                              <i class="icofont-ui-settings  fs-6"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                              <li><a class="dropdown-item" href="#"><i
                                                                                                class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a>
                                                                              </li>
                                                                              <li><a class="dropdown-item" href="#"><i
                                                                                                class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a>
                                                                              </li>
                                                                              <li><a class="dropdown-item" href="#"><i
                                                                                                class="icofont-delete-alt fs-6 me-2"></i>Suspend
                                                                                          member</a></li>
                                                                              <li><a class="dropdown-item" href="#"><i
                                                                                                class="icofont-not-allowed fs-6 me-2"></i>Delete
                                                                                          Member</a></li>
                                                                        </ul>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Modal Employee-->
      <form @submit.prevent="modalSubMission === 'submit' ? submit() : update()">
            <transition name="slide-down">
                  <div class="modal fade" v-if="showModal" :class="{ show: showModal }"
                        :style="{ display: showModal ? 'block' : 'none' }" @click.self.prevent="closeModal">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                              <div class="modal-content">
                                    <div class="modal-header">
                                          <h5 class="modal-title  fw-bold" id="createprojectlLabel">{{ modalTitle }}
                                          </h5>
                                          <button type="button" class="btn-close" @click="closeModal"></button>
                                    </div>
                                    <div class="modal-body">
                                          <div class="deadline-form">
                                                <div class="row g-3 mb-3">
                                                      <div class="col-sm-6">
                                                            <InputLabel for="employee_first_name" value="First Name" />
                                                            <TextInput type="text" v-model="form.employee_first_name"
                                                                  placeholder="First Name.." id="employee_first_name"
                                                                  autocomplete="firstName" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.employee_first_name" />
                                                      </div>
                                                      <div class="col-sm-6">
                                                            <InputLabel for="employee_second_name"
                                                                  value="Second Name" />
                                                            <TextInput type="text" v-model="form.employee_second_name"
                                                                  placeholder="Second Name.." id="employee_second_name"
                                                                  autocomplete="secondName" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.employee_second_name" />
                                                      </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                      <div class="col-sm-6">
                                                            <InputLabel for="employee_identity" value="Employee ID" />
                                                            <TextInput type="text" v-model="form.employee_identity"
                                                                  placeholder="Employee Id.." id="employee_identity"
                                                                  autocomplete="employeeId" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.employee_identity" />
                                                      </div>
                                                      <div class="col-sm-6">
                                                            <InputLabel for="joining_date" value="Joining Date" />
                                                            <TextInput type="date" v-model="form.joining_date"
                                                                  id="joining_date" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.joining_date" />
                                                      </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                      <div class="col">
                                                            <InputLabel for="employee_email" value="Email" />
                                                            <TextInput type="email" v-model="form.employee_email"
                                                                  placeholder="Email.." id="employee_email"
                                                                  autocomplete="employeeEmail" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.employee_email" />
                                                      </div>
                                                      <div class="col">
                                                            <InputLabel for="employee_passcode" value="Passcode" />
                                                            <TextInput type="password" v-model="form.employee_passcode"
                                                                  placeholder="Passcode" id="employee_passcode" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.employee_passcode" />
                                                      </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                      <div class="col">
                                                            <InputLabel for="employee_phone" value="Phone" />
                                                            <TextInput type="text" v-model="form.employee_phone"
                                                                  placeholder="Tel.." id="employee_phone"
                                                                  autocomplete="employeePhone" />
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.employee_phone" />
                                                      </div>
                                                      <div class="col">
                                                            <InputLabel value="Department" />
                                                            <select class="form-select" v-model="form.department_id">
                                                                  <option disabled hidden selected>Select</option>
                                                                  <option :value="department.id"
                                                                        v-for="(department, index) in departments"
                                                                        :key="index">{{ department.department_name }}
                                                                  </option>
                                                            </select>
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.department_id" />
                                                      </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                      <div class="col">
                                                            <InputLabel value="Position" />
                                                            <select class="form-select" v-model="form.job_title_id">
                                                                  <option disabled hidden selected>Select</option>
                                                                  <option v-for="(jobtitle, index) in jobtitles"
                                                                        :key="index" :value="jobtitle.id">
                                                                        {{ jobtitle.job_title_name }}</option>
                                                            </select>
                                                            <InputError class="mt-2"
                                                                  :message="form.errors.job_title_id" />
                                                      </div>
                                                      <div class="col">
                                                            <InputLabel value="Is Leader?" />
                                                            <div class="form-check">
                                                                  <Checkbox v-model:checked="form.is_leader"
                                                                        name="is_leader" />
                                                                  <label class="form-check-label"
                                                                        for="flexCheckDefault">
                                                                        Yes
                                                                  </label>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="mb-3">
                                                <InputLabel for="employee_image" value="Employee Image" />
                                                <TextInput type="file" id="employee_image" accept="image/*" @input="change"/>
                                                <img type="file" :src="form.preview ?? form.preview" style="width: 50px; height: auto;"/>
                                                <img :src="'storage/' + form.employee_image"  style="height: auto; width: 50px;" alt="">
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
                                          <SecondaryButton @click="closeModal">
                                                Cancel
                                          </SecondaryButton>
                                          <PrimaryButton class="btn btn-primary"
                                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                <span v-if="form.processing">{{ buttonProcessingSubMission }}</span>
                                                <span v-else>{{ buttonSubMission }}</span>
                                          </PrimaryButton>
                                    </div>
                              </div>
                        </div>
                  </div>
            </transition>
      </form>
      <div class="modal-backdrop fade show" v-if="showModal"></div>
</template>
<style scoped>
.slide-down-enter-active,
.slide-down-leave-active {
      transition: transform 0.3s ease, opacity 0.3s ease;
}

.slide-down-enter-from,
.slide-down-leave-to {
      transform: translateY(-30px);
      opacity: 0;
}

.slide-down-enter-to,
.slide-down-leave-from {
      transform: translateY(0);
      opacity: 1;
}
</style>
