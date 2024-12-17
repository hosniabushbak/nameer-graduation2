<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\UpdateOwnerRequest;
use App\Http\Requests\Owner\CreateOwnerRequest;
use App\Models\Owner;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessOwnersController extends Controller
{
    public function index()
    {
        return view('admin.business_owners.index');
    }

    public function datatable(Request $request)
    {
        $items = Owner::with('business')
            ->whereHas('business')
            ->orderBy('id', 'DESC')
            ->search($request);
        return $this->filterDataTable($items, $request);
    }

    public function create()
    {
        return view('admin.business_owners.create');
    }

    public function store(CreateOwnerRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();
            $owner = Owner::create($data);
            if(isset($data['business_data'])) {
                $owner->business()->create($data['business_data']);
            }
            DB::commit();

            return $this->response_api(true, __('admin.form.added_successfully'), 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response_api(false, $this->exMessage($e));
        }
    }

    public function show($id)
    {
        $data['owner'] = Owner::with('business')->findOrFail($id);
        return view('admin.business_owners.show', $data);
    }

    public function edit($id)
    {
        $data['owner'] = Owner::with('business')->findOrFail($id);
        return view('admin.business_owners.create', $data);
    }

    public function update(UpdateOwnerRequest $request, $id)
    {
        $data = $request->validated();
        $owner = Owner::findOrFail($id);

        try {
            DB::beginTransaction();
            $owner->update($data);
            if(isset($data['business_data'])) {
                $owner->business()->update($data['business_data']);
            }
            DB::commit();

            return $this->response_api(true, __('admin.form.updated_successfully'), 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response_api(false, $this->exMessage($e));
        }
    }

    public function destroy($id)
    {
        Owner::destroy($id);
        return $this->response_api(true, __('admin.form.deleted_successfully'), 200);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->id;
        foreach ($ids as $row) {
            $item = Owner::find($row);
            if(!$item) {
                return $this->response_api(false, __('admin.form.not_existed'), 404);
            }
            $item->delete();
        }
        return $this->response_api(true, __('admin.form.deleted_successfully'), 200);
    }
}