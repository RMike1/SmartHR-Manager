<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);
const dialog = ref();
const showSlot = ref(props.show);

watch(() => props.show, () => {
    if (props.show) {
        document.body.style.overflow = 'hidden';
        showSlot.value = true;
        dialog.value?.showModal();
    } else {
        document.body.style.overflow = null;
        setTimeout(() => {
            dialog.value?.close();
            showSlot.value = false;
        }, 200);
    }
});

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape') {
        e.preventDefault();

        if (props.show) {
            close();
        }
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});

const maxWidthClass = computed(() => {
    return {
        'sm': 'sm:max-w-sm',
        'md': 'sm:max-w-md',
        'lg': 'sm:max-w-lg',
        'xl': 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
    }[props.maxWidth];
});
</script>

<template>
    <dialog class="modal fade" id="addUser" ref="dialog">
        <!-- <div class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" scroll-region> -->
            <!-- <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                    <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75" />
                </div>
            </transition>

            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div v-show="show" class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto" :class="maxWidthClass">
                    <slot v-if="showSlot"/>
                </div>
            </transition> -->
        <!-- </div> -->
        <div>
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
    </dialog>
</template>
