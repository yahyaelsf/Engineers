@extends('admin.layouts.dashboard')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__body">
            <form action="{{ route('admin.engineers.file') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">

                @csrf
                <div class="row">
                    <input type="file" name="s_file" placeholder="excel file">



                </div>





            </form>
        </div>
    </div>
@endsection
