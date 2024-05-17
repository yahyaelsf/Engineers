@extends('admin.layouts.dashboard')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand fa fa-list"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{ $pageTitle }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">&nbsp;
                        @can('products-store')
                            <a onclick="openModal()" class="btn text-white btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                @lang('buttons.add_new')
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <form class="report-form" id="filterForm">
                <div class="row">



                </div>

            </form>
            <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('general.name')</th>
                    <th>رقم الهوية</th>
                    <th>رقم الجوال</th>
                    <th>عدد الأفراد</th>
                    <th>العنوان</th>
                    <th>نوع المساعدة</th>
                    <th>قيمة المساعدة</th>
                    <th>الجهة المانحة</th>
                    <th>@lang('general.options')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection


@push('js')

    <script>

        const table = $('#datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.engineers.data') }}',
            columns: [
                {data: 'pk_i_id'},
                {data: 's_name'},
                {data: 'i_id_number'},
                {data: 's_mobile'},
                {data: 'i_family', "defaultContent": "<i>-</i>"},
                {data: 's_address'},
                {data:'type_label', name: 'e_type', "defaultContent": "<i>-</i>"},
                {data: 's_value' , "defaultContent": "<i>-</i>"},
                {data: 'donor_label',"defaultContent": "<i>-</i>", name: 'e_donor'},
                {
                    data: 'actions_column',
                    searchable: false,
                    sortable: false,
                    responsivePriority: -1,
                    visible: {{ (int) (auth()->user()->can('products-store') || auth()->user()->can('products-delete')) }}
                },
            ],
            order: [[1, 'asc']],

        });




        function openModal(id = '') {
            $.get('{{ route('admin.engineers.form') }}?id=' + id, function (data) {
                let modal = $('#form-modal');
                modal.find('.modal-title').html(data.title);
                modal.find('.modal-body').html(data.page);

                let modalForm = $('#form-modal form');

                var KTAvatarDemo = function () {
                    // Private functions
                    var initDemos = function () {
                        var avatar1 = new KTAvatar('kt_user_avatar_1');
                    }

                    return {
                        init: function () {
                            initDemos();
                        }
                    };
                }();

                KTUtil.ready(function () {
                    KTAvatarDemo.init();
                });




                const submitButton = modalForm.find(':button[type=submit]');
                const spinnerClasses = "kt-spinner kt-spinner--left kt-spinner--sm kt-spinner--light";

                modalForm.submit(function (e) {
                    e.preventDefault();
                    submitButton.prop('disabled', true);
                    submitButton.addClass(spinnerClasses);
                }).validate({
                    submitHandler: function (form) {
                        const data = new FormData(form);
                        const action = $('form').attr('action');

                        $.ajax({
                            url: action,
                            type: "POST",
                            data: data,
                            contentType: false,
                            cache: false,
                            processData: false,
                            xhr: function () {
                                var myXhr = $.ajaxSettings.xhr();
                                if (myXhr.upload) {
                                    $('.progress').show();
                                    myXhr.upload.addEventListener('progress', progress, false);
                                }
                                return myXhr;
                            },
                            success: function (data) {
                                console.log(data);

                                if (data.success) {
                                    modal.modal('hide');
                                    $('#datatable').DataTable().ajax.reload(null, false);
                                    $('form').find("input[type=text],input[type=file],textarea").val("");
                                    $('form').validate().resetForm();
                                    $('form').find('form-group').removeClass('has-error');
                                    toastr.success(data.message, {timeOut: 5000});
                                    $('#validation-errors').empty();
                                } else {
                                    validationErrors(data.errors);
                                    submitButton.prop('disabled', false);
                                    submitButton.removeClass(spinnerClasses);
                                    $('.progress').hide();
                                    $('.progress-bar').width('0%');
                                }
                            }
                        });
                    }
                });

                modal.modal('show');
            });

        }


        function progress(e) {

            if (e.lengthComputable) {
                var max = e.total;
                var current = e.loaded;

                var percentage = (current * 100) / max;
                console.log(percentage);
                var percentVal = percentage + '%';
                $('.progress-bar').width(percentVal);

                if (percentage >= 100) {
                }
            }
        }

    </script>
@endpush
