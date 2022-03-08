<ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
        <div class="indigo darken-2 white-text" style="height: 180px;">
            <div class="row">
                <img style="margin-top: 5%;" width="100" height="100" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463990208/photo_dkkrxc.png" class="circle responsive-img" />

                <p style="margin-top: -13%;">
                    Admin panel
                </p>
            </div>
        </div>
    </li>

    <li id="dash_dashboard"><a class="waves-effect" href="#!"><b>Dashboard</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
        <li id="dash_users">
            <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users roles</b></div>
            <div id="dash_users_body" class="collapsible-body">
                <ul>
                    @foreach ($roles as $role)
                        @if ($role->display_name == 'Administrator') @continue @endif
                        <li id="users_seller">
                            <a class="waves-effect" style="text-decoration: none;"
                               href="{{ route('admin-users', ['name' => $role->name]) }}">
                                {{$role->display_name}} list
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>


        <li id="dash_products">
            <div id="dash_products_header" class="collapsible-header waves-effect"><b>Products</b></div>
            <div id="dash_products_body" class="collapsible-body">
                <ul>
                    <li id="products_product">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Products</a>
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Orders</a>
                    </li>
                </ul>
            </div>
        </li>

        <li id="dash_categories">
            <div id="dash_categories_header" class="collapsible-header waves-effect"><b>Categories</b></div>
            <div id="dash_categories_body" class="collapsible-body">
                <ul>
                    <li id="categories_category">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Category</a>
                    </li>

                    <li id="categories_sub_category">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Category</a>
                    </li>
                </ul>
            </div>
        </li>

        <li id="dash_brands">
            <div id="dash_brands_header" class="collapsible-header waves-effect"><b>Brands</b></div>
            <div id="dash_brands_body" class="collapsible-body">
                <ul>
                    <li id="brands_brand">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Brand</a>
                    </li>

                    <li id="brands_sub_brand">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Brand</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</ul>