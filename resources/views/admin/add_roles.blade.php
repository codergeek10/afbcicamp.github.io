<x-app-layout>
    <form action="{{route("add_role")}}" method="post" class="w-50 shadow p-3 d-flex mx-auto my-5 rounded gap-3 align-items-center">
        @csrf
        <input type="text" name="role" id="role" class="form-control my-2" placeholder="Add Role">
        <input type="submit" value="ADD" class="btn btn-primary d-block  py-0" style="width:150px; height:40px">
    </form>
</x-app-layout>