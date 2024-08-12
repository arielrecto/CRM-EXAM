<x-admin-lte.dashboard>
    <x-admin-lte.header :label="$company->name" />
    <x-admin-lte.main-content>
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ $company->logo }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $company->name }}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $company->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Website</b> <a class="float-right">{{ $company->website }}</a>
                    </li>
                    {{-- <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                    </li> --}}
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->

            <x-admin-lte.datatable.base label="employees" button_label="Add Employee" :columns="['First Name', 'Last Name', 'Company', 'Email', 'Phone', 'Action']">


                @forelse ($company->employees as $employee)
                    <tr>
                        <td>
                            {{ $employee->first_name }}
                        </td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('admin.employees.show', ['employee' => $employee->id]) }}"
                                    class="btn btn-info">
                                    show
                                </a>
                                <a href="{{ route('admin.employees.edit', ['employee' => $employee->id]) }}"
                                    class="btn btn-warning ml-2">
                                    edit
                                </a>
                                <form action="{{ route('admin.employees.destroy', ['employee' => $employee->id]) }}"
                                    method="post" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            No Employee
                        </td>
                    </tr>
                @endforelse


            </x-admin-lte.datatable.base>
        </div>
    </x-admin-lte.main-content>
</x-admin-lte.dashboard>
