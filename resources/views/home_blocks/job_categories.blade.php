<!-- popular_catagory_area_start  -->
<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Job Categories</h3>
                </div>
            </div>
        </div>
            <div class="row">
                @foreach ($vacancyCategories as $vacancyCategory)
                    @php
                        $categoryModel = \App\Models\JobCategories::class;
                        $category = \App\Services\Helper::getTableRow($categoryModel, 'ID', $vacancyCategory->CATEGORY_ID);

                        $vacancyModel = \App\Models\Vacancies::class;
                        $categoryVacanciesQuantity = \App\Services\Helper::countTableRow($vacancyModel, 'CATEGORY_ID', $vacancyCategory->CATEGORY_ID);

                    @endphp
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="/browse-job?CATEGORY_ID={{$vacancyCategory->CATEGORY_ID}}">
                                <h4>{{ucfirst($category->NAME)}}</h4>
                            </a>
                            <p><span>{{$categoryVacanciesQuantity}}</span> Available position</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
</div>
<!-- popular_catagory_area_end  -->