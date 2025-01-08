<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import Layout from '@/Layouts/MainLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
defineOptions({
      layout: Layout
});
const props = defineProps({
      'projectCategories': Array,
      'projectNotifications': Array,
});
const showCreateProjectModal = ref(false);
const createProject = () => {
      showCreateProjectModal.value = true;
}
const closeModal = () => {
      showCreateProjectModal.value = false;
}

const storeProject = () => {
}
const form = useForm({
            'project_name':null,
            'project_description':null,
            'project_status':null,
            'project_image':null,
            'project_budget':null,
            'notification':null,
            'description':null,
            'employee_id':null,
            'category_id':null,
            'start_date':null,
            'end_date':null,
});

const handleKeyUp = (event) => {
  if (event.key === 'Escape' && showCreateProjectModal.value) {
    closeModal();
  }
};
onMounted(() => {
  window.addEventListener('keyup', handleKeyUp);
});

onBeforeUnmount(() => {
  window.removeEventListener('keyup', handleKeyUp);
});
</script>

<template>

      <Head>
            <title>Projects</title>
      </Head>
      <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                  <div class="row align-items-center">
                        <div class="border-0 mb-4">
                              <div
                                    class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bold py-3 mb-0">Projects</h3>
                                    <div class="d-flex py-2 project-tab flex-wrap w-sm-100">

                                          <button type="button" class="btn btn-dark w-sm-100"
                                                @click.prevent="createProject">
                                                <i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button>

                                          <ul class="nav nav-tabs tab-body-header rounded ms-3 prtab-set w-sm-100"
                                                role="tablist">
                                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                            href="#All-list" role="tab">All</a></li>
                                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                            href="#Started-list" role="tab">Started</a></li>
                                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                            href="#Approval-list" role="tab">Approval</a></li>
                                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                            href="#Completed-list" role="tab">Completed</a></li>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                  </div> <!-- Row end  -->
                  <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 flex-column">
                              <div class="tab-content mt-4">
                                    <div class="tab-pane fade show active" id="All-list">
                                          <div class="row g-3 gy-5 py-3 row-deck">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                      <div class="card">
                                                            <div class="card-body">
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mt-5">
                                                                        <div class="lesson_name">
                                                                              <div class="project-block bg-careys-pink">
                                                                                    <i class="icofont-site-map"></i>
                                                                              </div>
                                                                              <span
                                                                                    class="small text-muted project_name fw-bold">
                                                                                    Java Dalia </span>
                                                                              <h6 class="mb-0 fw-bold  fs-6  mb-2">
                                                                                    Backend Development</h6>
                                                                        </div>
                                                                        <div class="btn-group" role="group"
                                                                              aria-label="Basic outlined example">
                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editproject"><i
                                                                                          class="icofont-edit text-success"></i></button>
                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#deleteproject"><i
                                                                                          class="icofont-ui-delete text-danger"></i></button>
                                                                        </div>
                                                                  </div>
                                                                  <div class="d-flex align-items-center">
                                                                        <div
                                                                              class="avatar-list avatar-list-stacked pt-2">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar2.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar1.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar3.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar4.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar7.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar10.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar11.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar6.jpg"
                                                                                    alt="">
                                                                              <span class="avatar rounded-circle text-center pointer sm"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#addUser"><i
                                                                                          class="icofont-ui-add"></i></span>
                                                                        </div>
                                                                  </div>
                                                                  <div class="row g-2 pt-4">
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-paper-clip"></i>
                                                                                    <span class="ms-2">8
                                                                                          Attach</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-sand-clock"></i>
                                                                                    <span class="ms-2">8Month</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i
                                                                                          class="icofont-group-students "></i>
                                                                                    <span class="ms-2">8
                                                                                          Members</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-ui-text-chat"></i>
                                                                                    <span class="ms-2">7</span>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="dividers-block"></div>
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h4 class="small fw-bold mb-0">Progress
                                                                        </h4>
                                                                        <span
                                                                              class="small light-danger-bg  p-1 rounded"><i
                                                                                    class="icofont-ui-clock"></i>
                                                                              10 Days Left</span>
                                                                  </div>
                                                                  <div class="progress" style="height: 8px;">
                                                                        <div class="progress-bar bg-secondary"
                                                                              role="progressbar" style="width: 25%"
                                                                              aria-valuenow="15" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 25%"
                                                                              aria-valuenow="30" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 23%"
                                                                              aria-valuenow="23" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="tab-pane fade" id="Started-list">
                                          <div class="row g-3 gy-5 py-3 row-deck">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                      <div class="card">
                                                            <div class="card-body">
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mt-5">
                                                                        <div class="lesson_name">
                                                                              <div class="project-block light-info-bg">
                                                                                    <i class="icofont-paint"></i>
                                                                              </div>
                                                                              <span
                                                                                    class="small text-muted project_name fw-bold">
                                                                                    Social Geek Made </span>
                                                                              <h6 class="mb-0 fw-bold  fs-6  mb-2">
                                                                                    UI/UX Design</h6>
                                                                        </div>
                                                                        <div class="btn-group" role="group"
                                                                              aria-label="Basic outlined example">
                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editproject"><i
                                                                                          class="icofont-edit text-success"></i></button>
                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#deleteproject"><i
                                                                                          class="icofont-ui-delete text-danger"></i></button>
                                                                        </div>
                                                                  </div>
                                                                  <div class="d-flex align-items-center">
                                                                        <div
                                                                              class="avatar-list avatar-list-stacked pt-2">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar2.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar1.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar3.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar4.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar8.jpg"
                                                                                    alt="">
                                                                              <span class="avatar rounded-circle text-center pointer sm"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#addUser"><i
                                                                                          class="icofont-ui-add"></i></span>
                                                                        </div>
                                                                  </div>
                                                                  <div class="row g-2 pt-4">
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-paper-clip"></i>
                                                                                    <span class="ms-2">5
                                                                                          Attach</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-sand-clock"></i>
                                                                                    <span class="ms-2">4
                                                                                          Month</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i
                                                                                          class="icofont-group-students "></i>
                                                                                    <span class="ms-2">5
                                                                                          Members</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-ui-text-chat"></i>
                                                                                    <span class="ms-2">10</span>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="dividers-block"></div>
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h4 class="small fw-bold mb-0">Progress
                                                                        </h4>
                                                                        <span
                                                                              class="small light-danger-bg  p-1 rounded"><i
                                                                                    class="icofont-ui-clock"></i>
                                                                              35 Days Left</span>
                                                                  </div>
                                                                  <div class="progress" style="height: 8px;">
                                                                        <div class="progress-bar bg-secondary"
                                                                              role="progressbar" style="width: 25%"
                                                                              aria-valuenow="15" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 25%"
                                                                              aria-valuenow="30" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 10%"
                                                                              aria-valuenow="10" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                    </div>
                                    <div class="tab-pane fade" id="Approval-list">
                                          <div class="row g-3 gy-5 py-3 row-deck">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                      <div class="card">
                                                            <div class="card-body">
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mt-5">
                                                                        <div class="lesson_name">
                                                                              <div class="project-block light-info-bg">
                                                                                    <i class="icofont-paint"></i>
                                                                              </div>
                                                                              <span
                                                                                    class="small text-muted project_name fw-bold">
                                                                                    Software Chasers </span>
                                                                              <h6 class="mb-0 fw-bold  fs-6  mb-2">
                                                                                    UI/UX Design</h6>
                                                                        </div>
                                                                        <div class="btn-group" role="group"
                                                                              aria-label="Basic outlined example">
                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editproject"><i
                                                                                          class="icofont-edit text-success"></i></button>
                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#deleteproject"><i
                                                                                          class="icofont-ui-delete text-danger"></i></button>
                                                                        </div>
                                                                  </div>
                                                                  <div class="d-flex align-items-center">
                                                                        <div
                                                                              class="avatar-list avatar-list-stacked pt-2">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar2.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar1.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar3.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar4.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar8.jpg"
                                                                                    alt="">
                                                                              <span class="avatar rounded-circle text-center pointer sm"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#addUser"><i
                                                                                          class="icofont-ui-add"></i></span>
                                                                        </div>
                                                                  </div>
                                                                  <div class="row g-2 pt-4">
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-paper-clip"></i>
                                                                                    <span class="ms-2">5
                                                                                          Attach</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-sand-clock"></i>
                                                                                    <span class="ms-2">4
                                                                                          Month</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i
                                                                                          class="icofont-group-students "></i>
                                                                                    <span class="ms-2">5
                                                                                          Members</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-ui-text-chat"></i>
                                                                                    <span class="ms-2">10</span>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="dividers-block"></div>
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h4 class="small fw-bold mb-0">Progress
                                                                        </h4>
                                                                        <span
                                                                              class="small light-warning-bg  p-1 rounded"><i
                                                                                    class="icofont-ui-clock"></i>
                                                                              Approval</span>
                                                                  </div>
                                                                  <div class="progress" style="height: 8px;">
                                                                        <div class="progress-bar bg-secondary"
                                                                              role="progressbar" style="width: 0%"
                                                                              aria-valuenow="15" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 0%"
                                                                              aria-valuenow="30" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 0%"
                                                                              aria-valuenow="80" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="tab-pane fade" id="Completed-list">
                                          <div class="row g-3 gy-5 py-3 row-deck">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                      <div class="card">
                                                            <div class="card-body">
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mt-5">
                                                                        <div class="lesson_name">
                                                                              <div
                                                                                    class="project-block light-orange-bg">
                                                                                    <i
                                                                                          class="icofont-dashboard-web"></i>
                                                                              </div>
                                                                              <span
                                                                                    class="small text-muted project_name fw-bold">
                                                                                    Firestorm </span>
                                                                              <h6 class="mb-0 fw-bold  fs-6  mb-2">
                                                                                    Development</h6>
                                                                        </div>
                                                                        <div class="btn-group" role="group"
                                                                              aria-label="Basic outlined example">

                                                                              <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#deleteproject"><i
                                                                                          class="icofont-ui-delete text-danger"></i></button>
                                                                        </div>
                                                                  </div>
                                                                  <div class="d-flex align-items-center">
                                                                        <div
                                                                              class="avatar-list avatar-list-stacked pt-2">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar2.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar1.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar3.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar4.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar8.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar9.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar11.jpg"
                                                                                    alt="">
                                                                              <img class="avatar rounded-circle sm"
                                                                                    src="admin/assets/images/xs/avatar6.jpg"
                                                                                    alt="">

                                                                        </div>
                                                                  </div>
                                                                  <div class="row g-2 pt-4">
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-paper-clip"></i>
                                                                                    <span class="ms-2">10
                                                                                          Attach</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-sand-clock"></i>
                                                                                    <span
                                                                                          class="ms-2 text-success">Completed</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i
                                                                                          class="icofont-group-students "></i>
                                                                                    <span class="ms-2">8
                                                                                          Members</span>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                              <div class="d-flex align-items-center">
                                                                                    <i class="icofont-ui-text-chat"></i>
                                                                                    <span class="ms-2">45</span>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="dividers-block"></div>
                                                                  <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h4 class="small fw-bold mb-0">Progress
                                                                        </h4>
                                                                        <span
                                                                              class="small light-success-bg  p-1 rounded"><i
                                                                                    class="icofont-ui-clock"></i>
                                                                              Completed</span>
                                                                  </div>
                                                                  <div class="progress" style="height: 8px;">
                                                                        <div class="progress-bar bg-secondary"
                                                                              role="progressbar" style="width: 25%"
                                                                              aria-valuenow="15" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 25%"
                                                                              aria-valuenow="30" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                        <div class="progress-bar bg-secondary ms-1"
                                                                              role="progressbar" style="width: 50%"
                                                                              aria-valuenow="39" aria-valuemin="0"
                                                                              aria-valuemax="100"></div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Create Project-->
      <form @submit.prevent="storeProject">
            <transition name="slide-down">
                  <div class="modal fade" tabindex="-1" v-if="showCreateProjectModal" @click.self.prevent="closeModal"
                        :class="{ show: showCreateProjectModal }"
                        :style="{ display: showCreateProjectModal ? 'block' : 'none' }">
                        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                              <div class="modal-content">
                                    <div class="modal-header">
                                          <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Project</h5>

                                          <button type="button" class="btn-close" @click="closeModal"></button>
                                    </div>
                                    <div class="modal-body">
                                          <div class="mb-3">
                                                <InputLabel for="project_name" value="Project Name" />
                                                <TextInput type="text" v-model="form.project_name"
                                                      placeholder="Project Name.." id="project_name" autocomplete="projectName" />
                                                <InputError class="mt-2" :message="form.errors.project_name" />
                                          </div>
                                          <div class="mb-3">
                                                <InputLabel for="project_category" value="Project Category" />
                                                <select class="form-select" v-model="form.category_id">
                                                      <option selected disabled value="">Select Category</option>
                                                      <option v-for="(projectCategory, index) in projectCategories" :key="index" :value="projectCategory.id">{{ projectCategory.name }}</option>
                                                </select>
                                                <InputError class="mt-2" :message="form.errors.category_id" />
                                          </div>
                                          <div class="mb-3">
                                                <label for="formFileMultipleone" class="form-label">Project Images &
                                                      Document</label>
                                                <input class="form-control" type="file" id="formFileMultipleone"
                                                      multiple>
                                          </div>
                                          <div class="deadline-form">
                                                      <div class="row g-3 mb-3">
                                                            <div class="col">
                                                                  <InputLabel for="start-date" value="Project Start Date" />
                                                                  <TextInput type="date" v-model="form.start_date"
                                                                        id="start-date" autocomplete="startDate" />
                                                                  <InputError class="mt-2" :message="form.errors.start_date" />
                                                            </div>
                                                            <div class="col">
                                                                  <InputLabel for="end-date" value="Project End Date"/>
                                                                  <TextInput type="date" v-model="form.end_date" id="end-date" autocomplete="endDate"/>
                                                                  <InputError class="mt-2" :message="form.errors.end_date" />
                                                            </div>
                                                      </div>
                                                      <div class="row g-3 mb-3">
                                                            <div class="col-sm-12">
                                                                  <label class="form-label">Notifation Sent</label>
                                                                  <select class="form-select" v-model="form.notification">
                                                                        <option selected v-for="(projectNotification, index) in projectNotifications" :key="index" :value="projectNotification">{{projectNotification}}</option>
                                                                  </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                  <label for="formFileMultipleone"class="form-label">Task Assign Person</label>
                                                                  <select class="form-select" multiple
                                                                        aria-label="Default select Priority">
                                                                        <option selected>Lucinda Massey</option>
                                                                        <option value="1">Ryan Nolan</option>
                                                                        <option value="2">Oliver Black</option>
                                                                        <option value="3">Adam Walker</option>
                                                                        <option value="4">Brian Skinner</option>
                                                                        <option value="5">Dan Short</option>
                                                                        <option value="5">Jack Glover</option>
                                                                  </select>
                                                            </div>
                                                      </div>
                                          </div>
                                          <div class="row g-3 mb-3">
                                                <div class="col-sm">
                                                      <label for="formFileMultipleone" class="form-label">Budget</label>
                                                      <input type="number" class="form-control">
                                                </div>
                                                <div class="col-sm">
                                                      <label for="formFileMultipleone"
                                                            class="form-label">Priority</label>
                                                      <select class="form-select" aria-label="Default select Priority">
                                                            <option selected>Highest</option>
                                                            <option value="1">Medium</option>
                                                            <option value="2">Low</option>
                                                            <option value="3">Lowest</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="mb-3">
                                                <label for="exampleFormControlTextarea78" class="form-label">Description
                                                      (optional)</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea78"
                                                      rows="3"
                                                      placeholder="Add any extra details about the request"></textarea>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                                @click="closeModal">Done</button>
                                          <button type="button" class="btn btn-primary">Create</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </transition>
      </form>

      <!-- Edit Project-->
      <div class="modal fade" id="editproject" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title  fw-bold" id="editprojectLabel"> Edit Project</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div class="mb-3">
                                    <label for="exampleFormControlInput78" class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput78"
                                          value="Social Geek Made">
                              </div>
                              <div class="mb-3">
                                    <label class="form-label">Project Category</label>
                                    <select class="form-select" aria-label="Default select example">
                                          <option selected>UI/UX Design</option>
                                          <option value="1">Website Design</option>
                                          <option value="2">App Development</option>
                                          <option value="3">Quality Assurance</option>
                                          <option value="4">Development</option>
                                          <option value="5">Backend Development</option>
                                          <option value="6">Software Testing</option>
                                          <option value="7">Website Design</option>
                                          <option value="8">Marketing</option>
                                          <option value="9">SEO</option>
                                          <option value="10">Other</option>
                                    </select>
                              </div>
                              <div class="mb-3">
                                    <label for="formFileMultiple456" class="form-label">Project Images &
                                          Document</label>
                                    <input class="form-control" type="file" id="formFileMultiple456">
                              </div>
                              <div class="deadline-form">
                                    <form>
                                          <div class="row g-3 mb-3">
                                                <div class="col">
                                                      <label for="datepickerded123" class="form-label">Project
                                                            Start Date</label>
                                                      <input type="date" class="form-control" id="datepickerded123"
                                                            value="2021-01-10">
                                                </div>
                                                <div class="col">
                                                      <label for="datepickerded456" class="form-label">Project End
                                                            Date</label>
                                                      <input type="date" class="form-control" id="datepickerded456"
                                                            value="2021-04-10">
                                                </div>
                                          </div>
                                          <div class="row g-3 mb-3">
                                                <div class="col-sm-12">
                                                      <label class="form-label">Notifation Sent</label>
                                                      <select class="form-select" aria-label="Default select example">
                                                            <option selected>All</option>
                                                            <option value="1">Team Leader Only</option>
                                                            <option value="2">Team Member Only</option>
                                                      </select>
                                                </div>
                                                <div class="col-sm-12">
                                                      <label for="formFileMultipleone" class="form-label">Task
                                                            Assign Person</label>
                                                      <select class="form-select" multiple
                                                            aria-label="Default select Priority">
                                                            <option selected>Lucinda Massey</option>
                                                            <option selected value="1">Ryan Nolan</option>
                                                            <option selected value="2">Oliver Black</option>
                                                            <option selected value="3">Adam Walker</option>
                                                            <option selected value="4">Brian Skinner</option>
                                                            <option value="5">Dan Short</option>
                                                            <option value="5">Jack Glover</option>
                                                      </select>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                              <div class="row g-3 mb-3">
                                    <div class="col-sm">
                                          <label for="formFileMultipleone" class="form-label">Priority</label>
                                          <select class="form-select" aria-label="Default select Priority">
                                                <option selected>Medium</option>
                                                <option value="1">Highest</option>
                                                <option value="2">Low</option>
                                                <option value="3">Lowest</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="mb-3">
                                    <label for="exampleFormControlTextarea786" class="form-label">Description
                                          (optional)</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea786" rows="3">Social Geek Made,lorem urna commodo sem. Pellentesque venenatis leo quam, sed mattis sapien lobortis ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        </textarea>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                              <button type="button" class="btn btn-primary">Create</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Modal  Delete Folder/ File-->
      <div class="modal fade" id="deleteproject" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title  fw-bold" id="deleteprojectLabel"> Delete item Permanently?
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body justify-content-center flex-column d-flex">
                              <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                              <p class="mt-4 fs-5 text-center">You can only delete this item Permanently</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-danger color-fff">Delete</button>
                        </div>
                  </div>
            </div>
      </div>
      <div class="modal-backdrop fade show" v-if="showCreateProjectModal"></div>
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