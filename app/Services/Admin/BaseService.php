<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $defaultLocale;
    protected $model;
    protected $module;
    protected $cacheStatus;
    protected $cacheTime;

    public function __construct(Model $model, ModuleEnum $module = null)
    {
        $this->defaultLocale = app()->getFallbackLocale();
        $this->model = $model;
        $this->module = $module;
        $this->cacheStatus = config("setting.caching.status", false);
        $this->cacheTime = config("setting.caching.time", 3600);
    }

    public function folder()
    {
        return $this->module->folder();
    }

    public function route()
    {
        return $this->module->route();
    }

    public function module()
    {
        return $this->module;
    }

    public function all()
    {
        $currentpage = Paginator::resolveCurrentPage() ?: 1;
        if (config("setting.caching.status", StatusEnum::Passive->value) ==  StatusEnum::Active->value)
            return Cache::remember($this->module->value . '_' . $currentpage, $this->cacheTime, function () {
                return $this->model->orderByDesc("id")->paginate(config("setting.pagination.admin", 15));
            });
        else
            return $this->model->orderByDesc("id")->paginate(config("setting.pagination.admin", 15));
    }

    public function create(Request $request)
    {
        $this->cacheClear();
        return $this->model->create($request->all());
    }

    public function update(Request $request, Model $item)
    {
        $this->cacheClear();
        return $item->update($request->all());
    }

    public function delete(Model $item)
    {
        $this->cacheClear();
        return $item->delete();
    }

    public function imageDelete(Model $item)
    {
        return $item->delete();
    }

    public function imageAllDelete(Model $item)
    {
        return $item->clearMediaCollection($this->module->IMAGE_COLLECTION());
    }

    public function getCategories()
    {
        if ($this->cacheStatus) {
            $cacheKey = ($this->module ? $this->module->value . "_" : "all_") . "categories";
            return Cache::remember($cacheKey, $this->cacheTime, function () {
                $categories = Category::whereStatus(StatusEnum::Active->value)
                    ->when($this->module !== null, function ($query) {
                        return $query->where("module", $this->module);
                    })
                    ->get();
                $titles = $categories->pluck("titles." . $this->defaultLocale, "id");
                return $titles->toArray();
            });
        } else {
            $categories = Category::whereStatus(StatusEnum::Active->value)
                ->when($this->module !== null, function ($query) {
                    return $query->where("module", $this->module);
                })
                ->get();
            $titles = $categories->pluck("titles." . $this->defaultLocale, "id");
            return $titles->toArray();
        }
    }

    public function cacheClear()
    {
        $currentpage = Paginator::resolveCurrentPage() ?: 1;
        for ($i = 1; $i <= $currentpage; $i++) {
            if (Cache::has($this->module->value . '_' . $i)) {
                Cache::forget($this->module->value . '_' . $i);
            }
        }
        if (Cache::has(($this->module ? $this->module->value . "_" : "all_") . "categories")) {
            Cache::forget(($this->module ? $this->module->value . "_" : "all_") . "categories");
        }
    }
}
