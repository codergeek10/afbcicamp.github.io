<x-app-layout>
    <div class="d-flex justify-content-between flex-wrap">
        <div class="mt-5 ms-3">
            <div class="card shadow" style="width:12rem">
                {!! $chartjs->render() !!}
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold">Gender</h5>
                    {{-- <div class="d-flex justify-content-between">
                        <p class="card-text fs-6">Male: {{$maleCount}} </p>
                        <p class="card-text fs-6"> Female: {{$femaleCount}} </p>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="mt-5 mx-3">
            <div class="card shadow" style="width:12rem">
                {!! $chartjsTwo->render() !!}
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold">First Time Camper</h5>
                    {{-- <div class="d-flex justify-content-between">
                        <p class="card-text fs-6">No: {{$notFirstTime}} </p>
                        <p class="card-text fs-6"> Yes: {{$firstTimeCamper}} </p>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="mt-5 mx-3">
            <div class="card shadow" style="width:12rem">
                {!! $ageGroupChart->render() !!}
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold">Age Groups</h5>
                    {{-- <div class="d-flex justify-content-between">
                        <p class="card-text fs-6">No: {{$notFirstTime}} </p>
                        <p class="card-text fs-6"> Yes: {{$firstTimeCamper}} </p>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="mt-5 mx-3">
            <div class="card shadow" style="width:12rem">
                {!! $chartjsTwo->render() !!}
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold">First Time Camper</h5>
                    {{-- <div class="d-flex justify-content-between">
                        <p class="card-text fs-6">No: {{$notFirstTime}} </p>
                        <p class="card-text fs-6"> Yes: {{$firstTimeCamper}} </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
   
    <div class="shadow w-100 mt-5 pb-3">
        <div class="table-responsive">
            <table class="table-auto"> {{-- table-striped table-sm m-3 --}}
                <thead>
                    <tr class="th-fs-1 border-b-2 text-center" >
                        <th scope="col" class="w-10 ">ID</th>
                        <th scope="col" class="w-40">REGISTRATION CODE</th>
                        <th scope="col" class="w-40">FIRST NAME</th>
                        <th scope="col" class="w-20">LAST NAME</th>
                        {{-- <th scope="col">EMAIL</th> --}}
                        <th scope="col" class="w-20">PHONE NUMBER</th>
                        <th scope="col" class="w-20">GENDER</th>
                        <th scope="col" class="w-40">AGE GROUP</th>
                        {{-- <th scope="col">ALLERGIES</th>
                        <th scope="col">ILLNESS TYPE</th>
                        <th scope="col" class="">NEXT OF KIN 1</th>
                        <th scope="col">NEXT OF KIN 1 PHONE</th>
                        <th scope="col">NEXT OF KIN 2</th>
                        <th scope="col">NEXT OF KIN 2 PHONE</th>
                        <th scope="col">MEMBER OF AFBCI</th>
                        <th scope="col">CHURCH NAME</th> --}}
                        <th scope="col" class="w-40">FIRST TIME CAMPER</th>
                        {{-- <th scope="col">YP POSITION</th>
                        <th scope="col">COMMENT</th> --}}
                        <th scope="col" class="w-40">REGISTERED DATE</th>
                        <th scope="col" class="w-40">UPDATED DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campers as $camper)
                        <tr class="text-sm p-5">
                            <th scope="row" class="text-sm p-3">{{$camper->id}}</th>
                            <td class="text-sm p-3">{{$camper->registration_Code}}</td>
                            <td class="text-sm p-3"><a href="{{route('camper.info', ['id' => $camper->id])}}" class="text-2sm text-blue-500">{{$camper->first_name}}</a></td>
                            <td class="text-sm p-3">{{$camper->last_name}}</td>
                            {{-- <td class="text-sm p-3">{{$camper->email}}</td> --}}
                            <td class="text-sm p-3">{{$camper->phone}}</td>
                            <td class="text-sm p-3">{{$camper->gender}}</td>
                            <td class="text-sm p-3">{{$camper->age_group}}</td>
                            {{-- <td class="text-sm p-3">{{$camper->allergies}}</td>
                            <td class="text-sm p-3">{{$camper->illness_type}}</td>
                            <td class="text-sm p-3">{{$camper->first_kin_name}}</td>
                            <td class="text-sm p-3">{{$camper->first_kin_phone}}</td>
                            <td class="text-sm p-3">{{$camper->second_kin_name}}</td>
                            <td class="text-sm p-3">{{$camper->second_kin_phone}}</td>
                            <td class="text-sm p-3">{{$camper->afbci_member}}</td>
                            <td class="text-sm p-3">{{$camper->church}}</td> --}}
                            <td class="text-sm p-3">{{$camper->first_time_camper}}</td>
                            {{-- <td class="text-sm p-3">{{$camper->yp_position}}</td>
                            <td class="text-sm p-3">{{$camper->comment}}</td> --}}
                            <td class="text-sm p-3">{{$camper->created_at}}</td>
                            <td class="text-sm p-3">{{$camper->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       </div>
       <div class="d-flex justify-content-center mt-3">
           {{ $campers->links() }}
       </div>
       <form action="{{route('database.export')}}" method="get" class="m-3">
            <input type="submit" value="Download Excel" class="bg-blue-500 text-white py-2 px-4 rounded">
        </form>
    </div>


</x-app-layout>