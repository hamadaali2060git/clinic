<!-- Profile Sidebar -->

                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{asset('img/profiles/'.Auth::user()->photo) }}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>

                                    <div class="patient-details">
                                        <h5 class="mb-0">{{Auth::user()->bio}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="{{ Request::is('categories') ? 'active' : '' }}">
                                        <a href="categories">
                                            <i class="fas fa-columns"></i>
                                            <span>categories</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('appointments') ? 'active' : '' }}">
                                        <a href="appointments">
                                            <i class="fas fa-columns"></i>
                                            <span> Upcomoing</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('previous-appointments') ? 'active' : '' }}">
                                        <a href="previous-appointments">
                                            <i class="fas fa-calendar-check"></i>
                                            <span> previous appointments</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('patients') ? 'active' : '' }}">
                                        <a href="patients">
                                            <i class="fas fa-user-injured"></i>
                                            <span>Patients</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('articles') ? 'active' : '' }}">
                                        <a href="articles">
                                            <i class="fas fa-user-injured"></i>
                                            <span>articles</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('sliders') ? 'active' : '' }}">
                                        <a href="sliders">
                                            <i class="fas fa-user-injured"></i>
                                            <span>sliders</span>
                                        </a>
                                    </li>
                                     <li class="{{ Request::is('schedules') ? 'active' : '' }}">
                                        <a href="schedules">
                                            <i class="fas fa-user-injured"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="schedule-timings">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="invoices">
                                            <i class="fas fa-file-invoice"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="reviews">
                                            <i class="fas fa-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="chat-doctor">
                                            <i class="fas fa-comments"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">23</small>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="{{url('settings')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span> Settings</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="social-media">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="doctor-change-password">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->
