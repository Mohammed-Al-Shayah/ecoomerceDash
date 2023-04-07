
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{ route('admin.index') }}"><i
                                class="icon icon-single-04"></i><span class="nav-text">{{__('site.dashboard')}}</span></a>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">{{__('site.categories')}}</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.category.index') }}">All Categories</a></li>
                            <li><a href="{{ route('admin.category.create') }}">Add Categories</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon"><svg id="i-bag" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M5 9 L5 29 27 29 27 9 Z M10 9 C10 9 10 3 16 3 22 3 22 9 22 9" />
                                </svg></i><span class="nav-text">{{__('site.products')}}</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.product.index') }}">All Products</a></li>
                            <li><a href="{{ route('admin.product.create') }}">Add Products</a></li>

                        </ul>
                    </li>
                    <li><a href="{{ route('admin.order.index') }}"><i
                        class="icon "><svg id="i-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M6 6 L30 6 27 19 9 19 M27 23 L10 23 5 2 2 2" />
                            <circle cx="25" cy="27" r="2" />
                            <circle cx="12" cy="27" r="2" />
                        </svg></i><span class="nav-text">{{__('site.orders')}}</span></a>
                    </li>

                    <li><a href="javascript:void()"><i
                        class="ico"><svg id="i-creditcard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M2 7 L2 25 30 25 30 7 Z M5 18 L9 18 M5 21 L11 21" />
                            <path d="M2 11 L2 13 30 13 30 11 Z" fill="currentColor" />
                        </svg></i><span class="nav-text">{{__('site.payments')}}</span></a>
                    </li>

                    <li><a href="{{route('admin.user.index')}}"><i
                        class="icon"><svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                        </svg></i><span class="nav-text">{{__('site.users')}}</span></a>
                    </li>


                </ul>
            </div>


        </div>

