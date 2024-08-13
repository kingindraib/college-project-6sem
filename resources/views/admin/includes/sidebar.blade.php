<div id="sidebar" class="app-sidebar" data-bs-theme="dark">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
                    data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        @if(Auth::user()->image == NULL)
                        <img src="{{ url('admin/img/user/user-13.jpg') }}" alt />
                        @else 
                        <img src="{{ url(Auth::user()->image) }}" alt />
                        @endif
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                               {{ Auth::user()->first_name ?? '' }}  {{ Auth::user()->last_name ?? '' }}
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                        <small>Software developer</small>
                    </div>
                </a>
            </div>
            <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Settings</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text"> Send Feedback</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text"> Helps</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>
            <div class="menu-header">Navigation</div>
            <div class="menu-item {{ sidebar_active(['admin.index']) }}">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="menu-text">Dashboard</div>
                    {{-- <div class="menu-caret"></div> --}}
                </a>

            </div>

            <div class="menu-item has-sub {{ sidebar_active(['category.index','category.create','category.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-layer-group"></i>
                    </div>
                    <div class="menu-text">Category Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['category.create']) }}"><a href="{{ route('category.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['category.index']) }}"><a href="{{ route('category.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ sidebar_active(['post.create','post.index','post.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-signs-post"></i>
                    </div>
                    <div class="menu-text">Post Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item"><a href="{{ route('post.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item"><a href="{{ route('post.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            
            <div class="menu-item has-sub {{ sidebar_active(['page.create','page.index','page.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="menu-text">Page Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['page.create']) }}"><a href="{{ route('page.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['page.index']) }}"><a href="{{ route('page.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{request()->routeIs('admin.property*') ? 'active':'' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="menu-text">Property Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{request()->routeIs('admin.property.category*') ? 'active':'' }}"><a href="{{ route('admin.property.category.index') }}" class="menu-link">
                        <div class="menu-text">Category</div>
                    </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.property.create']) }}"><a href="{{ route('admin.property.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.property.index']) }}"><a href="{{ route('admin.property.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['page.index']) }}"><a href="{{ route('page.index') }}" class="menu-link">
                            <div class="menu-text">Recent</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['page.index']) }}"><a href="{{ route('page.index') }}" class="menu-link">
                            <div class="menu-text">User Upload</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ sidebar_active(['slider.index','slider.create','slider.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-sliders"></i>
                    </div>
                    <div class="menu-text">Slider Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['slider.create']) }}"><a href="{{ route('slider.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['slider.index']) }}"><a href="{{ route('slider.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>
           

           
            <div class="menu-item {{ sidebar_active(['menu.index']) }}">
                <a href="{{ route('menu.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="menu-text">Menu Management</div>
                    
                </a>
            </div>

           
            <div class="menu-item has-sub {{ sidebar_active(['faq.index','faq.create','faq.edit']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="menu-text">FAQ Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['faq.create']) }}"><a href="{{ route('faq.create') }}" class="menu-link">
                            <div class="menu-text">Create</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['faq.index']) }}"><a href="{{ route('faq.index') }}" class="menu-link">
                            <div class="menu-text">Manage</div>
                        </a></div>
                </div>
            </div>

           
            <div class="menu-item has-sub {{ sidebar_active(['user.index','user.create','user.edit','blocked.user','admin.all']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="menu-text">User Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['user.create']) }}"><a href="{{ route('user.create') }}" class="menu-link">
                            <div class="menu-text">Create User</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['user.index']) }}"><a href="{{ route('user.index') }}" class="menu-link">
                            <div class="menu-text">Users</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.all']) }}"><a href="{{ route('admin.all') }}" class="menu-link">
                            <div class="menu-text">Admin</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['blocked.user']) }}"><a href="{{ route('blocked.user') }}" class="menu-link">
                            <div class="menu-text">Blocked User</div>
                        </a></div>
                </div>
            </div>
            <div class="menu-item has-sub {{ sidebar_active(['site.setting','skipads.index','skipads.create','skipads.edit','admin.profile','admin.change.password','page_protection.index']) }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-gear"></i>
                    </div>
                    <div class="menu-text">Setting</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ sidebar_active(['site.setting']) }}"><a href="{{ route('site.setting') }}" class="menu-link">
                            <div class="menu-text">Site Settings</div>
                        </a></div>
                    {{-- <div class="menu-item {{ sidebar_active(['site.setting']) }}"><a href="{{ route('site.setting') }}" class="menu-link">
                            <div class="menu-text">Email Template</div>
                        </a></div> --}}
                    <div class="menu-item {{ sidebar_active(['admin.profile']) }}"><a href="{{ route('admin.profile') }}" class="menu-link">
                            <div class="menu-text">Update Profile</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['admin.change.password']) }}"><a href="{{ route('admin.change.password') }}" class="menu-link">
                            <div class="menu-text">Change Password</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['page_protection.index']) }}"><a href="{{ route('page_protection.index') }}" class="menu-link">
                            <div class="menu-text">Page Protection</div>
                        </a></div>
                    <div class="menu-item {{ sidebar_active(['skipads.index','skipads.create','skipads.edit']) }}"><a href="{{ route('skipads.index') }}" class="menu-link">
                            <div class="menu-text">Skip Ads</div>
                        </a></div>
                </div>
            </div>


            

            <div class="menu-item d-flex">
                <a href="javascript:;"
                    class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none"
                    data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>

        </div>

    </div>

</div>