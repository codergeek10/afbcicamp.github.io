
<x-app-layout>
    
        <form class="p-4 my-5 mx-auto shadow rounded w-75" action="{{route('registration.store')}}" method="POST">
            @csrf
            <img src="<?=ROOT?>/assets/img/afbciLogo.png" alt="" class="rounded-circle d-block mx-auto" style="width: 100px;">
            <h1 class="text-primary text-center mb-5">Camp Registration</h1>
            
        <legend class="text-primary">Personal Information</legend>
            <div class="form-floating mb-3">   
                <input type="text" class="form-control my-2" name="firstName" id="floatingInput" placeholder="First Name" autofocus>
                <label for="firstName">First Name</label>
            </div>
            <div class="form-floating mb-3">   
                <input type="text" class="form-control my-2" name="lastName" id="floatingInput" placeholder="First Name" autofocus>
                <label for="lastName">Last Name</label>
            </div>
            <div class="form-floating mb-3">   
                <input type="email" class="form-control my-2" name="email" id="floatingInput" placeholder="First Name" autofocus>
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">   
                <input type="tel" class="form-control my-2" name="phone" id="floatingInput" placeholder="Phone Number" autofocus>
                <label for="phone">Phone Number</label>
            </div>
            <div class="mb-3">
                <label class="py-0 me-3">Gender</label>
                <div class="form-check mb-3 form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">
                    <label class="form-check-label" for="gender">
                    Male
                    </label>
                </div>
                <div class="form-check mb-3 form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Female">
                    <label class="form-check-label" for="female">
                    Female
                    </label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="age_group">
                    <option selected>Choose your age group</option>
                    <option value="13-15">13-15</option>
                    <option value="16-19">16-19</option>
                    <option value="20-25">20-25</option>
                    <option value="26 & Over">26 & Over</option>
                </select>
                <label for="floatingSelect">Age group</label>
            </div>

            <div class="mb-3">
                <label class="py-0 mb-2">Do you have any allergies or sickness?</label>
                <div>
                    <div class="form-check mb-2 form-check-inline">
                        <input class="form-check-input" type="radio" name="allergies" id="flexRadioDefault1" value="no">
                        <label class="form-check-label" for="afbciMember_yes">
                        Yes
                        </label>
                    </div>
                    <div class="form-check mb-3 form-check-inline">
                        <input class="form-check-input" type="radio" name="allergies" id="flexRadioDefault1" value="no">
                        <label class="form-check-label" for="afbciMember_no">
                        No
                        </label>
                    </div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="illness_type" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">If yes, please specify here...</label>
                </div>
            </div>

        <legend class="mt-3 text-primary">Emergency Contact</legend>
            <label class="py-0">Next of Kin 1</label>
            <div class="form-floating mb-3">   
                <input type="text" class="form-control my-2" name="nk1_fullName" id="floatingInput" placeholder="First Name" autofocus>
                <label for="nk1_fullName">Full Name</label>
            </div>
            <div class="form-floating mb-3">   
                <input type="tel" class="form-control my-2" name="nk1_phone" id="floatingInput" placeholder="Phone Number" autofocus>
                <label for="nk1_phone">Phone Number</label>
            </div>
            <label class="py-0">Next of Kin 1</label>
            <div class="form-floating mb-3">   
                <input type="text" class="form-control my-2" name="nk2_fullName" id="floatingInput" placeholder="First Name" autofocus>
                <label for="nk2_fullName">Full Name</label>
            </div>
            <div class="form-floating mb-3">   
                <input type="tel" class="form-control my-2" name="nk2_phone" id="floatingInput" placeholder="Phone Number" autofocus>
                <label for="nk2_phone">Phone Number</label>
            </div>

        <legend class="mt-3 text-primary">Church Details</legend>
            <div class="mb-3">
                <label class="py-0 mb-2">Are you a member of the AFBCI?</label>
                <div>
                    <div class="form-check mb-2 form-check-inline">
                        <input class="form-check-input" type="radio" name="afbciMember" id="flexRadioDefault1" value="yes">
                        <label class="form-check-label" for="afbciMember_yes">
                        Yes
                        </label>
                    </div>
                    <div class="form-check mb-3 form-check-inline">
                        <input class="form-check-input" type="radio" name="afbciMember" id="flexRadioDefault1" value="no">
                        <label class="form-check-label" for="afbciMember_no">
                        No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="church">
                    <option selected>Choose your church</option>
                    @foreach ($churches as $church)
                    <option value=" {{$church->id}} ">{{$church->name}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Church Name</label>
            </div>
            <div class="mb-3">
                <label class="py-0 mb-2">Is this your first time attending camp?</label>
                <div>
                    <div class="form-check mb-2 form-check-inline">
                        <input class="form-check-input" type="radio" name="firstTimeCamper" id="flexRadioDefault1" value="yes">
                        <label class="form-check-label" for="firstTimeCamper_yes">
                        Yes
                        </label>
                    </div>
                    <div class="form-check mb-3 form-check-inline">
                        <input class="form-check-input" type="radio" name="firstTimeCamper" id="flexRadioDefault1" value="no">
                        <label class="form-check-label" for="firstTimeCamper_no">
                        No
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="yp_position">
                    <option selected>Choose your position</option>
                    @foreach ($roles as $role)          
                    <option value=" {{$role->id}} ">{{$role->roles}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">What is your position in youth fellowship?</label>
            </div>
            <div class="form-floating mb-5">
                <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
                <label for="floatingTextarea">What are your expectations for camp 2024?</label>
            </div>

            <input class="btn btn-primary w-100" type="submit" value="Register">
        </form>
    
</x-app-layout>