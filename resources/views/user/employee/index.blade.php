<x-admin-lte.dashboard>
    <x-admin-lte.header label="Employee" />
    <x-admin-lte.main-content>
        <x-admin-lte.datatable.base label="employees" button_label="Add Employee" create_url="{{ route('admin.employees.create') }}"
        :columns="[
            'First Name',
            'Last Name',
            'Company',
            'Email',
            'Phone',
            'Action'
        ]">

            @foreach ($employees as $employee)
                <tr>
                    <td>
                       {{$employee->first_name}}
                    </td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->company->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('admin.employees.show', ['employee' => $employee->id])}}" class="btn btn-info">
                               @lang('messages.show')
                            </a>
                            <a href="{{route('admin.employees.edit', ['employee' => $employee->id])}}" class="btn btn-warning ml-2">
                              @lang('messages.edit')
                            </a>
                            <form action="{{route('admin.employees.destroy', ['employee' => $employee->id])}}" method="post" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    @lang('messages.delete')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-admin-lte.datatable.base>
        {{$employees->links()}}
    </x-admin-lte.main-content>

</x-admin-lte.dashboard>
