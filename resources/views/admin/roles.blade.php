<x-app-layout>
    <div class="mx-auto mt-5 shadow rounded p-3">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center text-primary" colspan="2">
                            Roles
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                    <th scope="row"> {{$role->id}} </th>
                    <td> {{$role->roles}} </td>
                    {{-- <td>
                        <form action="" method="post">
                            <input type="submit" value="Edit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        </form>
                    </td> --}}
                    <td>
                        <form action=" {{ route('role.destroy', $role->id)}} " method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="bg-red-500 text-white py-2 px-4 rounded">
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            <form action="{{route('roles.form')}}" method="get" class="mt-5 d-flex justify-content-end">
                <input type="submit" value="Create New Role" class="btn btn-primary m-4">
            </form>
    </div>
</x-app-layout>