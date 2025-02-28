<div class="card col-md-12 col-lg-2 setting_sidebar p-3">
    <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
        @can('read_software_setup')
            <li class="nav-item" role="presentation">
                <button class="nav-link w-100 px-2 collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSoftSetup" aria-expanded="false" aria-controls="collapseSoftSetup">
                    <span>HRIS</span><i class="ti-angle-up"></i>
                </button>
                <div class="collapse {{ request()->routeIs('applications.application') || request()->routeIs('app.index') || request()->routeIs('product.setting.product') || request()->routeIs('purchase.setting.purchase') || request()->routeIs('sale.terms.list') || request()->routeIs('sale.terms.add') || request()->routeIs('currencies.index') || request()->routeIs('currencies.create') || request()->routeIs('currencies.edit') || request()->routeIs('mails.index') || request()->routeIs('sms.index') || request()->routeIs('invoice.setting.index') || request()->routeIs('user-types.index') || request()->routeIs('password-settings.index') || request()->routeIs('tax-setup.index') ? 'show' : '' }}"
                    id="collapseSoftSetup">
                    <div class="card card-body pe-0 py-1 shadow-none">
                        <ul class="nav flex-column" role="tablist">

                            @can('read_application')
                                 <!-- <li class="nav-item"><a
                                        class="nav-link w-100 {{ request()->routeIs('applications.application') ? 'active' : '' }}"
                                        href="{{ route('applications.application') }}">{{ localize('application') }}</a></li>-->
                            @endcan
                            
                            @can('read_currency')
                                <li class="nav-item"><a
                                        class="nav-link w-100 {{ request()->routeIs('currencies.index') || request()->routeIs('currencies.create') || request()->routeIs('currencies.edit') ? 'active' : '' }}"
                                        href="{{ route('currencies.index') }}">{{ localize('currency') }}</a></li>
                            @endcan

                            @can('read_mail_setup')
                                
                            @endcan
                         
                        </ul>
                    </div>
                </div>
            </li>
        @endcan

        @can('read_user_management')
            <li class="nav-item" role="presentation">
                <button class="nav-link w-100 px-2 collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseUserManagement" aria-expanded="false" aria-controls="collapseUserManagement">
                    <span>{{ localize('user_management') }}</span><i class="ti-angle-up"></i>
                </button>
                <div class="collapse {{ request()->routeIs('role.user.list') || request()->routeIs('role.list') || request()->routeIs('role.edit') || request()->routeIs('role.add') || request()->routeIs('role.permission.list') || request()->routeIs('role.menu.list') ? 'show' : '' }}"
                    id="collapseUserManagement">
                    <div class="card card-body pe-0 py-1 shadow-none">
                        <ul class="nav flex-column" role="tablist">
                            @can('read_role_list')
                                <li class="nav-item"><a
                                        class="nav-link w-100 {{ request()->routeIs('role.list') || request()->routeIs('role.add') || request()->routeIs('role.edit') ? 'active' : '' }}"
                                        href="{{ route('role.list') }}">{{ localize('role_list') }}</a></li>
                            @endcan

                            @can('read_user_list')
                                <li class="nav-item">
                                    <a class="nav-link w-100 {{ request()->routeIs('role.user.list') ? 'active' : '' }}"
                                        href="{{ route('role.user.list') }}">{{ localize('user_list') }}</a>

                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </li>
        @endcan


        @can('read_language')
            @can('read_language_list')
               
            @endcan
        @endcan

        @can('read_backup_and_reset')
           
        @endcan
    </ul>
</div>
