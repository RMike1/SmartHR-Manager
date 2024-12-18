<script setup>
import Navbar from '@/Components/Admin/Navbar.vue';
import Header from '@/Components/Admin/Header.vue';
</script>
<template>
      <div>
            <Navbar />
            <Header />
            <div class="offcanvas pc-announcement-offcanvas offcanvas-end" tcabindex="-1" id="announcement"
                  aria-labelledby="announcementLabel">
                  <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="announcementLabel">What's new announcement?</h5><button
                              data-pc-dismiss="#announcement"
                              class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500"><i
                                    class="ti ti-x"></i></button>
                  </div>
                  <div class="offcanvas-body announcement-scroll-block">
                        <p class="mb-3">Today</p>
                        <div class="card mb-3">
                              <div class="card-body">
                                    <div class="items-center flex wrap gap-2 mb-3">
                                          <div class="badge text-success-500 bg-success-500/10 text-sm">Big News</div>
                                          <p class="mb-0">2 min ago</p><span class="badge bg-warning-500 p-1"></span>
                                    </div>
                                    <h5 class="mb-3">Able Pro is Redesigned</h5>
                                    <p class="text-muted mb-3">Able Pro is completely renowed with high aesthetics User
                                          Interface.</p><img src="admin/assets/images/layout/img-announcement-1.png" alt="img"
                                          class="img-fluid mb-3">
                                    <div class="grid"><a class="btn btn-outline-secondary"
                                                href="https://1.envato.market/zNkqj6" target="_blank">Check Now</a></div>
                              </div>
                        </div>
                        <div class="card mb-3">
                              <div class="card-body">
                                    <div class="items-center flex wrap gap-2 mb-3">
                                          <div class="badge text-warning-500 bg-warning-500/10 text-sm">Offer</div>
                                          <p class="mb-0 text-muted">2 hour ago</p><span class="badge bg-warning p-1"></span>
                                    </div>
                                    <h5 class="mb-3">Able Pro is in best offer price</h5>
                                    <p class="text-muted mb-3">Download Able Pro exclusive on themeforest with best price.</p>
                                    <a href="https://1.envato.market/zNkqj6" target="_blank"><img
                                                src="admin/assets/images/layout/img-announcement-2.png" alt="img"
                                                class="img-fluid"></a>
                              </div>
                        </div>
                        <p class="text-span mb-3 mt-4">Yesterday</p>
                        <div class="card mb-3">
                              <div class="card-body">
                                    <div class="items-center flex wrap gap-2 mb-3">
                                          <div class="badge text-primary-500 bg-primary-500/10 text-sm">Blog</div>
                                          <p class="mb-0 text-muted">12 hour ago</p><span class="badge bg-warning p-1"></span>
                                    </div>
                                    <h5 class="mb-3">Featured Dashboard Template</h5>
                                    <p class="text-muted mb-3">Do you know Able Pro is one of the featured dashboard template
                                          selected by Themeforest team.?</p><img
                                          src="admin/assets/images/layout/img-announcement-3.png" alt="img" class="img-fluid">
                              </div>
                        </div>
                        <div class="card mb-3">
                              <div class="card-body">
                                    <div class="items-center flex wrap gap-2 mb-3">
                                          <div class="badge text-primary-500 bg-primary-500/10 text-sm">Announcement</div>
                                          <p class="mb-0 text-muted">12 hour ago</p><span class="badge bg-warning p-1"></span>
                                    </div>
                                    <h5 class="mb-3">Buy Once - Get Free Updated lifetime</h5>
                                    <p class="text-muted mb-3">Get the lifetime free updates once you purchase the Able Pro.
                                    </p><img src="admin/assets/images/layout/img-announcement-4.png" alt="img"
                                          class="img-fluid">
                              </div>
                        </div>
                  </div>
            </div>
            <!-- [ Header ] end --><!-- [ Main Content ] start -->
                  <slot />
            <footer class="pc-footer">
                  <div class="footer-wrapper container-fluid mx-10">
                        <div class="grid grid-cols-12 gap-1.5">
                              <div class="col-span-12 sm:col-span-6 my-1">
                                    <p class="m-0"></p>Able Pro &#9829; crafted by Team <a
                                          href="https://themeforest.net/user/phoenixcoded"
                                          class="text-theme-bodycolor dark:text-themedark-bodycolor hover:text-primary-500 dark:hover:text-primary-500"
                                          target="_blank">Phoenixcoded</a>
                                    <p></p>
                              </div>
                              <div class="col-span-12 sm:col-span-6 my-1">
                                    <ul
                                          class="mb-0 ltr:sm:text-right rtl:sm:text-left *:text-theme-bodycolor dark:*:text-themedark-bodycolor hover:*:text-primary-500 dark:hover:*:text-primary-500">
                                          <li class="inline-block max-sm:mr-2 sm:ml-2"><a href="../index.html">Home</a></li>
                                          <li class="inline-block max-sm:mr-2 sm:ml-2"><a
                                                      href="https://phoenixcoded.gitbook.io/able-pro/"
                                                      target="_blank">Documentation</a>
                                          </li>
                                          <li class="inline-block max-sm:mr-2 sm:ml-2"><a
                                                      href="https://phoenixcoded.authordesk.app/" target="_blank">Support</a>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </footer>
      </div>
</template>