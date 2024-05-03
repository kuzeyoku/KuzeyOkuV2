<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Page;
use App\Models\PageTranslate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PageService extends BaseService

{
    protected $page;

    public function __construct(Page $page)
    {
        parent::__construct($page, ModuleEnum::Page);
    }

    public function create(Object $request)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        $data = new Request(array_merge($arr, $request->only("status")));

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Object $request, Model $page)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        $data = new Request(array_merge($arr, $request->only("status")));

        $query = parent::update($data, $page);

        if ($query) {
            $this->translations($page->id, $request);
        }

        return $query;
    }

    public function translations(int $pageId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->content[$language->code])) {
                PageTranslate::updateOrCreate(
                    [
                        "page_id" => $pageId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "description" => $request->description[$language->code] ?? null
                    ]
                );
            }
        }
    }
}
