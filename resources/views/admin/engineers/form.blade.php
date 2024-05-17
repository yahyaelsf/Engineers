<form action="{{ route('admin.engineers.store') }}" method="post">

    @csrf

    @isset($engineer)
        <input type="hidden" name="pk_i_id" value="{{ $engineer->getKey() }}" />
    @endisset




    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">إسم المهندس</label>
                <input name="s_name" type="text" class="form-control" value="{{ $engineer->s_name ?? '' }}" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">رقم الهوية</label>
                <input name="i_id_number" type="text" class="form-control"
                    value="{{ $engineer->i_id_number ?? '' }}" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">رقم الهاتف </label>
                <input name="s_mobile" type="text" class="form-control" value="{{ $engineer->s_mobile ?? '' }}" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label"> عدد أفراد الأسرة </label>
                <input name="i_family" type="number" class="form-control" value="{{ $engineer->i_family ?? '' }}" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">  قيمة المساعدة</label>
                <input name="s_value" type="number" class="form-control" value="{{ $engineer->s_value ?? '' }}" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">نوع المساعدة</label>
                <select class="form-control" name="e_type">
                    <option disabled selected> اختار نوع المساعدة</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'food_parcel') selected @endif value="food_parcel">طرد غذائي</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'healthy_package') selected @endif  value="healthy_package">طرد صحي</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'vegetable_basket') selected @endif  value="vegetable_basket">سلة خضار</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'cash_assistance') selected @endif  value="cash_assistance"> مساعدة نقدية</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'flour_bag') selected @endif  value="flour_bag"> كيس طحين</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'clothes') selected @endif  value="clothes"> كسوة ملابس</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'engineer_sponsorship') selected @endif  value="engineer_sponsorship"> كفالة مهندس</option>
                    <option @if(isset($engineer) && $engineer->e_type == 'martyr_sponsorship') selected @endif  value="martyr_sponsorship"> كفالة شهيد</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label"> العنوان</label>
                <select class="form-control" name="s_address">
                    <option disabled selected>اختار العنوان </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Eltofah') selected @endif value="Eltofah">التفاح </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Eldarag') selected @endif value="Eldarag">الدرج </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Alshujaiya') selected @endif value="Alshujaiya">الشجاعية </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Alremal') selected @endif value="Alremal">الرمال </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Elshachradwan') selected @endif value="Elshachradwan">الشيخ رضوان </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Elshtie') selected @endif value="Elshtie">الشاطئ </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Elnaser') selected @endif value="Elnaser">النصر </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Elsabra') selected @endif value="Elsabra">الصبرة </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Talelhwa') selected @endif value="Talelhwa">تل الهوا </option>
                    <option @if(isset($engineer) && $engineer->s_address == 'Elzyton') selected @endif value="Elzyton"> الزيتون </option>



                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label"> الجهة المانحة</label>
                <select class="form-control" name="e_donor">
                    <option disabled selected>اختار الجهة المانحة </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'mercy') selected @endif value="mercy">الرحمة </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'orphanage') selected @endif value="orphanage">دار اليتيم </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'Eng_jerusalem') selected @endif value="Eng_jerusalem">نقابة المهندسين مركز (القدس) </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'Harmony') selected @endif value="Harmony">الوئام </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'besieged_italy') selected @endif value="besieged_italy"> المناصرة ايطاليا</option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'companions_association') selected @endif value="companions_association">جمعية الصحابة </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'safety_malaysia') selected @endif value="safety_malaysia">أمان ماليزيا </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'international_society_engineers') selected @endif value="international_society_engineers">تجمع المهندسين الدولي </option>
                    <option @if(isset($engineer) && $engineer->e_donor == 'international_yndicate_engineers') selected @endif value="international_yndicate_engineers"> نقابة المهندسين الدولين </option>




                </select>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="progress" style="display: none; height: 20px !important;">
                <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">@lang('buttons.save')</button>
        <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">@lang('buttons.close')</button>
    </div>

</form>
