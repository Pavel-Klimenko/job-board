@include('admin_area.inc.header')
@include('admin_area.inc.left_menu')

<main>
    <div class="row">
        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Registered users</b>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('admin-users', ['name' => $candidatesRole]) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">person</i>
                            <span class="indigo-text text-lighten-1"><h5>Candidates</h5></span>
                        </div>
                    </a>
                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('admin-users', ['name' => $companiesRole]) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                            <span class="indigo-text text-lighten-1"><h5>Companies</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Website growth analytics</b>
                    </div>
                </div>
                <div class="row">
                    <a href="{{ route('analytics-line-chart', ['entity' => 'vacancies']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">store</i>
                            <span class="indigo-text text-lighten-1"><h5>Vacancies</h5></span>
                        </div>
                    </a>

                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('analytics-line-chart', ['entity' => 'users']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                            <span class="indigo-text text-lighten-1"><h5>New users</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Vacancies and Reviews</b>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('admin-vacancies') }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">local_offer</i>
                            <span class="indigo-text text-lighten-1"><h5>Vacancies</h5></span>
                        </div>
                    </a>

                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('admin-reviews') }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">loyalty</i>
                            <span class="indigo-text text-lighten-1"><h5>Reviews</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Ratio analytics</b>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('analytics-pie-chart', ['entity' => 'invitations']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                            <span class="indigo-text text-lighten-1"><h5>Invitation for an interview</h5></span>
                        </div>
                    </a>
                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('analytics-pie-chart', ['entity' => 'users']) }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                            <span class="indigo-text text-lighten-1"><h5>Users ratio</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn click-to-toggle" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large pink waves-effect waves-light">
            <i class="large material-icons">add</i>
        </a>

        <ul>
            <li>
                <a class="btn-floating red"><i class="material-icons">note_add</i></a>
                <a href="" class="btn-floating fab-tip">Add a note</a>
            </li>

            <li>
                <a class="btn-floating yellow darken-1"><i class="material-icons">add_a_photo</i></a>
                <a href="" class="btn-floating fab-tip">Add a photo</a>
            </li>

            <li>
                <a class="btn-floating green"><i class="material-icons">alarm_add</i></a>
                <a href="" class="btn-floating fab-tip">Add an alarm</a>
            </li>

            <li>
                <a class="btn-floating blue"><i class="material-icons">vpn_key</i></a>
                <a href="" class="btn-floating fab-tip">Add a master password</a>
            </li>
        </ul>
    </div>
</main>

@include('admin_area.inc.footer')



