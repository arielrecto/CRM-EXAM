<x-admin-lte.dashboard>
    <x-admin-lte.header label="Company" />
    <x-admin-lte.main-content>
        <x-admin-lte.datatable.base label="companies" create_url="{{ route('admin.companies.create') }}"
        :columns="[
            'Logo',
            'Company Name',
            'email',
            'Website',
            'Employee',
            'Action'
        ]">

            @foreach ($companies as $company)
                <tr>
                    <td>
                        <img src="{{$company->logo}}" alt="" srcset="" style="max-height: 32px; aspect-ration : square;">
                    </td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a> </td>
                    <td>
                        <div class="row">
                            <a href="{{route('admin.companies.show', ['company' => $company->id])}}" class="btn btn-info">
                                @lang('messages.show')
                            </a>
                            <a href="{{route('admin.companies.edit', ['company' => $company->id])}}" class="btn btn-warning ml-2">
                               @lang('messages.edit')
                            </a>
                            <form action="{{route('admin.companies.destroy', ['company' => $company->id])}}" method="post" class="ml-2">
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

        {{$companies->links()}}
    </x-admin-lte.main-content>

</x-admin-lte.dashboard>
