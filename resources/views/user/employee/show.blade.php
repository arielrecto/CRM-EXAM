<x-admin-lte.dashboard>
    <x-admin-lte.header :label="$employee->last_name . ', ' . $employee->first_name" />
    <x-admin-lte.main-content>
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ $employee->company->logo }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Company : {{ $employee->company->name }}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Last Name</b> <a class="float-right">{{ $employee->last_name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>First Name</b> <a class="float-right">{{ $employee->first_name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $employee->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Phone</b> <a class="float-right">{{ $employee->phone }}</a>
                    </li>
                    {{-- <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                    </li> --}}
                </ul>
                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
        </div>
    </x-admin-lte.main-content>
</x-admin-lte.dashboard>
