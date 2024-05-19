<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Filters\ParentFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEngineerRequest;

use App\Models\TEngineer;
use Illuminate\Http\Request;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class EngineerController extends Controller
{
    protected $model;

    public function __construct(TEngineer $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = "بيانات المهندسين";
        $pageDescription = trans('navigation.engineers');

        return view('admin.engineers.index', compact('pageTitle', 'pageDescription'));
    }


    public function form()
    {
        $id = request('id');
        $engineer = null;

        if ($id) {
            $engineer = $this->model->findOrFail($id);
        }

        $inputs = [
            [
                'name' => 's_title',
                'type' => 'text',
                'label' => __('general.title'),
            ],
            [
                'name' => 's_subtitle',
                'type' => 'text',
                'label' => __('general.subtitle'),
            ],
            [
                'name' => 's_description',
                'type' => 'textarea',
                'label' => __('general.description'),
                'rows' => '2'
            ]
        ];


        return response()->json(
            [
                'title' => trans('general.add_edit'),
                'page' => view('admin.engineers.form', compact('engineer', 'inputs'))->render()
            ]
        );
    }

    public function store(StoreEngineerRequest $request)
    {

        $input = $request->except('s_cover');



        if ($id = request('pk_i_id')) {
            $engineer = $this->model->find($id);
            $engineer->update($input);
        } else {
            $engineer = $this->model->create($input);
        }



        return response()->json([
            'success' => true,
            'message' => trans('alerts.successfully_added'),
            'data' => $engineer
        ]);
    }

    public function updateStatus(Request $request)
    {
        $engineer = $this->model->findOrFail($request->id);
        $engineer->b_enabled = (int)$request->enabled;
        $engineer->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function reorder(Request $request)
    {
        foreach ($request->input('rows', []) as $row) {
            TEngineer::find((int)$row['pk_i_id'])->update([
                'i_order' => (int)$row['i_order']
            ]);
        }

        return response()->noContent();
    }


    public function replicate(TEngineer $engineer)
    {
        try {
            $engineer->replicateRow();
            return back()->with('success', trans('alerts.successfully_added'));
        } catch (\Exception $exception) {
            return back()->with('error', trans('alerts.loading_error'));
        }
    }

    public function destroy(TEngineer $engineer)
    {
        $engineer->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', trans('alerts.successfully_deleted'));
    }


    public function datatable(ParentFilter $filters)
    {
        $engineer = $this->model->select('t_engineers.*')->filter($filters)->distinct();
        return datatables($engineer)->addColumn('actions_column', function ($row) {
            return view('admin.engineers.datatable.actions', compact('row'));
        })->rawColumns(['enabled_html', 'actions_column'])->make(true);
    }
        public function import(Request $request)
    {

        Excel::import(new UsersImport, $request->s_file);

        return redirect()->route('admin.engineers.index')->with('success', 'All good!');
    }
        public function export()
    {
        return Excel::download(new UsersExport, 'engineers.xlsx');
    }
}
