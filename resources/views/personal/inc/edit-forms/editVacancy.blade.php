<div class="job_details_area">
    <div class="apply_job_form white-bg">

        <form action="{{ route('update-vacancy') }}" method="post" class="edit_vacancy_form">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="input_field">
                        <input type="text" name="NAME" class="vacancy NAME" placeholder="Vacancy title">
                    </div>
                    @error('NAME')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="input_field">
                        <input type="text" name="COUNTRY" class="vacancy COUNTRY" placeholder="Country">
                    </div>
                    @error('COUNTRY')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="input_field">
                        <input type="text" name="CITY" class="vacancy CITY" placeholder="City">
                    </div>
                    @error('CITY')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="single_field input_field">
                        <select required name="CATEGORY_ID" class="wide">
                            <option selected disabled>Programming language</option>
                            @foreach($jobCategories as $category)
{{--                                <option  value="{{$category->ID}}">--}}
{{--                                    {{$category->NAME}}--}}
{{--                                </option>--}}

                                <option value="{{$category->ID}}"
                                        @if(isset($_GET['CATEGORY_ID']))
                                        @if($_GET['CATEGORY_ID'] == $category->ID)
                                        selected
                                    @endif
                                    @endif
                                >
                                    {{$category->NAME}}
                                </option>


                            @endforeach
                        </select>
                    </div>
                </div><br /><br /><br />

                <div class="col-md-6">
                    <div class="input_field">
                        <input type="number" max="9999999" name="SALARY_FROM" class="vacancy SALARY_FROM" placeholder="Salary from (USD)">
                    </div>
                    @error('SALARY_FROM')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>


                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="DESCRIPTION" class="vacancy DESCRIPTION" cols="30" rows="10"
                                  placeholder="Vacancy description"></textarea>
                    </div>
                    @error('DESCRIPTION')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="RESPONSIBILITY" class="vacancy RESPONSIBILITY" cols="30" rows="10"
                                  placeholder="Responsibilities. Every responsibility on a new line"></textarea>
                    </div>
                    @error('RESPONSIBILITY')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="QUALIFICATIONS" class="vacancy QUALIFICATIONS" cols="30" rows="10"
                                  placeholder="Qualifications. Every qualification on a new line"></textarea>
                    </div>
                    @error('QUALIFICATIONS')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="input_field">
                                        <textarea name="BENEFITS" class="vacancy BENEFITS" cols="30" rows="10"
                                                  placeholder="Vacancy benefits"></textarea>
                    </div>
                    @error('BENEFITS')
                    <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="submit_btn">
                        <button class="boxed-btn3 w-100 send-data-form" type="submit">Add vacancy</button>
                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

